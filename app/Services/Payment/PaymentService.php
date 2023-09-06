<?php

namespace App\Services\Payment;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\orderTransaction;
/**
 * @todo work in progress
 * @note extends BaseService
 */
class PaymentService
{
    /**
     * Order listing
     */
    public function index()
    {
        
        $order_payments = Order::join('order_transactions','order_transactions.order_id','=','orders.order_id')
            ->select('order_transactions.order_id','order_transactions.status','order_transactions.PAYID','order_transactions.ACCEPTANCE','order_transactions.SHASIGN','order_transactions.invoice_id','order_transactions.amount','order_transactions.created_at')
            ->where('orders.user_id', auth()->user()->id);     
            
        
        $order_payments = $order_payments->paginate(50);
        
        return $order_payments;
    }       
}