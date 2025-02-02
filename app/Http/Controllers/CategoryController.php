<?php

namespace App\Http\Controllers;

// include composer autoload
// require 'vendor/autoload.php';

use Illuminate\Http\Request;
use App\Http\Requests\CategoryForm;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Image;
use Image;
use Intervention\Image\ImageManager;

class CategoryController extends Controller
{
    function addcategory()
    {
        return view('admin.category.index', [
            'categories' => Category::all(),
            'deleted_categories' => Category::onlyTrashed()->get(),
        ]);
    }
    function addcategorypost(CategoryForm $request)
    {
        $category_id = Category::insertGetId([
            'category_name' => $request->category_name,
            'category_description' => $request->category_description,
            'user_id' => Auth::id(),
            'created_at' => Carbon::now(),
        ]);
        if ($request->hasFile('category_photo')) {
            //   echo $category_id;
            // upload Category Photo Start
            $uploaded_photo = $request->file('category_photo');
            $new_photo_name = $category_id . "." . $uploaded_photo->getClientOriginalExtension();
            $new_photo_location = "public/upload/category_photos/" . $new_photo_name;
            Image::make($uploaded_photo)->resize(375, 375)->save(base_path($new_photo_location));
            Category::find($category_id)->update([
                'category_photo' => $new_photo_name,
            ]);
            // upload Category Photo End
        }
        return back()->with('succss_status', $request->category_name . ' Category Added Successfully!');
    }
    function deletecategory($category_id)
    {
        //category is deleted from the database
        Category::find($category_id)->delete();

        //category is deleted from the database
        Product::where('category_id', $category_id)->delete();

        return back()->with('deleted_status', 'Your Category Deleted Success Fully');
    }

    function editcategory($category_id)
    {
        return view('admin.category.edite', [
            'category_info' => Category::find($category_id),
        ]);
    }
    function editcategorypost(Request $request)
    {
        $request->validate([
            'category_name' => 'unique:categories,category_name,' . $request->category_id,
        ]);
        Category::find($request->category_id)->update([
            'category_name' => $request->category_name,
            'category_description' => $request->category_description,
        ]);
        // return back()->with('edit_status', 'Your Category Update Successfully!');
        return redirect('add/category')->with('edit_status', 'Your Category Update Successfully!');
    }
    function restorecategory($category_id)
    {
        Category::withTrashed()->find($category_id)->restore();
        return back()->with('restore_status', 'Your Category Restore Successfully!');
    }
    function forsedeletecategory($category_id)
    {
        Category::withTrashed()->find($category_id)->forceDelete();
        return back()->with('forsedelete_status', 'Your Category Permanetly Deleted Successfully!');
    }
}
