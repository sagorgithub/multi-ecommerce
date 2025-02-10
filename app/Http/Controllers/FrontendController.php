<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;
use App\Models\Contact;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

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
    function contactinsert(Request $request)
    {
        $contact_id = Contact::insertGetId($request->except('_token') + [
            'created_at' => Carbon::now()
        ]);
        if ($request->hasFile('contact_attachment')) {
            // $uploaded_path = $request->file('contact_attachment')->store('contact_uploads', [
            //     'contact_attachment' => 'public'
            // ]);
            // $uploaded_path = $request->file('contact_attachment')->store('contact_uploads', 'public');

            $uploaded_path = $request->file('contact_attachment')->storeAs(
                'contact_uploads',
                $contact_id . "." . $request->file('contact_attachment')->getClientOriginalExtension(),
                'public'
            );


            // echo $uploaded_path;

            Contact::find($contact_id)->update([
                'contact_attachment' => $uploaded_path
            ]);
        }
        return back()->with('success_status', 'We recieved your Message');
    }
    function about()
    {
        return view('about');
    }
}
