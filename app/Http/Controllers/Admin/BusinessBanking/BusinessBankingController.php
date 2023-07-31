<?php

namespace App\Http\Controllers\Admin\BusinessBanking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Feature;
use App\Models\Faq;
use App\Models\Package;
use Redirect;

class BusinessBankingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.business-banking.create');
    }
}
