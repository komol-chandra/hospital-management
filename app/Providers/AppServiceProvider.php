<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        View::composer(["backend.layouts.app"], function ($view) {
            $view->with("settings", Cache::rememberForever("settings", function () {
                return Setting::first();
            }));
        });

        View::composer(["backend.layouts.header"], function ($view) {
            $view->with("settings", Cache::rememberForever("settings", function () {
                return Setting::first();
            }));
        });

        View::composer(["backend.layouts.footer"], function ($view) {
            $view->with("settings", Cache::rememberForever("settings", function () {
                return Setting::first();
            }));
        });

        View::composer(["backend.layouts.app"], function ($view) {
            $view->with("settings", Cache::rememberForever("settings", function () {
                return Setting::first();
            }));
        });

        View::composer(["backend.pages.prescription.invoice"], function ($view) {
            $view->with("settings", Cache::rememberForever("settings", function () {
                return Setting::first();
            }));
        });

        View::composer(["backend.pages.account-invoice.create"], function ($view) {
            $view->with("settings", Cache::rememberForever("settings", function () {
                return Setting::first();
            }));
        });

        View::composer(["backend.pages.account-invoice.form"], function ($view) {
            $view->with("settings", Cache::rememberForever("settings", function () {
                return Setting::first();
            }));
        });

        View::composer(["backend.pages.account-invoice.view"], function ($view) {
            $view->with("settings", Cache::rememberForever("settings", function () {
                return Setting::first();
            }));
        });

        View::composer(["backend.pages.notice.view"], function ($view) {
            $view->with("settings", Cache::rememberForever("settings", function () {
                return Setting::first();
            }));
        });

        //Front End Pages

        View::composer(["frontend.layouts.header"], function ($view) {

            $view->with("settings", Cache::rememberForever("settings", function () {
                return Setting::first();
            }));
        });
        View::composer(["frontend.layouts.footer"], function ($view) {

            $view->with("settings", Cache::rememberForever("settings", function () {
                return Setting::first();
            }));
        });

    }
}
