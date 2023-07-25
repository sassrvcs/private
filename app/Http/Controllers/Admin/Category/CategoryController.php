<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CategoryStoreRequest;
use App\Http\Requests\Admin\Category\CategoryUpdateRequest;
use App\Models\Category;
use App\Services\Category\CategoryService;
use App\Services\MediaUploadService;
use App\Services\User\Customer\CustomerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    public function __construct(
        protected CategoryService $categoryService,
        protected MediaUploadService $mediaUploadService
    ) {
        $this->categoryService    = $categoryService;
        $this->mediaUploadService = $mediaUploadService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $this->df();
        $categorylist = $this->categoryService->categorylisting();
        return view('admin.category.list',['categorylist' => $categorylist]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->categoryService->getCategory();
        return view('admin.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
        $category = $this->categoryService->storeCategory($request->validated(), $request->file());
        if($category) {
            return redirect()->back()->with('success','Category added successfully.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $find_pcategory = Category::where('id',$id)->select('parent_id')->first();
        $parent_category = Category::where('parent_id',$find_pcategory)->select('name')->first();
        $image = DB::table('media')->where('model_id',$id)->select('file_name')->get();
        //$categoryimage = $image->getMedia();
        $categories = $this->categoryService->getCategory();
        $category = $this->categoryService->show($id);
        return view('admin.category.edit', compact('category','categories','image','parent_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, $id)
    {
        // dd($request);
        // $request->validated()
        $category = $this->categoryService->updateCategory($request, $id);
        if($category) {
            return redirect()->back()->with('success','Category updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $delete = $this->categoryService->destroyCategory($id);
        if($delete) {
            return 1;
        } else {
            return 0;
        }

    }
}
