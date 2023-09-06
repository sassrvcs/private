<?php

namespace App\Services\Invoice;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

/**
 * @todo work in progress
 * @note extends BaseService
 */
class InvoiceService
{
    /**
     * Order listing
     */
    public function index($status = "")
    {
        $order_invoice = Order::join('order_transactions','order_transactions.order_id','=','orders.order_id')
            ->join('shopping_carts','shopping_carts.id','=','orders.cart_id')
            ->join('packages','packages.id','=','shopping_carts.package_id')
            ->select('order_transactions.order_id','order_transactions.status','order_transactions.PAYID',
                'order_transactions.ACCEPTANCE','order_transactions.SHASIGN','order_transactions.invoice_id',
                'order_transactions.amount','order_transactions.created_at', 'orders.company_name', 
                'packages.short_description', 'orders.payable_amount','packages.package_price')
            ->where('orders.user_id', auth()->user()->id) 
            ->where('order_transactions.step', 1); 

        $order_invoice = $order_invoice->paginate(50);
        
        //dd($orders);
        return $order_invoice;
    }     
}