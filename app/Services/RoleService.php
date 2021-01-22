<?php
namespace App\Services;

use Spatie\Permission\Models\Role;

class RoleService
{
    public function createOrUpdate($value)
    {
        if (isset($value['id'])) {
            $data = Role::findOrFail($value['id']);
        } else {
            $data = new Role();
        }
        return $data->fill($value)->save() ? $data : null;
    }
    public function delete($id)
    {
        return Role::findOrFail($id)->delete();
    }
}
