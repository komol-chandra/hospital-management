<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\RoleModel;
use App\Services\ResponseService;
use App\Services\RoleService;

// use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $roleService;
    protected $message;
    public function __construct()
    {
        $this->roleService = new RoleService;
        $this->message = new ResponseService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.rbac.role.index');
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
    public function roleList(Request $request)
    {
        $data = RoleModel::search($request->search)->orderBy('id', 'DESC')->get();
        return view('backend.rbac.role.dataList', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $value = $request->all();
        $data = $this->roleService->createOrUpdate($value);
        if ($data) {
            $notification = $this->message->success('Role', 'Role Insert Successfully');
        } else {
            $notification = $this->message->error('Role', 'Input Filed Required');
        }
        $status = 200;
        return response()->json($notification, $status);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.rbac.role.view');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->roleService->delete($id);
        if ($data) {
            $notification = $this->message->success('Role', 'Role Deleted Successfully');
        } else {
            $notification = $this->message->error('Role', 'System Error');
        }
        return redirect()->back()->with($notification);
    }
}
