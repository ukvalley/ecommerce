<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeBannerController;



// Front View Controller start

use App\Http\Controllers\Front\FrontController;
use Illuminate\Support\Facades\Route;








/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[FrontController::class,'index']);

Route::get('product/{id}',[FrontController::class,'product']);


Route::get('category/{id}',[FrontController::class,'category']);


Route::post('add_to_cart',[FrontController::class,'add_to_cart']);

Route::get('cart',[FrontController::class,'cart']);





 Route::get('admin',[AdminController::class,'index']);

 Route::post('admin/auth',[AdminController::class,'auth'])->name('admin.auth');

  //  Route::get(' updatepassword',[AdminController::class,'updatepassword']);

    

  // Group middleware

    Route::group(['middleware'=>'admin_auth'], function(){
  // Category Controller
    Route::get('dashboard',[AdminController::class,'dashboard']);
    Route::get('category',[CategoryController::class,'index']);
    Route::get('category/manage_category',[CategoryController::class,'manage_category']);
    Route::get('category/manage_category/{id}',[CategoryController::class,'manage_category']);
    Route::post('category/manage_category_process',[CategoryController::class,'manage_category_process'])->name('category.manage_category_process');

    // for data delete
    Route::get('category/delete/{id}',[CategoryController::class,'delete']);

    // For Active $ Deactive
    Route::get('category/status/{status}/{id}',[CategoryController::class,'status']);




// CouponController

    Route::get('coupon',[CouponController::class,'index']);
    Route::get('coupon/manage_coupon',[CouponController::class,'manage_coupon']);
    Route::get('coupon/manage_coupon/{id}',[CouponController::class,'manage_coupon']);
    Route::post('coupon/manage_coupon_process',[CouponController::class,'manage_coupon_process'])->name('coupon.manage_coupon_process');
    Route::get('coupon/delete/{id}',[CouponController::class,'delete']);
    Route::get('coupon/status/{status}/{id}',[CouponController::class,'status']);



// SizeController
    Route::get('size',[SizeController::class,'index']);
    Route::get('size/manage_size',[SizeController::class,'manage_size']);
    Route::get('size/manage_size/{id}',[SizeController::class,'manage_size']);
    Route::post('size/manage_size_process',[SizeController::class,'manage_size_process'])->name('size.manage_size_process');
    Route::get('size/delete/{id}',[SizeController::class,'delete']);
    Route::get('size/status/{status}/{id}',[SizeController::class,'status']);



// ColorController
Route::get('color',[ ColorController::class,'index']);
Route::get('color/manage_color',[ ColorController::class,'manage_color']);
Route::get('color/manage_color/{id}',[ ColorController::class,'manage_color']);
Route::post('color/manage_color_process',[ ColorController::class,'manage_color_process'])->name('color.manage_color_process');
Route::get('color/delete/{id}',[ ColorController::class,'delete']);
Route::get('color/status/{status}/{id}',[ ColorController::class,'status']);


// ProductController
Route::get('product',[ ProductController::class,'index']);
Route::get('product/manage_product',[ ProductController::class,'manage_product']);
Route::get('product/manage_product/{id}',[ ProductController::class,'manage_product']);
Route::post('product/manage_product_process',[ ProductController::class,'manage_product_process'])->name('product.manage_product_process');
Route::get('product/delete/{id}',[ ProductController::class,'delete']);
Route::get('product/status/{status}/{id}',[ ProductController::class,'status']);
// For delete product_attr
Route::get('product/ product_attr_delete/{paid}/{pid}',[ ProductController::class,'product_attr_delete']);
// For delete product_images
Route::get('product/product_images_delete/{paid}/{pid}',[ProductController::class,'product_images_delete']);




// BrandController
Route::get('brand',[ BrandController::class,'index']);
Route::get('brand/manage_brand',[ BrandController::class,'manage_brand']);
Route::get('brand/manage_brand/{id}',[BrandController::class,'manage_brand']);
Route::post('brand/manage_brand_process',[ BrandController::class,'manage_brand_process'])->name('brand.manage_brand_process');
Route::get('brand/delete/{id}',[ BrandController::class,'delete']);
Route::get('brand/status/{status}/{id}',[ BrandController::class,'status']);



// TaxController

Route::get('tax',[ TaxController::class,'index']);
Route::get('tax/manage_tax',[ TaxController::class,'manage_tax']);
Route::get('tax/manage_tax/{id}',[ TaxController::class,'manage_tax']);
Route::post('tax/manage_tax_process',[ TaxController::class,'manage_tax_process'])->name('tax.manage_tax_process');
Route::get('tax/delete/{id}',[ ColorController::class,'delete']);
Route::get('tax/status/{status}/{id}',[ TaxController::class,'status']);




// CustomerController
Route::get('customer',[ CustomerController::class,'index']);
Route::get('customer/show/{id}',[ CustomerController::class,'show']);
Route::get('customer/status/{status}/{id}',[ CustomerController::class,'status']);





// HomebannerController

Route::get('home_banner',[HomeBannerController::class,'index']);
Route::get('home_banner/manage_home_banner',[HomeBannerController::class,'manage_home_banner']);
Route::get('home_banner/manage_home_banner/{id}',[HomeBannerController::class,'manage_home_banner']);
Route::post('home_banner/manage_home_banner_process',[HomeBannerController::class,'manage_home_banner_process'])->name('home_banner.manage_home_banner_process');
Route::get('home_banner/delete/{id}',[HomeBannerController::class,'delete']);
Route::get('home_banner/status/{status}/{id}',[HomeBannerController::class,'status']);


Route::get('home_banner',[HomeBannerController::class,'index']);
Route::get('home_banner/manage_home_banner',[HomeBannerController::class,'manage_home_banner']);
Route::get('home_banner/manage_home_banner/{id}',[HomeBannerController::class,'manage_home_banner']);
Route::post('home_banner/manage_home_banner_process',[HomeBannerController::class,'manage_home_banner_process'])->name('home_banner.manage_home_banner_process');
Route::get('home_banner/delete/{id}',[HomeBannerController::class,'delete']);
Route::get('home_banner/status/{status}/{id}',[HomeBannerController::class,'status']);












// Logout Button Code
    Route::get('logout', function () {
       session()->forget('ADMIN_LOGIN');
       session()->forget('ADMIN_ID');
       session()->flash('message','Logout Sussessfuly');

  // admin login success now redirecting to dashboard
        return redirect('admin');

    });

});











