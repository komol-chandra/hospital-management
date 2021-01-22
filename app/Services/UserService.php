<?php
namespace App\Services;

use App\Models\User;
use File;

class UserService
{
    public function lists()
    {
        return User::orderBy('id', 'ASC')->get();
    }

    public function createOrUpdate($data)
    {
        if (!empty($data["id"])) {
            $value = User::findOrFail($data['id']);
            if (isset($data['picture'])) {
                if (File::exists($value->picture)) {
                    File::delete($value->picture);
                }
                $value->picture = $data['picture'];
            }
        } else {
            $value = new User();
        }
        return $value->fill($data)->save() ? $value : null;
    }
    public function delete($id)
    {
        $data = user::findOrFail($id);
        if ($data) {
            if (File::exists($data->picture)) {
                File::delete($data->picture);
            }
        }
        return $data->delete();
    }
}
