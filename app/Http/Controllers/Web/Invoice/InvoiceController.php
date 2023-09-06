<?php

namespace App\Http\Controllers\Web\Invoice;

use App\Http\Controllers\Controller;
use App\Services\Invoice\InvoiceService;
use App\Services\Order\OrderService;
use App\Services\Company\CompanyFormSteps\CompanyFormService;
use App\Services\Company\BusinessEssentialSteps\BusinessEssentialsService;
use Illuminate\Http\Request;
use App\Models\Address;
use PDF;

class InvoiceController extends Controller
{
    public  function __construct(
        protected InvoiceService $invoiceService,
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
        
        $order_invoice  = $this->invoiceService->index();        
        
        //echo "<pre>";
        //print_r($orders);
        //die;
        return view('frontend.invoice.invoice_history', compact('order_invoice'));
    }     

    public function orderInvoice(Request $request)
    {
        // ini_set('memory_limit', '64000000000000M');

        $user = auth()->user();

        $order_id = $request->order;

        $order = $this->orderService->getOrder($order_id);  

        $deliveryPartner = $this->companyFormService->getCompanieName( $order_id );
        
        $all_order = $this->businessEssentialsService->showOrder( $order_id );

        $transaction = $this->orderService->getOrderFinalTransaction($order_id);

        $billing_address = Address::join('countries','countries.id','=','addresses.billing_country')
            ->select('countries.name as country_name','addresses.id','addresses.user_id','addresses.address_type','addresses.house_number','addresses.street','addresses.town','addresses.locality','addresses.county','addresses.post_code','addresses.billing_country')
            ->where('addresses.user_id', $user->id)
            ->where('addresses.address_type','billing_address')
            ->first();

        $net_total = 0;
        $total_vat =0;     

        $data = [
            'order' => $order, 
            'deliveryPartner' => $deliveryPartner,
            'user' => $user,
            'all_order' => $all_order,
            'net_total' => $net_total,
            'total_vat' => $total_vat,
            'transaction' => $transaction,
            'billing_address' => $billing_address
        ]; // Convert the model to an array        

        $pdf = PDF::loadView('PDF.invoice', $data);
        
        return $pdf->stream();
    }   
}