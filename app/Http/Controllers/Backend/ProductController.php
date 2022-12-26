<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->returnUrl = '/products';
    }

    public function index(): View
    {
        $products = Product::all()->where("is_active",true);
        return view('backend.products.index', compact("products"));
    }

    public function create(): View
    {
        $categories = Category::all();
        return view('backend.products.insert_form', compact("categories"));
    }

    public function store(ProductRequest $request): RedirectResponse
    {
        $product = new Product();
        $data = $this->prepare($request, $product->getFillable());
        $product->fill($data);
        $product->save();
        return redirect($this->returnUrl);
    }
    public function edit(Product $product): View
    {
        $categories = Category::all();

        return view('backend.products.update_form',compact("categories", "product"));
    }

    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        $data = $this->prepare($request, $product->getFillable());
        $product->fill($data);
        $product->save();
        return redirect($this->returnUrl);
    }
    public function destroy(Product $product): Redirector|Application|RedirectResponse
    {
        $product->delete();
        return redirect($this->returnUrl);
    }
}
