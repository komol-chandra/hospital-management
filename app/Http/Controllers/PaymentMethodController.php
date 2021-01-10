<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentMethodRequest;
use App\Models\PaymentMethod;
use App\Services\PaymentMethodService;
use App\Services\ResponseService;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    protected $message;
    protected $paymentMethodService;
    public function __construct()
    {
        $this->message = new ResponseService;
        $this->paymentMethodService = new PaymentMethodService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->paymentMethodService->lists();
        return view('backend.pages.payment-method.index', compact('data'));
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
    public function store(PaymentMethodRequest $request)
    {
        $value = $request->all();
        $data = $this->paymentMethodService->createOrUpdate($value);
        if ($data) {
            $notification = $this->message->success('Payment Method', 'Payment Method Insert Successfully');
        } else {
            $notification = $this->message->error('Payment Method', 'Input Filed Required');
        }
        $status = 200;
        return response()->json($notification, $status);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentMethod $paymentMethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->paymentMethodService->getById($id);
        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function update(PaymentMethodRequest $request)
    {
        $value = $request->all();
        $data = $this->paymentMethodService->createOrUpdate($value);
        if ($data) {
            $notification = $this->message->success('Payment Method', 'Payment Method Updated Successfully');
        } else {
            $notification = $this->message->error('Payment Method', 'Input Filed Required');
        }
        $status = 200;
        return response()->json($notification, $status);
    }
    public function destroy($id)
    {
        $data = $this->paymentMethodService->delete($id);
        if ($data) {
            $notification = $this->message->success('Payment Method', 'Payment Method Deleted Successfully');
        } else {
            $notification = $this->message->error('Payment Method', 'System Error');
        }
        return redirect()->back()->with($notification);
    }
    public function status($id)
    {
        $data = $this->paymentMethodService->status($id);
        if ($data) {
            $notification = $this->message->success('Payment Method', 'Payment Method Status Updated Successfully');
        } else {
            $notification = $this->message->error('Payment Method', 'System Error');
        }
        return redirect()->back()->with($notification);
    }
}
