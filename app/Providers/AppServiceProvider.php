<?php

namespace App\Providers;

use App\Models\Setting;
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
        // Paginator::useBootstrap();
        // $userProvider = User::
        // Form::macro('selectTest', function ($name, $selected = null, $options = []) {
        //     $testService = new TestService();
        //     $data = $testService->getDropdownList();
        //     return Form::select($name, $data, $selected, $options);
        // });

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

    }
}
