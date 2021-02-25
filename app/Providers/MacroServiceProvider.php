<?php

namespace App\Providers;

use App\Services\AccountService;
use App\Services\EmployeeService;
use App\Services\PaymentService;
use App\Services\UserAccessService;
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
        Form::macro('selectRole', function ($name, $selected = null, $options = []) {
            $userAccessService = new UserAccessService();
            $data = $userAccessService->getDropdownList();
            return Form::select($name, $data, $selected, $options);
        });

        Form::macro('selectBlood', function ($name, $selected = null, $options = []) {
            $employeeService = new EmployeeService();
            $data = $employeeService->bloodDropDown();
            return Form::select($name, $data, $selected, $options);
        });

        Form::macro('selectRollName', function ($name, $selected = null, $options = []) {
            $employeeService = new EmployeeService();
            $data = $employeeService->role();
            return Form::select($name, $data, $selected, $options);
        });
    }
}
