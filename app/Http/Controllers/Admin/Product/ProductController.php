<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;

use App\Services\Category\CategoryService;
use App\Models\Product;
use App\Services\Product\ProductService;
use App\Services\MediaUploadService;
use App\Http\Requests\Admin\Product\ProductStoreRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct(
        protected ProductService $productService,
        protected CategoryService $categoryService,
        protected MediaUploadService $mediaUploadService
    ) {
        $this->productService     = $productService;
        $this->categoryService    = $categoryService;
        $this->mediaUploadService = $mediaUploadService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productlist = $this->productService->productlisting();
        return view('admin.product.list',['productlist' => $productlist]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->categoryService->getCategory();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {
        $product = $this->productService->storeProduct($request->validated(), $request->file());
        if($product) {
            return redirect()->back()->with('success','Product added successfully.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
