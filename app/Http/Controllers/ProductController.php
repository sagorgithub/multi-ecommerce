<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_image;
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
        $product_id = Product::insertGetId($request->except('_token', "product_thumbnail_photo", 'product_multiple_photo') + [
            'created_at' => Carbon::now(),
            'slug' => $slug_link,
        ]);
        if ($request->hasFile('product_thumbnail_photo')) {
            //   echo $category_id;
            // upload Category Photo Start
            $uploaded_photo = $request->file('product_thumbnail_photo');
            $new_photo_name = $product_id . "." . $uploaded_photo->getClientOriginalExtension();
            $new_photo_location = "public/upload/product_photos/" . $new_photo_name;
            Image::make($uploaded_photo)->resize(600, 622)->save(base_path($new_photo_location));
            Product::find($product_id)->update([
                'product_thumbnail_photo' => $new_photo_name,
            ]);
            // upload Category Photo End
        }
        if ($request->hasFile('product_multiple_photo')) {
            $flag = 1;
            foreach ($request->file('product_multiple_photo') as $single_photo) {

                // print_r($single_photo);
                $uploaded_photo = $single_photo;
                $new_photo_name = $product_id . "-" . $flag . "." . $uploaded_photo->getClientOriginalExtension();
                $new_photo_location = "public/upload/product_multiple_photos/" . $new_photo_name;
                Image::make($uploaded_photo)->resize(600, 622)->save(base_path($new_photo_location));
                Product_image::insert([
                    'product_id' => $product_id,
                    'product_multiple_image_name' => $new_photo_name,
                    'created_at' => Carbon::now(),
                ]);
                $flag++;

                // upload Product
                // $new_photo_name = Str::random(10) . '.' . $single_photo->getClientOriginalExtension();
                // $new_photo_location = "public/upload/product_multiple_photos/" . $new_photo_name;
                // Image::make($single_photo)->resize(600, 622)->save(base_path($new_photo_location));
                // Product::insert([
                //     'product_name' => $request->product_name,
                //     'product_description' => $request->product_description,
                //     'product_price' => $request->product_price,
                //     'product_quantity' => $request->product_quantity,
                //     'product_thumbnail_photo' => $new_photo_name,
                //     'category_id' => $request->category_id,
                //     'created_at' => Carbon::now(),
                // ]);
            }
        }
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
