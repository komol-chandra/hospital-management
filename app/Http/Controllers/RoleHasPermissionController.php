<?php

namespace App\Http\Controllers;

use App\Models\ModelsPermission;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleHasPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permissions = ModelsPermission::orderBy('id', "ASC")->get();
        $modules = $permissions->where('details', 'MODULE');
        $features = $permissions->where('details', 'FEATURE');
        $controls = $permissions->where('type', '!=', 0);
        $role = Role::findById($id);
        $role_permission = array_column($role->permissions->toArray(), 'id');
        return view('backend.rbac.role.edit_role_permission', compact('modules', 'features', 'controls', 'role', 'role_permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::findById($id);
        $permission = Permission::findById($request->permission_id);
        $role->givePermissionTo($permission);
        $notification = [
            'title'      => 'Permission',
            'message'    => "Successfully! {$role->name} {$permission->name} Permission Given.",
            'alert-type' => 'success',
        ];
        return response()->json($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $role = Role::findById($id);
        $permission = Permission::findById($request->permission_id);
        $role->revokePermissionTo($permission);
        $notification = [
            'title'      => 'Permission',
            'message'    => "Oops! {$role->name} {$permission->name} Permission Revoked.",
            'alert-type' => 'success',
        ];
        return response()->json($notification);
    }
}
