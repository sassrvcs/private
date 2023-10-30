<?php

namespace App\Http\Controllers\Web\Order;

use App\Http\Controllers\Controller;
use App\Services\Order\OrderService;
use App\Services\Company\CompanyFormSteps\CompanyFormService;
use App\Services\Company\BusinessEssentialSteps\BusinessEssentialsService;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Address;
use App\Models\Order;
use App\Models\Person_appointment;
use League\Csv\Writer;

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
    public function adminOrderHistory(Request $request)
    {

            $search  = $request->query('search');
            $fullDate = $request->query('dateRange');
            $dateRange = $request->query('dateRange')!=null?explode('/',$request->query('dateRange')):null;
            $order_status = [
                'success',
                'pending',
                'progress'
            ];
            $orderStatus = $request->query('orderStatus');
            // dd($request);


            $orders = Order::with('transactions')->with('cart.package')->when($request->query('search')!=null,function($query) use ($search){
               return $query->where('order_id', 'like', '%'.$search.'%')->orWhere('company_name', 'like', '%'.$search.'%');
            })->when($request->query('dateRange')!=null,function($query)  use ($dateRange){
                return $query->whereDate('created_at', '>=', $dateRange[0])->whereDate('created_at', '<=', $dateRange[1]);
            })->when($orderStatus!=null,function($query) use($orderStatus){
                return $query->where('order_status', $orderStatus);
            })->orderBy('created_at','desc')->when(!$request->routeIs('admin.order-history-report'),function($query)
            { return $query->paginate(50)->withQueryString();}
        );
        if($request->routeIs('admin.order-history-report')){
            $orders = ($orders->get());

            $csv = Writer::createFromString('');
            $csv->insertOne(['order ID','Created At', 'Invoiced','Package Type','Company Name','Status']);

            foreach ($orders as $key => $order) {
                if (isset($order->transactions[0]->invoice_id))
                    $invoiceId =$order->transactions[0]->invoice_id;
                else
                    $invoiceId = '-';
                if ($order->cart->package != null) {
                    $package_type = $order->cart->package->package_type;
                } else {
                    $package_type = $order->getCompanyByOrderId->companie_type;
                    // $package_type = '-';
                }
                $full_pkg_type = '-';
                if (stripos($package_type, 'shares') !== false) {
                    $full_pkg_type = 'Limited By Shares';
                }
                if (stripos($package_type, 'Guarantee') !== false) {
                    $full_pkg_type = 'Limited By Guarantee';
                }
                if (stripos($package_type, 'Residents') !== false) {
                    $full_pkg_type = 'Non Residents Package';
                }
                if (stripos($package_type, 'PLC') !== false) {
                    $full_pkg_type = 'Public Limited Company';
                }
                if (stripos($package_type, 'Eseller') !== false) {
                    $full_pkg_type = 'Eseller Package';
                }
                if (stripos($package_type, 'LLP') !== false) {
                    $full_pkg_type = 'LLP Package';
                }
                $status = $order->order_status == 'pending' ? 'Incomplete' : ($order->order_status == 'progress' ? 'Inprogress' : 'Complete');
                $csv->insertOne([$order->order_id,date('d-m-Y', strtotime($order->created_at)), $invoiceId ,$full_pkg_type,$order->company_name,$status]);
            }
            $headers = [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="OrderHistoryReport.csv"',
            ];
        return response($csv->getContent(), 200, $headers);
        }

        return view('admin.company.orderHistory', compact('orders','search','fullDate','request','order_status','orderStatus'));
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
