<?php

namespace App\Http\Controllers\Web\Company;

use App\Http\Controllers\Controller;
use App\Services\User\UserService;
use App\Services\Company\CompanyFormSteps\CompanyFormService;
use App\Services\Order\OrderService;
use Illuminate\Http\Request;

use App\Models\Person_appointment;
use App\Models\PersonOfficer;
use App\Models\ShoppingCart;
use App\Models\Address;
use App\Models\Country;

class CompaniesListController extends Controller
{
    public  function __construct(
        protected UserService $userService,
        protected CompanyFormService $companyFormService,
        protected OrderService $orderService,
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

        // dump($companies);
        return view('frontend.companies.company', compact('companies'));
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function acceptedCompanyDetails(Request $request)
    {
        $order_id = $request->order;

        $order = $this->orderService->getOrder($order_id);

        $cartInfo = ShoppingCart::where(['user_id' => auth()->user()->id])->get()->first();

        $shoppingCartId = '';
        if (!empty($cartInfo)) {
            if (!empty($cartInfo['id'])) {
                $shoppingCartId = $cartInfo['id'];
            } else {
                $shoppingCartId = '';
            }
        }

        $used_address = Address::where('user_id', auth()->user()->id)->get();
        $countries = Country::all()->toArray();

        $person_officers = PersonOfficer::where('order_id', $order_id)->get()->toArray();

        $personAppointments = Person_appointment::where('order', $order_id)->get()->toArray();

        $review = $this->companyFormService->getCompanieName($order_id);

        $appointmentsList = [];
        if (!empty($personAppointments)) {
            $appointmentsList = $personAppointments;
        }
        
        return view('frontend.companies.overview', compact('used_address', 'countries', 'shoppingCartId', 'person_officers', 
            'appointmentsList','review','order'));
    }
}
