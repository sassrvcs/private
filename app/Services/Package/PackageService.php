<?php

namespace App\Services\Package;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Package;
use App\Models\Feature;
use App\Models\Faq;

/**
 * @todo work in progress
 * @note extends BaseService
 */
class PackageService
{
    /**
     * Package listing
     */
    public function index()
    {
        $packages = Package::with('features')->whereNull('deleted_at')->get();
        return $packages;
    }

    public function store($request)
    {
        dd($request);

        $package = new Package();
        $package->package_name = $request['name'];
        $package->package_price = $request['price'];
        $package->short_description = $request['short_desc'];
        $package->description = $request['description'];
        $package->notes = $request['notes'];
        $package->online_formation_within = $request['online_formation_within'];
        $package->cerificate_incorporation = $request['chek1'];
        $package->articles_association = $request['chek2'];
        $package->share_certificate = $request['chek3'];
        $package->company_reg = $request['chek4'];
        $package->maintain_company = $request['chek5'];
        $package->house_filling_fee = $request['chek6'];
        $package->business_bank_account = $request['chek7'];
        $package->company_manager = $request['chek8'];
        $package->reg_office_address = $request['chek9'];
        $package->free_domain_name = $request['chek10'];
        $package->printed_coi = $request['chek11'];
        $package->printed_articles_association = $request['chek12'];
        $package->printed_share_certificate = $request['chek13'];
        $package->free_call = $request['chek14'];
        $package->vat_reg = $request['chek15'];
        $package->confirmation_statement = $request['chek16'];
        $package->gdpr_compliance = $request['chek17'];
        $package->paye_reg = $request['chek18'];
        $package->good_standing = $request['chek19'];
        $package->hijack_protection = $request['chek20'];
        $package->ico_reg = $request['chek21'];
        $package->logo_design = $request['chek22'];
        $package->website_design = $request['chek23'];
        $package->save();

        if($request['package_icon']){
            $package->addMediaFromRequest('package_icon')->toMediaCollection('package_icon');
        }

        return $package->id;
    }


    /**
     * Get single package as per package ID
     * @param string $id
     */
    public function getPackage($id)
    {
        $package = Package::findOrFail($id);
        return $package;
    }
    public function edit($id)
    {
        $package = Package::with('features','faqs')->where("id",$id)->first();
        return $package;
    }

    public function update($request, $id){
        $package = Package::findOrFail($id);
        $package->package_name = $request['name'];
        $package->package_price = $request['price'];
        $package->short_description = $request['short_desc'];
        $package->description = $request['description'];
        $package->notes = $request['notes'];
        $package->online_formation_within = $request['online_formation_within'];
        $package->cerificate_incorporation = $request['chek1'];
        $package->articles_association = $request['chek2'];
        $package->share_certificate = $request['chek3'];
        $package->company_reg = $request['chek4'];
        $package->maintain_company = $request['chek5'];
        $package->house_filling_fee = $request['chek6'];
        $package->business_bank_account = $request['chek7'];
        $package->company_manager = $request['chek8'];
        $package->reg_office_address = $request['chek9'];
        $package->free_domain_name = $request['chek10'];
        $package->printed_coi = $request['chek11'];
        $package->printed_articles_association = $request['chek12'];
        $package->printed_share_certificate = $request['chek13'];
        $package->free_call = $request['chek14'];
        $package->vat_reg = $request['chek15'];
        $package->confirmation_statement = $request['chek16'];
        $package->gdpr_compliance = $request['chek17'];
        $package->paye_reg = $request['chek18'];
        $package->good_standing = $request['chek19'];
        $package->hijack_protection = $request['chek20'];
        $package->ico_reg = $request['chek21'];
        $package->logo_design = $request['chek22'];
        $package->website_design = $request['chek23'];
        $package->save();

        if($request['package_icon']){
            // Delete existing image
            $packageIcon  = $package->getFirstMedia('package_icon');
            if ($packageIcon) {
                $packageIcon->delete();
            }
            $package->addMediaFromRequest('package_icon')->toMediaCollection('package_icon');
        }

        $temp =[];
        $tmp =[];

        if(!empty($request['features'])){
            Feature::where('package_id',$id)->delete();
            foreach($request['features'] as $features){
                $temp['feature'] = $features;
                $temp['package_id'] = $id ;

                Feature::create($temp);
            }
        }

        if(!empty($request['faq'])){
            Faq::where('package_id',$id)->delete();
            foreach(array_values($request['faq']) as $k=> $value){
                $tmp['package_id'] = $id;
                $tmp['question'] = $value['question'];
                $tmp['answer'] = $value['answer'];
                Faq::create($tmp);
            }

        }
        return true;
    }
    public function destroy($id){
        $package = Package::FindOrFail($id)->delete();
        return $package;
    }
}
