<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductImageRequest;
use App\Models\ProductImage;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{
    public function __construct()
    {
        $this->returnUrl = '/products/{}/images';
        $this->fileRepo = "public/products";
    }

    /**
     * Display a listing of the resource.
     *
     * @param Product $product
     * @return View
     */
    public function index(Product $product): View
    {

        return view('backend.images.index', compact("product"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Product $product
     * @return Application|Factory|View
     */
    public function create(Product $product): View|Factory|Application
    {
        return view("backend.images.insert_form", compact("product"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductImageRequest $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function store(ProductImageRequest $request, Product $product): RedirectResponse
    {
        $productImage = new ProductImage();
        $data = $this->prepare($request, $productImage->getFillable());
        $productImage->fill($data);
        $productImage->save();

        $this->editReturnUrl($product->product_id);
        return redirect($this->returnUrl);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @param ProductImage $image
     * @return View
     */
    public function edit(Product $product, ProductImage $image): View
    {
        return view('backend.images.update_form', compact("product", "image"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductImageRequest $request
     * @param Product $product
     * @param ProductImage $image
     * @return RedirectResponse
     */
    public function update(ProductImageRequest $request, Product $product, ProductImage $image): RedirectResponse
    {
        $data = $this->prepare($request, $image->getFillable());
        $image->fill($data);
        $image->save();

        $this->editReturnUrl($product->product_id);
        return redirect($this->returnUrl);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @param ProductImage $image
     * @return RedirectResponse
     */
    public function destroy(Product $product, ProductImage $image):RedirectResponse
    {
        $image->forceDelete();
        $filePath = $this->fileRepo . "/" . $image->image_url;
        if(Storage::disk("local")->exists($filePath)){
            Storage::disk("local")->delete($filePath);
        }
        return redirect()->back();
    }

    private function editReturnUrl($id)
    {
        $this->returnUrl = "/products/$id/images";
    }
}
