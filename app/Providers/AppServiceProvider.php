<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use App\Models\SmenaType;
use App\Models\Employee;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        app()->booted(function () {
            $lang = Session::get('lang', config('app.locale', 'uz'));
            App::setLocale($lang);
        });


        // Global view ma’lumotlar
        View::composer('*', function ($view) {
            $view->with('smenatypes', SmenaType::all());
        });

        View::composer('leaderShipDetail', function ($view) {
            $leaders = Employee::with('position', 'category')
                ->whereHas('position', function ($query) {
                    $query->where('name_uz', 'Direktor');
                })
                ->get();

            $view->with('leaders', $leaders);
        });
    }
}
