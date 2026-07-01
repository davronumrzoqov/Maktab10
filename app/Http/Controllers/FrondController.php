<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryTopp;
use App\Models\Employee;
use App\Models\Gallery;
use App\Models\InfoGrafika;
use App\Models\Post;
use App\Models\Schudeli;
use App\Models\HomePageImageTag;
use App\Models\SmenaType;
use App\Models\Statictik;
use App\Models\UsefulResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Message;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;

class FrondController extends Controller
{
    protected $categories;
    protected $categoryTop;

    public function __construct()
    {
        // ⚡ Cache orqali tezroq yuklash
        $this->categories = Cache::remember('categories', 3600, fn() => Category::all());
        $this->categoryTop = Cache::remember('categoryTop', 3600, fn() => CategoryTopp::all());

        view()->share('categories', $this->categories);
        view()->share('categoryTop', $this->categoryTop);
        view()->share('smenatypes', SmenaType::all());
    }

    // 🏫 Bosh sahifa
    public function index()
    {
        $statictik = Statictik::all();
        $posts = Post::latest()->take(3)->get();
        $HomePageImageTag = HomePageImageTag::all();
        $schedule = Schudeli::with('smena')->get();

        return view('index', compact('statictik', 'posts', 'HomePageImageTag', 'schedule'));
    }

    // 🎓 Maktab haqida
    public function schoolTack(Request $request)
    {
        $categoryId = $request->category;
        $category = Category::with('children')->find($categoryId);
        return view('frond.schoolTack', compact('category'));
    }

    // 👨‍💼 Rahbariyat ro‘yxati
    public function leaderShep()
    {
        $teachers = Employee::whereHas('category', fn($q) =>
        $q->where('name_uz', 'Rahbariyat')
        )->get();

        $director = $teachers->first();
        $parts = $director ? explode(' ', $director->name_uz) : [];

        return view('frond.leaderShep', compact('teachers', 'parts'));
    }

    // 👤 Rahbariyatdagi xodim tafsiloti
    public function leaderShepDetail($id)
    {
        $teacher = Employee::with(['position', 'category'])->findOrFail($id);
        return view('frond.LeaderShepDeatil', compact('teacher'));
    }

    // 👩‍🏫 O‘qituvchilar ro‘yxati
    public function teachers(Request $request)
    {
        $query = $request->input('query');

        $teachersQuery = Employee::with(['position', 'category'])
            ->whereHas('position', fn($q) =>
            $q->whereNotIn('name_uz', [
                'Direktor', 'Zam direktor', 'Bo‘lim boshlig‘i', 'M’anaviyatchi', 'Yoshlar yetakchisi'
            ])
            );

        if ($query) {
            $teachersQuery->where(function ($q) use ($query) {
                $q->where('name_uz', 'like', "%{$query}%")
                    ->orWhere('name_ru', 'like', "%{$query}%")
                    ->orWhereHas('category', function ($cat) use ($query) {
                        $cat->where('name_uz', 'like', "%{$query}%")
                            ->orWhere('name_ru', 'like', "%{$query}%");
                    });
            });
        }

        // paginate orqali katta ro‘yxatlar uchun qulaylik
        $teachers = $teachersQuery->get()
            ->groupBy(fn($item) => $item->category ? $item->category['name_' . App::getLocale()] : 'Boshqa toifa');

        return view('frond.teachers', compact('teachers', 'query'));
    }

    // 💼 Rekvizit sahifasi
    public function rekvizit()
    {
        return view('frond.rekvizit');
    }

    // 📰 Post qidiruvi
    public function searchPosts(Request $request)
    {
        $query = $request->input('query');

        $posts = Post::when($query, function ($q) use ($query) {
            $q->where('title_uz', 'like', "%{$query}%")
                ->orWhere('title_ru', 'like', "%{$query}%")
                ->orWhere('body_uz', 'like', "%{$query}%")
                ->orWhere('body_ru', 'like', "%{$query}%");
        })->get();

        return view('frond.schoolNews', compact('posts', 'query'));
    }

    // 🗂 Ta’lim yo‘nalishlari
    public function education(Request $request)
    {
        $query = $request->input('query');
        $categoryId = $request->input('category');

        $queryBuilder = Schudeli::query();
        if ($query) $queryBuilder->where('week_day', 'like', "%{$query}%");
        if ($categoryId) $queryBuilder->where('category_id', $categoryId);

        $educations = $queryBuilder->get();
        $smenaType = SmenaType::all();

        return view('frond.education', compact('educations', 'smenaType'));
    }

    // 🧩 Har bir smena tafsiloti
    public function educationDetail($id)
    {
        $smena = SmenaType::with('schudelis')->findOrFail($id);
        return view('frond.education_detail', compact('smena'));
    }

    // 🌐 Foydali resurslar
    public function usefulResurs()
    {
        $usefulresource = UsefulResource::all();
        return view('frond.usefulResurs', compact('usefulresource'));
    }

    // 🔗 Foydali resurs tafsiloti
    public function usefulResourceDetail($id)
    {
        $resource = UsefulResource::findOrFail($id);
        return view('frond.usefulresoursedetail', compact('resource'));
    }

    // 🖼 Galereya
    public function gallery()
    {
        $gallery = Gallery::all();
        return view('frond.gallery', compact('gallery'));
    }

    // 📊 Infografika
    public function infoGrafika()
    {
        $infografika = InfoGrafika::all();
        return view('frond.infoGrafika', compact('infografika'));
    }

    // 📰 Maktab yangiliklari va e'lonlari
    // 📰 Maktab yangiliklari va e'lonlari
    public function schoolNews()
    {
        $news = Post::where('type', 'news')->latest()->get();
        $announcements = Post::where('type', 'announcement')->latest()->get();


        return view('frond.schoolNews', compact('news', 'announcements'));
    }


    // 📰 Yangilik tafsiloti
    public function newsDetail($id)
    {
        $post = Post::findOrFail($id);
        return view('frond.newsDetail', compact('post'));
    }

    // 📬 Bog‘lanish sahifasi
    public function connect()
    {
        return view('frond.connect');
    }

    // ✉️ Email yuborish
    public function sendEmail(Request $request)
    {
        $data = $request->all();

        Mail::to('davronbekumrzoqov6@gmail.com')
            ->send(new Message($data));

        return redirect()->route('rekvizit')->with('success', 'Email muvaffaqiyatli yuborildi!');
    }
}
