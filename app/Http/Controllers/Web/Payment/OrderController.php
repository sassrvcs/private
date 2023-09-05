<?php

namespace App\Http\Controllers\Web\Order;

use App\Http\Controllers\Controller;
use App\Services\Order\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public  function __construct(
        protected OrderService $orderService
    ) { }

    /**
     * Handle the incoming request.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $authID = auth()->user()->id;
        $status = $request->status;
        $orders  = $this->orderService->index($status);
        //echo $status;
        //echo "<pre>";
        //print_r($orders);
        return view('frontend.orders.order_history', compact('orders'));
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