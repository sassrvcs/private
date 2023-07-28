<?php

namespace App\Http\Controllers\Web\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\CartAcessRequest;
use App\Http\Requests\Checkout\CheckoutStepRequest;
use App\Services\Cart\CartService;
use App\Services\CompanieSearchService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    public function __construct(
        protected CartService $cartService,
        protected CompanieSearchService $companieSearchService)
    { }

    /**
     * Update cart as per company mane and details.
     * @param CartAcessRequest
     */
    public function index(CartAcessRequest $request)
    {
        $searchText = $request->validated();
        $response = $this->companieSearchService->searchCompany($searchText['company_name']);

        if($response['message'] == CompanieSearchService::COMPANY_AVAILABLE) {
            $cart = $this->cartService->updateCart($request->validated());
            return $response;
        } else {
            return $response;
        }
    }

    /**
     * Show the form for creating a new resource.
     * @param CheckoutStepRequest
     * @return \Illuminate\Http\Response
     */
    // public function create(CheckoutStepRequest $request)
    // {
        
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sessionCart = Session::get('cart');

        if(auth()->check()) {
           dd('!!!Authorised...');
        } else {
            // dd('!!!Show...');
            $this->cartService->addToCartViaSession($id);
        }
        // dd($data);
        return redirect(route('review-company-package'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
