<?php
namespace App\Services;

use App\Models\User;
use File;
use Illuminate\Support\Facades\Auth;

class ProfileService
{

    public function createOrUpdate($value)
    {

        if (!empty($value["id"])) {
            $data = User::findOrFail($value['id']);
            if (isset($value['picture'])) {
                if (File::exists($data->picture)) {
                    File::delete($data->picture);
                }
                $data->picture = $value['picture'];
            }
        } else {
            $data = new User();
        }
        return $data->fill($value)->save() ? $data : null;
    }
    public function getAuth()
    {
        $user_id = Auth::user()->id;
        return $data = User::findOrFail($user_id);
    }
}
