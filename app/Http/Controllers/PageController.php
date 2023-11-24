<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cms;
use App\Models\BusinessBanking;
use App\Models\Accounting;
use App\Models\Addonservice as ModelsAddonservice;


class PageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function refundcancellation()
    // {
    //     $page = Cms::where('title','like','refund-cancellation')->first();
    //     //dd($page);
    //     return view('frontend.cmspage', compact('page'));
    // }

    public function show($slug)
    {
        $page = Cms::where('title','like',$slug)->first();
        $businessdata = BusinessBanking::get();
        $accounting = Accounting::get();
        $full_sec_price = ModelsAddonservice::with('features')->where('slug', 'like', "%full-company-secretary-service%")->pluck('price')->first();

        return view('frontend.cmspage', compact('page','businessdata','full_sec_price','accounting'));
    }

    public function aboutUs(){

        return view('frontend.aboutUs');

    }

}
