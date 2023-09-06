<?php

namespace App\Http\Controllers\Web\Payment;

use App\Http\Controllers\Controller;
use App\Services\Payment\PaymentService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public  function __construct(
        protected PaymentService $paymentService
    ) { }

    /**
     * Handle the incoming request.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $authID = auth()->user()->id;
        
        $order_payments  = $this->paymentService->index();
        
        //echo "<pre>";
        //print_r($order_payments);

        return view('frontend.payments.payment_history', compact('order_payments'));
    }    
}