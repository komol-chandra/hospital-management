<?php
namespace App\Services\Auth\Frontend;

use App\Models\FrontendUser;
use Illuminate\Support\Facades\Hash;

class FrontendAuthService
{
    public function create($data)
    {
        $model = new FrontendUser();
        $model->type = $data['type'];
        $model->name = $data['name'];
        $model->full_name = $data['full_name'];
        $model->email = $data['email'];
        $model->password = Hash::make($data['password']);
        $model->mobile = $data['mobile'];
        $model->birthday = $data['birthday'];
        $model->address = $data['address'];
        $model->gender = $data['gender'];
        return $model->save() ? $model : null;
    }
}
