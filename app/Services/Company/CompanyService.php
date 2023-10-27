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
    public function index($request)
    {

        //$companies = User::with('address','orders','orders.myCompany', 'companies')->findOrFail($id);
        $fullDate = $request->query('dateRange');
        $dateRange = $request->query('dateRange')!=null?explode('/',$request->query('dateRange')):null;
        $companies = Order::join('users','users.id','=','orders.user_id')
                ->select('orders.id','orders.order_id','orders.auth_code',
                    'orders.company_number','orders.created_at', 'orders.company_name','orders.order_status')
                ->where('orders.user_id', '<>', auth()->user()->id)->when($request->search!=null, function ($query) use ($request) {
                    return $query->where('orders.company_name', 'like', "%{$request->search}%");
                })->when($request->dateRange!=null, function ($query) use ($dateRange) {
                    return $query->whereDate('orders.created_at', '>=', $dateRange[0])->whereDate('orders.created_at', '<=', $dateRange[1]);
                })->orderBy('created_at','desc');
        $companies = $companies->paginate(50)->withQueryString();

        return $companies;
    }
}
