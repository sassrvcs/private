<?php

namespace App\Services\Company\BusinessEssentialSteps;

use App\Models\Accounting;
use App\Models\BusinessBanking;
use App\Models\BusinessEssential;
use App\Models\Companie;
use App\Models\companyFormStep;
use App\Models\Order;
use App\Services\Company\CompanyFormSteps\CompanyFormService;
use Illuminate\Support\Facades\DB;

class BusinessEssentialsService
{
    public function __construct(
        protected CompanyFormService $companyFormService
    ) { }

    /**
     * Get all business bank listings
     */
    public function getBusinessBank()
    {
        $allBusinessBanks = BusinessBanking::with('media')->get();
        return $allBusinessBanks;
    }

    /**
     * Store business bank information
     * @param $request
     */
    public function storeBusinessBankInfo($request)
    {
        // dd($request->business_service_id);
        return DB::transaction(function () use ($request) {

            $company = $this->companyFormService->getCompanieName($request->order);

            if ($request->business_bank_id) {
                $step = 'business_bank';
                $businessBanking = BusinessEssential::updateOrCreate(
                    [
                        'companie_id' => $company->id
                    ],[
                        'companie_id' => $company->id,
                        'business_banking_id' => ($request->business_bank_id != 0) ? $request->business_bank_id : '',
                    ]
                );
            } else if (isset($request->business_service_id)) {
                // dd('Others page');
                $step = 'business_service';
                if($request->business_service_id != 0) {
                    $businessBanking = BusinessEssential::updateOrCreate(
                        [
                            'companie_id' => $company->id
                        ],[
                            'companie_id' => $company->id,
                            'business_service_id' => $request->business_service_id,
                        ]
                    );
                } else {
                    $businessBanking = BusinessEssential::updateOrCreate(
                        [
                            'companie_id' => $company->id
                        ],[
                            'companie_id' => $company->id,
                            'business_service_id' => null,
                        ]
                    );
                }
            } else {
                $step = 'others-extras';
                $businessBanking = '';
            }


            $exist_order = companyFormStep::where('order', $request->order)->where('section', $request->section)->where('step', $request->step)->first();
            if(!$exist_order){
                $order = Order::where('order_id',$request->order)->pluck('id')->first();
                $companyFormStep = new companyFormStep;
                $companyFormStep->order = $request->order;
                $companyFormStep->order_id = $order;
                $companyFormStep->company_id  = $company->id;
                $companyFormStep->section  = $request->section;
                $companyFormStep->step  = $request->step;

                $companyFormStep->save();
                $company->section_name  = $request->section;
                $company->step_name     = $request->step;
            }
            $company->save();

            return ['information' => $businessBanking, 'step' => $step];
        });
    }

    /**
     * Get all business services
     */
    public function getBusinessService()
    {
        $businessAccountings = Accounting::with('media')->get();
        return $businessAccountings;
    }

    /**
     * Show business banking and service information as per business_bank_id
     * @param string $id
     */
    public function showBusinessBankInfo($id)
    {
        $businessBanking = BusinessBanking::findOrFail($id);
        return $businessBanking;
    }

    /**
     * Show order data as per order id
     * @param string $order_id
     */
    public function showOrder($order_id)
    {
        $order = Order::with('user', 'cart', 'cart.addonCartServices')->where('order_id', $order_id)->first();
        return $order;
    }
}
