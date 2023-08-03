<?php

namespace App\Services\Cms;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Cms;

/**
 * @todo work in progress
 * @note extends BaseService
 */
class CmsService
{
    /**
     * AccountingService listing
     */
    public function index()
    {
        $cms = Cms::get();
        return $cms;
    }
    

    public function edit($id)
    {
        $cms = Cms::where("id",$id)->first();
        return $cms;
    }

    public function update($request, $id){
        //print_r($request);exit;
        $cms = Cms::findOrFail($id);
        $cms->description = $request['description'];
        $cms->save();

        return true;
    }
    
}
