<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    GalleryController,
    InfoGrafikaController,
    ProfileController,
    CategoryController,
    EmployeeController,
    FrondController,
    PositionController,
    EmpCategoryController,
    PostsController,
    HomePageImageTagController,
    SmenaTypeController,
    SchudeliController,
    LessonController,
    UserfulController,
    CategoryTop,
    StatictikController,
    ChildrenCategoryController,
    PageController,
    DashboardController
};
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;

/*
|--------------------------------------------------------------------------
| Tillarni o‘zgartirish
|--------------------------------------------------------------------------
*/
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

Route::get('/lang/{lang}', function ($lang) {
    if (in_array($lang, ['uz', 'ru'])) {
        Session::put('lang', $lang);
        App::setLocale($lang);
    }
    return redirect()->back();
});

/*
|--------------------------------------------------------------------------
| Front sahifalar
|--------------------------------------------------------------------------
*/
Route::get('/', [FrondController::class, 'index'])->name('index');
Route::get('/schooltack', [FrondController::class, 'schoolTack'])->name('schooltack');
Route::get('/leadershep', [FrondController::class, 'leaderShep'])->name('leaderShep');
Route::get('/teachers', [FrondController::class, 'teachers'])->name('teachers');
Route::get('/rekvizit', [FrondController::class, 'rekvizit'])->name('rekvizit');

// 📘 Asosiy ta’lim sahifasi (umumiy ko‘rinish)
Route::get('/education', [FrondController::class, 'education'])->name('education');

// 🧩 Har bir smenaning alohida sahifasi (yangi)
// Har bir smena tafsiloti
Route::get('/education/{smena}', [FrondController::class, 'educationDetail'])->name('education.detail');


Route::get('/usefulresurs', [FrondController::class, 'usefulresurs'])->name('usefulresurs');
Route::get('/connect', [FrondController::class, 'connect'])->name('connect');
Route::post('/SendEmail', [FrondController::class, 'SendEmail'])->name('SendEmail');
Route::get('/LeaderShepDatail/{id}', [FrondController::class, 'leaderShepDetail'])->name('LeaderShepDatail');

/*
|--------------------------------------------------------------------------
| Axborot markazi (Yangiliklar, e’lonlar)
|--------------------------------------------------------------------------
*/
/*
|--------------------------------------------------------------------------
| Axborot markazi (Yangiliklar, e’lonlar)
|--------------------------------------------------------------------------
*/
Route::get('/schoolNews', [FrondController::class, 'schoolNews'])->name('schoolNews');

Route::get('/news/{id}', [FrondController::class, 'newsDetail'])->name('news.detail');

/*
|--------------------------------------------------------------------------
| Qidiruv yo‘llari
|--------------------------------------------------------------------------
*/
Route::get('/teachers/search', [EmployeeController::class, 'search'])->name('teachers.search');
Route::get('/education/search', [FrondController::class, 'educationSearch'])->name('education.search');
Route::get('/search-posts', [FrondController::class, 'searchPosts'])->name('search.posts');

/*
|--------------------------------------------------------------------------
| Dinamik sahifalar
|--------------------------------------------------------------------------
*/
Route::get('/newsDetail/{id}', [FrondController::class, 'newsDetail'])->name('newsDetail');
Route::get('/educationDetail/{id}', [FrondController::class, 'educationDetail'])->name('educationDetail');
Route::get('/education/category/{category}', [FrondController::class, 'educationByCategory'])->name('education.category');
Route::get('/useful-resources/{resource}', [FrondController::class, 'usefulResourceDetail'])->name('useful-resources.detail');
Route::get('/school-rules', [PageController::class, 'schoolRules'])->name('schoolRules');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/state-symbols', [PageController::class, 'stateSymbols'])->name('stateSymbols');

/*
|--------------------------------------------------------------------------
| Galereya va infografika
|--------------------------------------------------------------------------
*/
Route::get('/Gallery', [FrondController::class, 'Gallery'])->name('Gallery');
Route::get('/infoGrafika', [FrondController::class, 'infoGrafika'])->name('infoGrafika');
Route::get('/schudeli', [SchudeliController::class, 'index'])->name('schudeli');

/*
|--------------------------------------------------------------------------
| CKEditor yuklash
|--------------------------------------------------------------------------
*/
Route::post('/ckeditor/upload', [\App\Http\Controllers\CKEditorController::class, 'upload'])
    ->name('admin.ckeditor.upload');

/*
|--------------------------------------------------------------------------
| Admin panel yo‘llari
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {

    // Dashboard route
    Route::resource('dashboard', DashboardController::class)->names([
        'index' => 'dashboard',
    ]);

    // Boshqa admin resource’lar
    Route::resources([
        'category'          => CategoryController::class,
        'employee'          => EmployeeController::class,
        'position'          => PositionController::class,
        'empCategory'       => EmpCategoryController::class,
        'CategoryTop'       => CategoryTop::class,
        'posts'             => PostsController::class,
        'statictik'         => StatictikController::class,
        'gallery'           => GalleryController::class,
        'infografika'       => InfoGrafikaController::class,
        'smenatype'         => SmenaTypeController::class,
        'schudeli'          => SchudeliController::class,
        'lesson'            => LessonController::class,
        'usefulResource'    => UserfulController::class,
        'HomePageImageTag'  => HomePageImageTagController::class,
        'categorychildren'  => ChildrenCategoryController::class,
        'users'             => UserController::class,
        'roles'             => RoleController::class,
    ]);
});

/*
|--------------------------------------------------------------------------
| Foydalanuvchi profili
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
