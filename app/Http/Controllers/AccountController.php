<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use App\Models\Account;
use App\Services\AccountService;
use App\Services\ResponseService;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    protected $accountService;
    protected $message;
    public function __construct()
    {
        $this->accountService = new AccountService;
        $this->message = new ResponseService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = $this->accountService->lists();
        return view('backend.pages.account.index', compact('data'));
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
    public function store(AccountRequest $request)
    {
        $value = $request->all();
        $data = $this->accountService->createOrUpdate($value);
        if ($data) {
            $notification = $this->message->success('Account', 'Account Insert Successfully');
        } else {
            $notification = $this->message->error('Account', 'Input Filed Required');
        }
        $status = 200;
        return response()->json($notification, $status);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->accountService->getById($id);
        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(AccountRequest $request)
    {
        $value = $request->all();
        $data = $this->accountService->createOrUpdate($value);
        if ($data) {
            $notification = $this->message->success('Account', 'Account Updated Successfully');
        } else {
            $notification = $this->message->error('Account', 'Input Filed Required');
        }
        $status = 200;
        return response()->json($notification, $status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->accountService->delete($id);
        if ($data) {
            $notification = $this->message->success('Account', 'Account Deleted Successfully');
        } else {
            $notification = $this->message->error('Account', 'System Error');
        }
        return redirect()->back()->with($notification);
    }
    public function status($id)
    {
        $data = $this->accountService->status($id);
        if ($data) {
            $notification = $this->message->success('Account', 'Account Status Changed Successfully');
        } else {
            $notification = $this->message->error('Account', 'System Error');
        }
        return redirect()->back()->with($notification);
    }
}
