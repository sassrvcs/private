<?php

namespace App\Services\Company\CompanyFormSteps;

use App\Models\Companie;
use App\Models\Country;
use App\Models\Order;
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
    
    public function updateOrder($request)
    {
        return DB::transaction(function () {
            $company = Companie::where('user_id', auth()->user()->id)->first();
            $company->update([
                'order' => $company->order + 1,
            ]);

            return $company;
        });
    }

    /**
     * Get company name from order ID
     * @param int $order
     */
    public function getCompanieName($orderId)
    {
        $orders = Order::with('user')->where('order_id', $orderId)->first();
        $CompanyFormationStep = Companie::where('companie_name', 'LIKE', '%' . $orders->company_name . '%')->first();

        return $CompanyFormationStep;
    }

    /**
     * Company form step 5 | Legal documents step
     * @param array $request
     */
    // public function legalDocuments($request)
    // {
    //     // $sicCode = [];
    //     return DB::transaction(function () use ($request) {

    //         // Get the model instance where you want to attach the media
    //         $model = Companie::find($request->input('model_id'));

    //         // Attach the uploaded file to the model using Laravel Media Library
    //         $model->addMediaFromRequest('document')->toMediaCollection('documents');

    //         return response()->json([
    //             'message' => 'File uploaded successfully.',
    //         ]);

    //         return $model;
    //     });
    // }
}