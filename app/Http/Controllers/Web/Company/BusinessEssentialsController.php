<?php

namespace App\Http\Controllers\Web\Company;

use App\Http\Controllers\Controller;
use App\Services\Addon\AddonService;
use App\Services\Company\BusinessEssentialSteps\BusinessEssentialsService;
use App\Services\Company\CompanyFormSteps\CompanyFormService;
use Illuminate\Http\Request;

class BusinessEssentialsController extends Controller
{
    public function __construct(
        protected BusinessEssentialsService $businessEssentialsService,
        protected CompanyFormService $companyFormService,
        protected AddonService $addonService
    ) { }

    /**
     * Business banking view
     * @todo implement insert steps and show choices radio buttom | check
     */
    public function index()
    {
        $businessEssential = $this->companyFormService->getCompanieName($_GET['order']);
        $selectedBusinessBanking = $businessEssential->businessBanking->business_banking_id ?? '';
        $selectedBusinessService = $businessEssential->businessBanking->business_service_id ?? '';

        if($_GET['section'] == 'BusinessEssential' && $_GET['step'] == 'business-banking' ) {
            $businessBanks = $this->businessEssentialsService->getBusinessBank();

            return view('frontend.company_form.business_essentials.business_banking', compact('businessBanks', 'selectedBusinessBanking'));
        } else if($_GET['section'] == 'BusinessEssential' && $_GET['step'] == 'business-services') {
            $businessServices = $this->businessEssentialsService->getBusinessService();
            return view('frontend.company_form.business_essentials.business_service', compact('businessServices', 'selectedBusinessService'));
        } else if($_GET['section'] == 'BusinessEssential' && $_GET['step'] == 'optional-extras') {

            $addOnCart = [];
            $addonServices = $this->addonService->index();
            $orders = $this->businessEssentialsService->showOrder($_GET['order'])->toArray();

            foreach ($orders['cart'] as $addonCarts) {
                if(is_array($addonCarts)) {
                    foreach ($addonCarts as $addonCart) {
                        $addOnCart[] = $addonCart['service_id'];
                    }
                }
            }

            return view('frontend.company_form.business_essentials.others', compact('addonServices', 'addOnCart'));
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
        } else if($request->step == 'other-extras') {
            return redirect( route('review.index', ['order' => $request->order, 'section' => 'Review', 'step' => 'review']) );
        }

        return redirect( route('business-essential.index', ['order' => $request->order, 'section' => 'BusinessEssential', 'step' => 'business-services']) );
    }

    /**
     * Load terms and condition information
     */
    public function termsAndCondition($id)
    {
        $businessBanks = $this->businessEssentialsService->showBusinessBankInfo($id);
        return $businessBanks->terms_condition;
    }
    public function termsAndConditionBusinessAccounting($id)
    {
        $businessService = $this->businessEssentialsService->getBusinessServicebyId($id);
        return $businessService->terms;
    }
}
