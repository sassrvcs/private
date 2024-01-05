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
        $orders = Order::with('transactions')->where('user_id', auth()->user()->id);

        if (!empty($status)) {
            $orders = $orders->where('order_status', $status);
        }

        $orders = $orders->paginate(50);

        return $orders;
    }

    // public function index($status = "")
    // {
    //     $orders = Order::with('transactions')
    //         ->leftJoin('companies', 'orders.order_id', '=', 'companies.order_id')
    //         ->where('orders.user_id', auth()->user()->id);

    //     if (!empty($status)) {
    //         $orders = $orders->where('orders.order_status', $status);
    //     }

    //     $orders = $orders
    //         ->where('companies.status', '!=', 8)
    //         ->select('orders.*')
    //         ->paginate(50);

    //     return $orders;
    // }


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

    /**
     * Get final transaction order
     * @param string $id
     */
    public function getOrderFinalTransaction($id)
    {
        $transaction = orderTransaction::where('order_id', $id)->where('step', 1)->first();

        return $transaction;
    }
}
