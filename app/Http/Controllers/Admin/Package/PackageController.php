<?php

namespace App\Http\Controllers\Admin\Package;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Package\PackageService;
use Validator;
use App\Models\Feature;
use App\Models\Faq;
use App\Models\Package;
use App\Models\Facility;
use Redirect;

class PackageController extends Controller
{

    public function __construct(protected PackageService $packageService)
    {
        $this->packageService = $packageService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $package = $this->packageService->index();
        return view('admin.package.index',compact('package'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $facility = Facility::all();
        return view('admin.package.create', compact('facility'));
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'short_desc' => 'required',
            'price' => 'required|numeric|min:1',
            'description' => 'required'

            ],[
                'name.required' =>'Name field is required.',
                'short_desc.required' => 'Short description field is required.',
                'price.required' => 'Price field is required.',
                'description.required' => 'Description field is required.'

            ]);
        if($validate->fails()){
            return back()->withErrors($validate->errors())->withInput();
        }else{

            $packageId = $this->packageService->store($input);
            $temp =[];
            $tmp =[];
            if(!empty($input['features'])){
                foreach(data_get($input,'features') as $features){
                    $temp['feature'] = $features;
                    $temp['package_id'] = $packageId ;

                    Feature::create($temp);
                }

            }

            if(!empty($input['faq'])){
                foreach(array_values($input['faq']) as $k=> $value){
                    $tmp['package_id'] = $packageId ;
                    $tmp['question'] = $value['question'];
                    $tmp['answer'] = $value['answer'];
                    Faq::create($tmp);
                }

            }
            return Redirect::to("admin/package")->withSuccess('Package added successfully');
        }


    }
    /**
     *
     * @param string $id
     * @return view
     */
    public function edit(string $id)
    {
        $package = $this->packageService->edit($id);
        $facility = Facility::all();
        return view('admin.package.edit',compact('package','facility'));
    }

    public function update(Request $request, string $id)
    {
        $input = $request->all();
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'short_desc' => 'required',
            'price' => 'required|numeric|min:1',
            'description' => 'required'

            ],[
                'name.required' =>'Name field is required.',
                'short_desc.required' => 'Short description field is required.',
                'price.required' => 'Price field is required.',
                'description.required' => 'Description field is required.'

            ]);
        if($validate->fails()){
            return back()->withErrors($validate->errors())->withInput();
        }else{
            $user = $this->packageService->update($input,$id);
            if($user){
                return Redirect::to("admin/package")->withSuccess('Package updated');
            }

        }
    }
    /**
     * Remove agent from database.
     * @param string $id
     */
    public function destroy(string $id)
    {
        $user = $this->packageService->destroy($id);
        if($user) {
            return 1;
        } else {
            return 0;
        }
    }

}
