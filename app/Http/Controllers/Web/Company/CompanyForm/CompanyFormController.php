<?php

namespace App\Http\Controllers\Web\Company\CompanyForm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CompanyForm\RegisterAddress\RegisterAddressService;

class CompanyFormController extends Controller
{
    public function __construct(
        protected RegisterAddressService $regAddrService,
    ) { }
    public function registerAddress(){
        $recent_addr  = $this->regAddrService->getRecentAddress();
        return view('frontend.company_form.register_address', compact('recent_addr'));

    }
    public function editRegisterAddress(){
        return view('frontend.company_form.edit_address');
    }

}
