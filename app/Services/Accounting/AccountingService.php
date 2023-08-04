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
    public function index($search = "")
    {
        $accounts = Accounting::select('*');
        if (!empty($search)) {
            $accounts = $accounts->where('accounting_software_name', 'like', "%{$search}%");
        }
        $accounts = $accounts->paginate(5);
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
                
                $filename = time() . '.' . $request['image']->extension();
                $path = $request['image']->move(public_path('images'), $filename);
                
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
        if(isset($request["image"]))
        {
            $filename = time() . '.' . $request['image']->extension();
            $path = $request['image']->move(public_path('images'), $filename);
            $accounting->image = $filename;
        }
        $accounting->short_desc = $request['short_desc'];
        $accounting->long_desc = $request['description'];
        $accounting->save();

        return true;
    }

    public function destroy($id){
        $accountingDetails = Accounting::where("id",$id)->first();
        $accountingImage  = $accountingDetails->getFirstMedia('accounting_software_images');
        if ($accountingImage) {
            $accountingImage->delete();
        }
        $accounting = Accounting::FindOrFail($id)->delete();
        return $accounting;
    }
}
