<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [FrontendController::class, 'index']);
Route::get('contact', [FrontendController::class, 'contact']);
Route::get('about', [FrontendController::class, 'about']);


//Products Links
Route::get('product/details/{slug}', [FrontendController::class, 'productdetails']);

Auth::routes(['verify' => true]);
// Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth', 'verified']);
Route::get('send/newsletter', [App\Http\Controllers\HomeController::class, 'sendnewsletter']);










// CategoryController Route
Route::get('add/category', [App\Http\Controllers\CategoryController::class, 'addcategory'])->name('addcategory');
Route::post('add/category/post', [App\Http\Controllers\CategoryController::class, 'addcategorypost']);

Route::get('delete/category/{category_id}', [App\Http\Controllers\CategoryController::class, 'deletecategory']);


Route::get('edit/category/{category_id}', [App\Http\Controllers\CategoryController::class, 'editcategory'])->name('editcategory');
Route::post('edit/category/post', [App\Http\Controllers\CategoryController::class, 'editcategorypost']);


Route::get('restore/category/{category_id}', [App\Http\Controllers\CategoryController::class, 'restorecategory']);
Route::get('forse/delete/category/{category_id}', [App\Http\Controllers\CategoryController::class, 'forsedeletecategory']);


// ProfileController Route
Route::get('profile', [App\Http\Controllers\ProfileController::class, 'profile']);
Route::post('edit/profile/post', [App\Http\Controllers\ProfileController::class, 'editprofilepost']);
Route::post('edit/password', [App\Http\Controllers\ProfileController::class, 'editpasswordpost']);
Route::post('chenge/profile/photo', [App\Http\Controllers\ProfileController::class, 'chengeprofilephoto']);



// ProductController Route
Route::resource('product', ProductController::class);
