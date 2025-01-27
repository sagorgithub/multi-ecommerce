<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Image;
use Mail;
use App\Mail\ChangePasswordMail;

class ProfileController extends Controller
{
    function profile(){
        return view('admin.profile.index');
    }
    function editprofilepost(Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        if(Auth::user()->updated_at->addDays(30) < Carbon::now()){
            User::find(Auth::id())->update([
                'name' => $request->name,
            ]);
            return back()->with('name_change_stutas', 'Your Name Change Successfully!');
        }
        else{
            $left_day = Carbon::now()->diffInDays(Auth::user()->updated_at->addDays(30));

            return back()->with('name_change_stutas', 'You can change your name affter '.$left_day.' day');
        }
    }
    function editpasswordpost(Request $request){
        $request->validate([
            'password' => 'confirmed|min:8|alpha_num'
        ]);
        if(Hash::check($request->old_password, Auth::user()->password)){
            if($request->old_password == $request->password){
                return back()->with('password_error','Vai Tui puran password abbar kn dily');
            }
            else{
                User::find(Auth::id())->update([
                    'password' => Hash::make($request->password),
                ]);
                echo "akhn guma";
                // Chenge Password Notification Email Start
                Mail::to(Auth::user()->email)->send(new ChangePasswordMail(Auth::user()->name));
                return back()->with('password_change_stutas', 'Your password Change Successfully!');
                // Chenge Password Notification Email Start
            }
        }
        else{
            return back()->with('password_error','Vai tor password Mile nai akhn guma');
        }
    }
    function chengeprofilephoto(Request $request){
      $request->validate([
        'profile_photo' => 'required|image'
      ]);
      if($request->hasFile('profile_photo')){
        if(Auth::user()->profile_photo !== 'default.png'){
          $old_photo_location = "public/upload/profile_photos/".Auth::user()->profile_photo;
        unlink($old_photo_location);
        }
        $uploaded_photo = $request->file('profile_photo');
        $new_photo_name = Auth::id().".".$uploaded_photo->getClientOriginalExtension();
        $new_photo_location = "public/upload/profile_photos/".$new_photo_name;
        Image::make($uploaded_photo)->resize(375, 375)->save(base_path($new_photo_location));
        User::find(Auth::id())->update([
          'profile_photo' => $new_photo_name
        ]);
        return back();
      }
      else {
        echo "nai";
      }
    }
}
