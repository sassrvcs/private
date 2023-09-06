<?php

namespace App\Http\Controllers\Web\Order;

use App\Http\Controllers\Controller;
use App\Services\Order\OrderService;
use App\Services\Company\CompanyFormSteps\CompanyFormService;
use App\Services\Company\BusinessEssentialSteps\BusinessEssentialsService;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Address;
use App\Models\Person_appointment;

class OrderController extends Controller
{
    public  function __construct(
        protected OrderService $orderService,
        protected CompanyFormService $companyFormService,
        protected BusinessEssentialsService $businessEssentialsService,
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
        
        //echo "<pre>";
        //print_r($orders);

        return view('frontend.orders.order_history', compact('orders', 'status'));
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
            $order->delete();
        }
        
        return redirect(route('order-history'));
    }


    /**
     * Handle the incoming request.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getDetails(Request $request)
    {
        $order_id = $request->order;
        
        $deliveryPartner = $this->companyFormService->getCompanieName( $order_id );
        
        $all_order = $this->businessEssentialsService->showOrder( $order_id );

        $order = $this->orderService->getOrder($order_id);
        $transactions = $this->orderService->getOrderTransactions($order_id);

        $net_total = 0;
        $total_vat =0;
        $user = auth()->user();
        
        return view('frontend.orders.order_details',compact(
            'deliveryPartner','user','all_order','net_total','total_vat', 'order', 'transactions'));
    }  
}