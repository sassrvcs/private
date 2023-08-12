<?php

namespace App\Http\Controllers\Web\Company;

use App\Http\Controllers\Controller;
use App\Services\User\UserService;
use Illuminate\Http\Request;

class CompaniesListController extends Controller
{
    public  function __construct(
        protected UserService $userService
    ) { }

    /**
     * Handle the incoming request.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $authID = auth()->user()->id;
        $companies = $this->userService->show($authID);
        // dd($companies);

        return view('frontend.companies.company', compact('companies'));
    }
}
