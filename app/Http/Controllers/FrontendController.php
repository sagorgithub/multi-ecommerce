<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;

class FrontendController extends Controller
{
    function index()
    {
        return view('forntend.index', [
            'active_categories' => Category::all(),
            'active_products' => Product::latest()->get()
        ]);
    }

    function productdetails($slug)
    {
        return view('forntend.productdetails', [
            $product_info = Product::where('slug', $slug)->firstOrFail(),

            $related_products = Product::where('category_id', $product_info->category_id)->where('id', '!=', $product_info->id)->get(),
            'product_info' => $product_info,
            'related_products' => $related_products,
        ]);
    }
    function contact()
    {
        return view('forntend.contact');
    }
    function about()
    {
        return view('about');
    }
}
