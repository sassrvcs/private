<?php

namespace App\Http\Controllers\Web\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\CompanieFormAccessRequest;
use App\Http\Requests\Company\CompanieStoreRequest;
use App\Models\Companie;
use App\Models\Jurisdiction;
use App\Models\Order;
use App\Services\Company\CompanyFormSteps\CompanyFormService;
use Illuminate\Http\Request;

class CompanieFormController extends Controller
{
    public function __construct(protected CompanyFormService $companyFormService)
    { }

    /**
     * Companie form steps
     */
    public function index(CompanieFormAccessRequest $request)
    {
        $userID = auth()->user()->id;
        $orders = Order::with('user')->where('user_id', $userID)->get();
        $CompanyFormationStep =  Companie::where('companie_name', $orders[0]->company_name )->first();

        if($CompanyFormationStep == null) {
        
            $jurisdictions = Jurisdiction::get();
    
            $SICDetails = config('sic_code.sic_details');
            $SICCodes = config('sic_code.sic_code');
    
            return view('frontend.company_form.perticulers', compact('orders', 'jurisdictions', 'SICDetails', 'SICCodes'));
        } else {
            // $CompanyFormationStep
        }

    }

    public function store(CompanieStoreRequest $request)
    {
        // dd($request->validated());
        $companyForm = $this->companyFormService->companyFormStep1($request->validated());

        dd($companyForm);

        // $userID = auth()->user()->id;
        // $orders = Order::with('user')->where('user_id', $userID)->get();
        // $SICDetails = config('sic_code.sic_details');
        // $SICCodes = config('sic_code.sic_code');
        // return view('frontend.company_form.perticulers', compact('orders', 'SICDetails', 'SICCodes'));
    }
}