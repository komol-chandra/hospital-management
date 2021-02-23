<?php
namespace App\Services;

use App\Models\FrontendUser;
use App\Models\Test;
use App\Models\TestBill;

class TestBillService
{
    public function getPatients()
    {
        return FrontendUser::where('type', 'patient')->pluck('mobile', 'id');
    }

    public function getTests()
    {
        return Test::get();
    }

    public function lists()
    {
        return TestBill::get();
    }

}
