<?php

namespace App\Http\Controllers\Web\Invoice;

use App\Http\Controllers\Controller;
use App\Services\Invoice\InvoiceService;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public  function __construct(
        protected InvoiceService $invoiceService
    ) { }

    /**
     * Handle the incoming request.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $authID = auth()->user()->id;
        
        $orders  = $this->invoiceService->index();
        
        //echo $status;
        //echo "<pre>";
        //print_r($orders);
        return view('frontend.invoice.invoice_history', compact('orders'));
    } 

    /**
     * Delete order item
     * @Checkout step -> 2
    */
    public function deleteOrderItem(Request $request)
    {
        $order_id = $request->order_id;

        $order = $this->orderService->getOrder($order_id);

        if($order){
            //$order->delete();
        }
        
        return redirect(route('order-history'));
    }   
}