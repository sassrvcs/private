<?php

namespace App\Http\Controllers\Web\Package;

use App\Http\Controllers\Controller;
use App\Services\Package\PackageService;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function __construct(protected PackageService $packageService)
    { }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $packages = $this->packageService->index();
        // return 
    }
}