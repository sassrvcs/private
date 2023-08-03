<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cms;


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
        return view('frontend.cmspage', compact('page'));
    }
    
}
