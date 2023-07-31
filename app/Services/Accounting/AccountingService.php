<?php

namespace App\Services\Accounting;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Accounting;
use App\Models\Feature;

/**
 * @todo work in progress
 * @note extends BaseService
 */
class AccountingService
{
    /**
     * AccountingService listing
     */
    public function index()
    {
        $accounts = Accounting::get();
        return $accounts;
    }

    /**
     * Store addon service
     * @param array $request
     * @return string $service_id
     */
    public function store($request)
    {
        return DB::transaction(function () use ($request) {
            if($request['image']) {
                //$img_ext = $request->file('image')->getClientOriginalExtension();
                //$filename = 'acc-software-' . time() . '.' . $img_ext;
                $filename = time() . '.' . $request['image']->extension();
                $path = $request['image']->move(public_path('images'), $filename);
                //$path = $request->file('image')->move(public_path(), $filename);//image save public folder
            }

            $accounting = new Accounting();
            $accounting->accounting_software_name = $request['name'];
            $accounting->image = $filename;
            $accounting->short_desc = $request['short_desc'];
            $accounting->long_desc = $request['description'];
            $accounting->save();
            return $accounting->id;
        });
    }

    public function edit($id)
    {
        $accounting = Accounting::where("id",$id)->first();
        return $accounting;
    }

    public function update($request, $id){
        //print_r($request);exit;
        $accounting = Accounting::findOrFail($id);
        $accounting->accounting_software_name = $request['name'];
        if($request['image'])
        {
            $filename = time() . '.' . $request['image']->extension();
            $path = $request['image']->move(public_path('images'), $filename);
            $accounting->image = $filename;
        }
        $accounting->short_desc = $request['short_desc'];
        $accounting->long_desc = $request['description'];
        //print_r($accounting);exit;
        $accounting->save();

        return true;
    }

    public function destroy($id){
        $accountingDetails = Accounting::where("id",$id)->first();
        //print_r($accountingDetails);exit;
        $accounting = Accounting::FindOrFail($id)->delete();
        if(file_exists(public_path('images/'.$accountingDetails['image'].''))){
            unlink(public_path('images/'.$accountingDetails['image'].''));
        }
        return $accounting;
    }
}
