<?php

namespace App\Services\Company\BusinessEssentialSteps;

use App\Models\Accounting;
use App\Models\BusinessBanking;
use App\Models\BusinessEssential;
use App\Models\Companie;
use App\Services\Company\CompanyFormSteps\CompanyFormService;
use Illuminate\Support\Facades\DB;

class BusinessEssentialsService
{
    public function __construct( protected CompanyFormService $companyFormService )
    { }

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
        return DB::transaction(function () use ($request) {

            $company = $this->companyFormService->getCompanieName($request->order);
            
            if ($request->filled('business_bank_id')) {
                $step = 'business_bank';
                $businessBanking = BusinessEssential::updateOrCreate(
                    [
                        'companie_id' => $company->id
                    ],[
                        'companie_id' => $company->id,
                        'business_banking_id' => $request->business_bank_id,
                    ]
                );
            } elseif ($request->filled('business_service_id')) {
                $step = 'business_service';
                $businessBanking = BusinessEssential::updateOrCreate(
                    [
                        'companie_id' => $company->id
                    ],[
                        'companie_id' => $company->id,
                        'business_service_id' => $request->business_service_id,
                    ]
                );
            } else {
                $step = '';
                $businessBanking = '';
            }

            $company->section_name  = $request->section;
            $company->step_name     = $request->step;

            // $company->save();

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
}