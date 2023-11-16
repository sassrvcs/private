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
    public function index($search = "")
    {
        $cms = Cms::select('*');
        if (!empty($search)) {
            $cms = $cms->where('title', 'like', "%{$search}%");
        }
        $cms = $cms->paginate(5);
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
        $cms->price = $request['price'];

        $cms->save();

        return true;
    }

}
