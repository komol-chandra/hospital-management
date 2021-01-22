<?php

namespace App\Http\Controllers;

use App\Models\RoleModel;
use App\Models\User;
use App\Services\ResponseService;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserAccessController extends Controller
{
    protected $message;
    protected $userService;
    public function __construct()
    {
        $this->message = new ResponseService;
        $this->userService = new UserService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.rbac.user-access.index');
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
    public function userAccessList(Request $request)
    {
        $data = User::search($request->search)->orderBy('id', 'DESC')->paginate(10);
        return view('backend.rbac.user-access.dataList', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = RoleModel::findOrFail($request->role);
        $user = User::with('roles')->findOrFail($request->id);
        if ($user->roles->toArray() != []) {
            $user->removeRole($user->roles[0]->name);
        }
        $user->assignRole($role->name);
        if ($user) {
            $notification = $this->message->success('User', "Successfully!{$user->name} has assigned to {$role->name}");
        } else {
            $notification = $this->message->error('User', 'Input Filed Required');
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
        $data = User::findOrFail($id);
        $role = RoleModel::all();
        return response()->json($data, 200);
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
        // dd($request->all());
        // $department->name = $data['name'];
        // $department->description = $data['description'];
        // $department->status = $data['status'];

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->userService->delete($id);
        if ($data) {
            $notification = $this->message->success('User', 'User Deleted Successfully');
        } else {
            $notification = $this->message->error('User', 'System Error');
        }
        return redirect()->back()->with($notification);
    }
}
