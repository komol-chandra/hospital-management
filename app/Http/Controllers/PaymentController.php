<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Models\Payment;
use App\Services\PaymentService;
use App\Services\ResponseService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $paymentService;
    protected $message;
    public function __construct()
    {
        $this->paymentService = new PaymentService;
        $this->message = new ResponseService;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->paymentService->lists();
        return view('backend.pages.payment.index', compact('data'));
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
    public function store(PaymentRequest $request)
    {
        $value = $request->all();
        $data = $this->paymentService->createOrUpdate($value);
        if ($data) {
            $notification = $this->message->success('Payment', 'Payment Insert Successfully');
        } else {
            $notification = $this->message->error('Payment', 'Input Filed Required');
        }
        $status = 200;
        return response()->json($notification, $status);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->paymentService->getById($id);
        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(PaymentRequest $request)
    {
        $value = $request->all();
        $data = $this->paymentService->createOrUpdate($value);
        if ($data) {
            $notification = $this->message->success('Payment', 'Payment Updated Successfully');
        } else {
            $notification = $this->message->error('Payment', 'Input Filed Required');
        }
        $status = 200;
        return response()->json($notification, $status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->paymentService->delete($id);
        if ($data) {
            $notification = $this->message->success('Payment ', 'Payment Deleted Successfully');
        } else {
            $notification = $this->message->error('Payment', 'System Error');
        }
        return redirect()->back()->with($notification);
    }
    public function status($id)
    {
        $data = $this->paymentService->status($id);
        if ($data) {
            $notification = $this->message->success('Payment', 'Payment Status change Successfully');
        } else {
            $notification = $this->message->error('Payment', 'System Error');
        }
        return redirect()->back()->with($notification);
    }
}
