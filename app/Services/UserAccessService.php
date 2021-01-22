<?php
namespace App\Services;

use App\Models\RoleModel;
use App\Models\User;
use File;

class UserAccessService
{
    public function lists()
    {
        return User::orderBy('id', 'DESC')->get();
    }
    public function getDropdownList()
    {
        return RoleModel::orderBy('id', 'DESC')->pluck('name', 'id');
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
}
