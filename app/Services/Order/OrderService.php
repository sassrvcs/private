<?php

namespace App\Services\Order;

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
class OrderService
{
    /**
     * Order listing
     */
    public function index($status = "")
    {
        $orders = Order::where('user_id', auth()->user()->id);

        if (!empty($status)) {
            $orders = $orders->where('order_status', $status);
        }

        $orders = $orders->paginate(50);
        
        return $orders;
    }

    /**
     * Get single order 
     * @param string $id
     */
    public function getOrder($id)
    {
        $order = Order::where('order_id', $id)->first();
        
        return $order;
    }

    /**
     * Get single order 
     * @param string $id
     */
    public function getOrderTransactions($id)
    {
        $transactions = orderTransaction::where('order_id', $id)->get();
        
        return $transactions;
    }      
}