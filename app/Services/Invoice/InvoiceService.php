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
        $orders = Order::where('user_id', auth()->user()->id);

        if (!empty($status)) {
            $orders = $orders->where('order_status', $status);
        }

        $orders = $orders->paginate(50);
        //dd($orders);
        return $orders;
    }

    /**
     * Get single order 
     * @param string $id
     */
    public function getOrder($id)
    {
        $order = Order::findOrFail($id);
        
        return $order;
    }   
}