<?php

namespace App\Services\Company\CompanyFormSteps;

use App\Models\Companie;
use App\Models\companyFormStep;
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
        // dd($request);
        return DB::transaction(function () use ($request) {
            $company = Companie::updateOrCreate([
                'companie_name'     => $request['companie_name'],
                'user_id'           => auth()->user()->id,
            ],[
                'user_id'           => auth()->user()->id,
                'order_id'          => $request['order'],
                'jurisdiction_id'   => $request['jurisdiction_id'],
                'companie_name'     => $request['companie_name'],
                'companie_type'     => $request['companie_type'],
                'section_name'      => $request['section_name'],
                'step_name'         => $request['step_name'],
            ]);

        $company = Companie::where('companie_name', 'LIKE', '%' . $request['companie_name'] . '%')->first();
        $exist= companyFormStep::where('order',$request['order'])->where('section','company_formation')->where('step','particulars')->first();
        if(!$exist){
            $companyFormStep = new companyFormStep;
            $companyFormStep->order = $request['order'];
            $companyFormStep->order_id = $request['order_id'];
            $companyFormStep->company_id  = $company->id;
            $companyFormStep->section  = 'company_formation';
            $companyFormStep->step  = 'particulars';

            $companyFormStep->save();
        }






            if($company) {
                // Delete previous data before insert data into database
                if($request['sic_code']) {
                    SicCode::where('companie_id', $company->id)->delete();
                }
                foreach( $request['sic_code'] as $sicCode ) {

                    if (strpos($sicCode, " - ") !== false) {
                        list($sicCode, $sicName) = explode(" - ", $sicCode, 2);

                        // $existingSic = SicCode::where('companie_id', $company->id)
                        //     ->where('code', $sicCode)
                        //     ->first();
                        // dd($existingSic);
                        // if ($existingSic) {
                        //     // Update existing record
                        //     $existingSic->update([
                        //         'name' => $sicName,
                        //     ]);
                        // } else {
                            // Insert new record
                            SicCode::insert([
                                'name'       => $sicName,
                                'companie_id'=> $company->id,
                                'code'       => $sicCode,
                            ]);
                        // }

                        // Insert new data after deleteing
                    }
                }
            }

            $sourceMedia = Order::findOrFail($request['order_id']);
            $sourceMedia->company_name = $request['companie_name'];
            $sourceMedia->save();

            $media = $sourceMedia->getMedia('sensetive-document');
            foreach ($media as $medium) {
                // Copy the medium to the Order model's collection
                $medium->copy($company, 'company-sensetive-document');
            }

            // If same as name exists, copy this to the Companie model
            $sameAsNameMedia = $sourceMedia->getMedia('same-as-name-document');
            foreach ($sameAsNameMedia as $medium) {
                // Copy the medium to the Order model's collection
                $medium->copy($company, 'company-same-as-name-document');
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
        $companyFormationStep = Companie::with(
            'businessBanking',
            'businessBanking.businessBanking',
            'businessBanking.accountingSoftware',
            'sicCodes',
            'jurisdiction',
            'officeAddressWithoutForwAddress',
            'officeAddressWithForwAddress',
            'businessAddressWithoutForwAddress',
            'businessAddressWithForwAddress',
        )->where('companie_name', 'LIKE', '%' . $orders->company_name . '%')->first();

        return $companyFormationStep;
    }
    public function getCompanieNameWithOrderID($orderId)
    {
        $companyFormationStep = Companie::with(
            'businessBanking',
            'businessBanking.businessBanking',
            'businessBanking.accountingSoftware',
            'sicCodes',
            'jurisdiction',
            'officeAddressWithoutForwAddress',
            'officeAddressWithForwAddress',
            'businessAddressWithoutForwAddress',
            'businessAddressWithForwAddress',
        )->where('order_id', $orderId)->first();
        return $companyFormationStep;
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
