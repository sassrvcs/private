<?php

namespace App\Services\Company;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Company;
use App\Models\Feature;
use App\Models\Order;
use App\Models\Faq;

/**
 * @todo work in progress
 * @note extends BaseService
 */
class CompanyService
{
    /**
     * Company listing
     */
    public function index($search = "")
    {
        
        //$companies = User::with('address','orders','orders.myCompany', 'companies')->findOrFail($id);

        $companies = Order::join('users','users.id','=','orders.user_id')                
                ->select('orders.id','orders.order_id','orders.auth_code',
                    'orders.company_number','orders.created_at', 'orders.company_name','orders.order_status')
                ->where('orders.user_id', '<>', auth()->user()->id);               
                

        if (!empty($search)) {
            $companies = $companies->where('orders.company_name', 'like', "%{$search}%");
        }

        $companies = $companies->paginate(10);
        
        return $companies;
    }   
}