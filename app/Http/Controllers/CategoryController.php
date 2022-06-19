<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = new Category();

        return $this->view('category.index')
            ->with('categories', $categories->get());
    }

    public function show(Category $category)
    {
        return $this->view('category.show')
            ->with('category', $category);
    }

    public function edit(Category $category)
    {
        return $this->view('category.edit')
            ->with('category', $category);
    }

    public function update(Request $request, Category $category)
    {
        $category->update([
            'name' => $request->get('categoryName')
        ]);

        return redirect('/admin/categories/' . $category->id);
    }

    public function create()
    {
        return $this->view('category.create');
    }

    public function store(Request $request)
    {
        $categoryModel = new Category();
        $category = $categoryModel->create([
            'name' => $request->get('categoryName')
        ]);

        return $this->view('category.show')
            ->with('category', $category);
    }

    public function destroy(Category $category)
    {
        $category->products()->delete();
        $category->delete();

        return redirect('/admin/categories')
            ->with('success', 'Deleted category - ' . $category->name);
    }
}
