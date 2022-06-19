<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $products = new Product();

        return $this->view('product.index')
            ->with('products', $products->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $categories = new Category();

        return $this->view('product.create')
            ->with('categories', $categories->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return View
     */
    public function store(Request $request)
    {
        $productModel = new Product();
        $product = $productModel->create([
            'name' => $request->get('productName'),
            'quantity' => $request->get('productQuantity'),
            'category_id' => $request->get('productCategory')
        ]);

        return $this->view('product.show')
            ->with('product', $product);
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return View
     */
    public function show(Product $product)
    {
        return $this->view('product.show')
            ->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return View
     */
    public function edit(Product $product)
    {
        $categories = new Category();

        return $this->view('product.edit')
            ->with('product', $product)
            ->with('categories', $categories->get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Product $product
     * @return Application|Redirector|RedirectResponse
     */
    public function update(Request $request, Product $product)
    {
        $product->update([
            'name' => $request->get('productName'),
            'quantity' => $request->get('productName'),
            'category_id' => $request->get('productCategory')
        ]);

        return redirect('/admin/products')
            ->with('success', 'Updated product - ' . $product->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect('/admin/products')
            ->with('success', 'Deleted product - ' . $product->name);
    }
}
