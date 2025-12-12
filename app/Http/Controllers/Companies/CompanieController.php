<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\SearchCompanyRequest;
use App\Services\Cart\CartService;
use App\Services\CompanieSearchService;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CompanieController extends Controller
{
    public function __construct(
        protected CompanieSearchService $companySearchService,
        protected CartService $cartService
    ) { }

    /**
     * Search input company name is available or not.
     *
     * @param  SearchCompanyRequest  $request
     * @return message
     */
    public function __invoke(SearchCompanyRequest $request)
    {

        dd($request);
        $requestParam = $request->validated();

        if($requestParam['same_as'] === 'true') {
            $response = $this->companySearchService->sameAsCompanyNameSearch($requestParam['search']);
        } else {
            $response = $this->companySearchService->searchCompany($requestParam['search']);
        }
        // dd($response);

        if($response['message'] === CompanieSearchService::COMPANY_AVAILABLE) {
            // Add the item to the cart
            if($request->query('package_id')!=null){

                $this->cartService->addCompany($requestParam['search']);
            }else{

                $this->cartService->addCompany($requestParam['search']);
            }

            // $cart = Session::get('cart', []);
            // $cartItem = [
            //     'company_name' => $searchText['search'],
            // ];
            // $cart[] = $cartItem;
            // Session::put('cart', $cart);

            return $response;
        } else if($response['message'] === CompanieSearchService::COMPANY_NOT_AVAILABLE) {
            return $response;
        }
        // else {

        // }
    }
}
