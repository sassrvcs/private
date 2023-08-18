<?php

namespace App\Http\Controllers\Web\Company;

use App\Http\Controllers\Controller;
use App\Services\Company\CompanyFormSteps\CompanyFormService;
use Illuminate\Http\Request;
use PDF;

class ReviewController extends Controller
{
    public function __construct(
        protected CompanyFormService $companyFormService,
    ) { }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $review = $this->companyFormService->getCompanieName($_GET['order']);
        // dd($review);
        return view('frontend.company_form.review_form.review', compact('review'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     $review = $this->companyFormService->getCompanieName($_GET['order']);
    //     $pdf = PDF::loadView('frontend.company_form.review_form.review', $review);
    //     return $pdf->download('review.pdf');

    //     // return view('frontend.company_form.review_form.review', compact('review'));
    // }

    public function create()
    {
        $review = $this->companyFormService->getCompanieName($_GET['order']);
        $data = ['review' => $review]; // Convert the model to an array

        // view()->share('review',$data);
        // $pdf = PDF::loadView('frontend.company_form.review_form.review', $data);
        // // download PDF file with download method
        // return $pdf->download('pdf_file.pdf');

        $pdf = PDF::loadView('frontend.company_form.review_form.review', $data);
        return $pdf->download('review.pdf');
    }

}