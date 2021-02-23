<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountInvoiceRequest;
use App\Models\AccountInvoice;
use App\Models\AccountInvoicedetail;
use App\Models\Patient;
use App\Services\AccountInvoiceService;
use App\Services\ResponseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccountInvoiceController extends Controller
{
    protected $accountInvoiceService;
    protected $message;
    public function __construct()
    {
        $this->accountInvoiceService = new AccountInvoiceService;
        $this->message = new ResponseService;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->accountInvoiceService->lists();
        return view('backend.pages.account-invoice.index', compact('data'));
    }

    public function matchPatient(Request $request)
    {
        $id = $request->patientId;
        $match = Patient::where('mobile', $id)->first();
        return response()->json($match, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $account = $this->accountInvoiceService->getAccountDropdownList();
        return view('backend.pages.account-invoice.create', compact('account'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountInvoiceRequest $request)
    {
        // try {
        DB::beginTransaction();
        $invoice = new AccountInvoice();
        $user_id = Auth::user()->id;
        $invoice->created_by = $user_id;
        $code = $request->mobile;
        $patient = Patient::where('mobile', $code)->first()->toArray();
        $patientId = $patient['id'];
        $data = $request->all();
        $invoice->patient_id = $patientId;
        $invoice->fill($data)->save();

        foreach ($request->account_id as $key => $value) {
            $detailData[] = [
                'account_invoice_id' => $invoice->id,
                'account_id'         => $value,
                'description'        => $request->description[$key],
                'quantity'           => $request->quantity[$key],
                'price'              => $request->price[$key],
                'sub_total'          => $request->sub_total[$key],
            ];
        }
        $invoiceDetail = AccountInvoicedetail::insert($detailData);

        if ($invoiceDetail && $invoice) {
            $notification = $this->message->success('Account Invoice', 'Account Invoice Added Successfully ');
        } else {
            $notification = $this->message->error('Account Invoice', 'Account Invoice Field Required');
        }
        DB::commit();
        return redirect()->back()->with($notification);
        // } catch (\Exception $e) {
        //     return redirect()->back()->with("status", "message=" . $e->getMessage());
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AccountInvoice  $accountInvoice
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $account = $this->accountInvoiceService->getAccountDropdownList();
        $data = $this->accountInvoiceService->getByPatient($id);
        $detail = $this->accountInvoiceService->accountDetail($id);
        return view('backend.pages.account-invoice.view', compact('account', 'data', 'detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AccountInvoice  $accountInvoice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $account = $this->accountInvoiceService->getAccountDropdownList();
        $data = $this->accountInvoiceService->getById($id);
        return view('backend.pages.account-invoice.edit', compact('account', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AccountInvoice  $accountInvoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccountInvoice $accountInvoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AccountInvoice  $accountInvoice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->accountInvoiceService->delete($id);
        if ($data) {
            $notification = $this->message->success('Account Invoice', 'Account Invoice Deleted  Successfully ');
        } else {
            $notification = $this->message->error('Account Invoice', 'System Error');
        }
        return redirect()->back()->with($notification);
    }
    public function status($id)
    {
        $data = $this->accountInvoiceService->status($id);
        if ($data) {
            $notification = $this->message->success('Account Invoice', 'Account Invoice Status Updated  Successfully ');
        } else {
            $notification = $this->message->error('Account Invoice', 'System Error');
        }
        return redirect()->back()->with($notification);
    }

}
