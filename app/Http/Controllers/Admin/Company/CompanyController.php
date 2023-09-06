<?php

namespace App\Http\Controllers\Admin\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Company\CompanyService;
use App\Services\User\UserService;
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
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search     = ($request->search) ? $request->search : '';
        $companies = $this->companyService->index($search);        

        //echo "<pre>";
        //print_r($companies);die;
        return view('admin.company.index',compact('companies','search'));
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
}