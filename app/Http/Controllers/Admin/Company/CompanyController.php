<?php

namespace App\Http\Controllers\Admin\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Company\CompanyService;
use App\Services\User\UserService;
use App\Services\Order\OrderService;
use App\Services\Company\CompanyFormSteps\CompanyFormService;
use Validator;
use App\Models\Feature;
use App\Models\Faq;
use App\Models\Package;
use App\Models\Facility;
use App\Models\Person_appointment;
use App\Models\PersonOfficer;
use Redirect;

class CompanyController extends Controller
{

    public function __construct(
    
        protected UserService $userService,
        protected CompanyService $companyService,
        protected CompanyFormService $companyFormService,
        protected OrderService $orderService,
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search     = ($request->search) ? $request->search : '';
        $companies = $this->companyService->index($search); 

        $statuses = [
            '0' => 'Pending',
            '1' => 'In progress', 
            '2' => 'Approved', 
            '3' => 'Reject'
        ];      

        //echo "<pre>";
        //print_r($companies);die;
        return view('admin.company.index',compact('companies','search', 'statuses'));
    }
    
    /**
     *
     * @param string $id
     * @return view
     */
    public function show(string $id)
    {
        $review = $this->companyFormService->getCompanieName($id);
        $person_officers = PersonOfficer::where('order_id', $id)->get()->toArray();

        $personAppointments = Person_appointment::where('order', $id)->get()->toArray();

        $appointmentsList = [];
        if (!empty($personAppointments)) {
            $appointmentsList = $personAppointments;
        }
        // dd($review);
        return view('admin.company.view', compact('review', 'person_officers', 'appointmentsList'));
    }

    /**
     *
     * @param string $id
     * @return view
     */
    public function submitCompanyHouse(Request $request)
    {
        $data = ['status' => 'success'];
        return response()->json($data, 200);
    }

    /**
     *
     * @param string $id
     * @return view
     */
    public function checkStatus(Request $request)
    {
        $data = ['status' => 'success'];
        return response()->json($data, 200);
    }

    /**
     *
     * @param string $id
     * @return view
     */
    public function updateStatus(Request $request)
    {
        $order_id = $request->order_id;
        $company_number = $request->company_number;
        $auth_code = $request->auth_code;
        $status = $request->status;

        $order = $this->orderService->getOrder($order_id);

        if($order){
            $order->company_number = $company_number;
            $order->auth_code = $auth_code;
            //$order->order_status = $status;

            //update
            $order->save();
        }

        $data = ['status' => 'success'];
        return response()->json($data, 200);
    }
}