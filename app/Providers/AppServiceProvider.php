<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use App\Models\CategoryTopp;
use App\Models\SmenaType;

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

        View::composer('*', function ($view) {
            $view->with('smenatypes', SmenaType::all());
            $view->with('categoryTop', Cache::remember('categoryTop', 3600, fn() => CategoryTopp::all()));
        });
    }
}
