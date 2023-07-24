<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\SearchCompanyRequest;
use App\Services\CompanieSearchService;
use Illuminate\Http\Request;

class CompanieController extends Controller
{
    public function __construct(protected CompanieSearchService $companySearchService)
    { }

    /**
     * Search input company name is available or not.
     *
     * @param  SearchCompanyRequest  $request
     * @return message
     */
    public function __invoke(SearchCompanyRequest $request)
    {
        $searchText = $request->validated();

        $response = $this->companySearchService->searchCompany($searchText['search']);
        // dd($response);

        if($response['message'] === CompanieSearchService::COMPANY_AVAILABLE) {
            return $response;
        } else if($response['message'] === CompanieSearchService::COMPANY_NOT_AVAILABLE) {
            return $response;
        } 
        // else {

        // }
    }
}