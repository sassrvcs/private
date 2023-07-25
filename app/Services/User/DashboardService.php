<?php

namespace App\Services\User;


use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;

/**
 * @todo work in progress
 * @note extends BaseService
 */
class DashboardService
{
    public function __construct(protected UserService $userService)
    {  }

    public function dashboard()
    {
        $agentnumber = User::whereNotNull('agent_id')->count();
        $pending = User::where(['status' => '0'])->count();
        $totalproducts = DB::table('products')->count();

    }


    /**
     * This return agent count
     * @param array $filter (Optional)
     * @return User count
     */
    public function getAgentCount($filter = []) {
        return $this->userService->index($filter, ['agent'])->count();
    }

    /**
     * This return pending agent
     * @param array $filter (Optional)
     * @return pending agent count
     */
    public function getPendingAgent($filter = []) {
        return $this->userService->index($filter, ['beagent'])->count();
    }


}
