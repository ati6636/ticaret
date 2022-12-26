<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->returnUrl = '/categories';
    }

    public function index(): View
    {
        $categories = Category::all();
        return view('backend.categories.index', ['categories' => $categories]);
    }

    public function create(): View
    {
        return view('backend.categories.insert_form');
    }

    public function store(CategoryRequest $request): RedirectResponse
    {
        $category = new Category();
        $data = $this->prepare($request, $category->getFillable());
        $category->fill($data);
        $category->save();
        return redirect($this->returnUrl);
    }
    public function edit(Category $category): View
    {
        return view('backend.categories.update_form',compact('category'));
    }

    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {
        $data = $this->prepare($request, $category->getFillable());
        $category->fill($data);
        $category->save();
        return redirect($this->returnUrl);
    }
    public function destroy(Category $category): Redirector|Application|RedirectResponse
    {
        $category->delete();
        return redirect($this->returnUrl);
    }
}
