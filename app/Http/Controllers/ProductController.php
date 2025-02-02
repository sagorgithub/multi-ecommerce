<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\slug;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product.index', [
            'active_categories' => Category::all(),
            'products' => Product::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // print_r($request->except('_token'));
        $slug_link = Str::slug($request->product_name . "-" . Str::random(5));
        Product::insert($request->except('_token') + [
            'created_at' => Carbon::now(),
            'slug' => $slug_link,
        ]);
        return back()->with('product_status', $request->product_name . ' Product Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit', [
            'active_categories' => Category::all(),
            'product_info' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // print_r($request->except('_token', '_method', 'product_photo'));

        $product->update($request->except('_token', '_method', 'product_photo'));

        // print_r($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return back();
    }
}
