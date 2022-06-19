<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\View;

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
}
