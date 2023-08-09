<?php

namespace App\Services\Company\CompanyFormSteps;

use App\Models\Companie;
use App\Models\Country;
use App\Models\SicCode;
use Illuminate\Support\Facades\DB;

class CompanyFormService
{
    /**
     * Company form step 1 | Perticulars
     * @param array $request
     */
    public function companyFormStep1($request)
    {
        // $sicCode = [];
        return DB::transaction(function () use ($request) {
            $company = Companie::create([
                'user_id' => auth()->user()->id,
                'jurisdiction_id'   => $request['jurisdiction_id'],
                'companie_name'     => $request['companie_name'],
                'companie_type'     => $request['companie_type'],
                'section_name'      => $request['section_name'],
                'step_name'         => $request['step_name'],
            ]);

            if($company) {
                foreach( $request['sic_code'] as $sicCode ) {
                    list($sicCode, $sicName) = explode(" - ", $sicCode, 2);
                    SicCode::create([
                        'name'       => $sicName,
                        'companie_id'=> $company->id,
                        'code'       => $sicCode,
                    ]);
                }
            }

            return $company;
        });
    }
}