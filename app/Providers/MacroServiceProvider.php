<?php

namespace App\Providers;

use App\Services\AccountService;
use App\Services\PaymentService;
use Form;
use Illuminate\Support\ServiceProvider;

class MacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Form::macro('selectAccountType', function ($name, $selected = null, $options = []) {
            $accountService = new AccountService();
            $data = $accountService->getDropdownList();
            return Form::select($name, $data, $selected, $options);
        });
        Form::macro('selectAccount', function ($name, $selected = null, $options = []) {
            $paymentService = new PaymentService();
            $data = $paymentService->getDropdownList();
            return Form::select($name, $data, $selected, $options);
        });
    }
}
