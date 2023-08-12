<?php

namespace App\Http\Controllers\Web\Company;

use App\Http\Controllers\Controller;
use App\Services\Company\BusinessEssentialSteps\BusinessEssentialsService;
use Illuminate\Http\Request;

class BusinessEssentialsController extends Controller
{
    public function __construct(protected BusinessEssentialsService $businessEssentialsService)
    { }

    /**
     * Business banking view
     */
    public function index()
    {
        if($_GET['section'] == 'BusinessEssential' && $_GET['step'] == 'business-banking' ) {
            $businessBanks = $this->businessEssentialsService->getBusinessBank();
            return view('frontend.company_form.business_essentials.business_banking', compact('businessBanks'));
        } else if($_GET['section'] == 'BusinessEssential' && $_GET['step'] == 'business-services') {
            $businessServices = $this->businessEssentialsService->getBusinessService();
            return view('frontend.company_form.business_essentials.business_service', compact('businessServices'));
        } else if($_GET['section'] == 'BusinessEssential' && $_GET['step'] == 'optional-extras') {
            dd('Upcomming features.....!');
            // $businessServices = $this->businessEssentialsService->getBusinessService();
            // return view('frontend.company_form.business_essentials.business_service', compact('businessServices'));
        }
    }

    /**
     * Store the business banking information
     * @param Request
     */
    public function store(Request $request)
    {
        $response = $this->businessEssentialsService->storeBusinessBankInfo($request);

        if($response['step'] === 'business_service') {
            return redirect( route('business-essential.index', ['order' => $request->order, 'section' => 'BusinessEssential', 'step' => 'optional-extras']) );
        }

        return redirect( route('business-essential.index', ['order' => $request->order, 'section' => 'BusinessEssential', 'step' => 'business-services']) );
    }
}
