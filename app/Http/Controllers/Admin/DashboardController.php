<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Services\User\DashboardService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

     public function __construct(protected DashboardService $dashboardService)
     { 

     }
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('admin.dashboard.dashboard', [
            'agentnumber'   => '0',
            'pending'       => '0',
            'totalproducts' => '0'
        ]);
    }
}