<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\ShippingController;
use App\Http\Controllers\Admin\PromotionBannerConroller;
use App\Http\Controllers\Admin\OrderController;






Route::get('/',[IndexController::class,'index'])->name('index');


Auth::routes();



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('user', [UserController::class, 'index'])->name('user.dashboard');




//============================== All Admin Part ==========================//

Route::group(['prefix'=>'admin','middleware'=>['admin','auth'],'namespace'=>'Admin'],function(){

    //----------------------- Admin Home Page ---------------//
    Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');


    //---------------------- Admin Banner Part --------------//
    Route::get('banner',[BannerController::class,'index'])->name('admin.banner');
    Route::get('add/banner',[BannerController::class,'add'])->name('admin.add.banner');
    Route::post('banner/store', [BannerController::class, 'store'])->name('banner.store');
    Route::get('banner/edit/{id}',[BannerController::class,'edit'])->name('admin.edit.banner');
    Route::get('banner/delete/{id}',[BannerController::class,'delete'])->name('admin.delete.banner');
    Route::post('banner/update', [BannerController::class, 'update'])->name('admin.update.banner');


    //---------------------- Admin Blog Category Part --------------//
    Route::get('blog_category',[BlogController::class,'blog_category'])->name('admin.blog_category');
    Route::get('add/blog_category',[BlogController::class,'add_blog_category'])->name('admin.add.blog_category');
    Route::post('blog/store/blog_category', [BlogController::class, 'store_blog_category'])->name('banner.store.blog_category');
    Route::get('blog/edit/{id}',[BlogController::class,'edit_blog_category'])->name('admin.edit.blog_category');
    Route::get('blog/delete/{id}',[BlogController::class,'delete_blog_category'])->name('admin.delete.blog_category');
    Route::post('blog/update', [BlogController::class, 'update_blog_category'])->name('admin.update.blog_category');


    //---------------------- Admin Blog Post --------------//
    Route::get('blog_post',[BlogController::class,'blog_post'])->name('admin.blog_post');
    Route::get('add/blog_post',[BlogController::class,'add_blog_post'])->name('admin.add.blog_post');
    Route::post('blog/store/blog_post', [BlogController::class, 'store_blog_post'])->name('banner.store.blog_post');
    Route::get('blog/edit/{id}',[BlogController::class,'edit_blog_post'])->name('admin.edit.blog_post');
    Route::get('blog/delete/{id}',[BlogController::class,'delete_blog_post'])->name('admin.delete.blog_post');
    Route::post('blog/update', [BlogController::class, 'update_blog_category_post'])->name('admin.update.blog_post');


    //---------------------- Admin Category --------------//
    Route::get('admin/category',[CategoryController::class,'index'])->name('admin.category');
    Route::get('add/category',[CategoryController::class,'create'])->name('admin.category.add');
    Route::post('category/store', [CategoryController::class, 'store'])->name('banner.store.category');
    Route::get('category/edit/{id}',[CategoryController::class,'edit'])->name('admin.edit.category');
    Route::get('category/delete/{id}',[CategoryController::class,'destroy'])->name('admin.delete.category');
    Route::post('category/update', [CategoryController::class, 'update'])->name('admin.update.category');


    //---------------------- Admin Sub Category --------------//
    Route::get('admin/subcategory',[SubcategoryController::class,'index'])->name('admin.subcategory');
    Route::get('add/subcategory',[SubcategoryController::class,'create'])->name('admin.subcategory.add');
    Route::post('sub/store', [SubcategoryController::class, 'store'])->name('banner.store.subcategory');
    Route::get('subcategory/edit/{id}',[SubcategoryController::class,'edit'])->name('admin.edit.subcategory');
    Route::get('subcategory/delete/{id}',[SubcategoryController::class,'destroy'])->name('admin.delete.subcategory');
    Route::post('subcategory/update', [SubcategoryController::class, 'update'])->name('admin.update.subcategory');


    //---------------------- Admin Slider  --------------//
    Route::get('admin/slider',[SliderController::class,'index'])->name('admin.slider');
    Route::get('add/slider',[SliderController::class,'create'])->name('admin.slider.add');
    Route::post('store/slider', [SliderController::class, 'store'])->name('slider.store');
    Route::get('slider/edit/{id}',[SliderController::class,'edit'])->name('admin.edit.slider');
    Route::get('slider/delete/{id}',[SliderController::class,'destroy'])->name('admin.delete.slider');
    Route::post('slider/update', [SliderController::class, 'update'])->name('admin.update.slider');

     //---------------------- Admin Slider  --------------//
    Route::get('admin/slider',[SliderController::class,'index'])->name('admin.slider');
    Route::get('add/slider',[SliderController::class,'create'])->name('admin.slider.add');
    Route::post('store/slider', [SliderController::class, 'store'])->name('slider.store');
    Route::get('slider/edit/{id}',[SliderController::class,'edit'])->name('admin.edit.slider');
    Route::get('slider/delete/{id}',[SliderController::class,'destroy'])->name('admin.delete.slider');
    Route::post('slider/update', [SliderController::class, 'update'])->name('admin.update.slider');
    

 //---------------------- Admin Slider  --------------//
    Route::get('admin/slider',[SliderController::class,'index'])->name('admin.slider');
    Route::get('add/slider',[SliderController::class,'create'])->name('admin.slider.add');
    Route::post('store/slider', [SliderController::class, 'store'])->name('slider.store');
    Route::get('slider/edit/{id}',[SliderController::class,'edit'])->name('admin.edit.slider');
    Route::get('slider/delete/{id}',[SliderController::class,'destroy'])->name('admin.delete.slider');
    Route::post('slider/update', [SliderController::class, 'update'])->name('admin.update.slider');
    
    

    //---------------------- Admin Brands  --------------//
    Route::get('admin/brand',[BrandController::class,'index'])->name('admin.brand');
    Route::get('add/brand',[BrandController::class,'create'])->name('admin.brand.add');
    Route::post('store/brand', [BrandController::class, 'store'])->name('admin.brand.store');
    Route::get('brand/edit/{id}',[BrandController::class,'edit'])->name('admin.edit.brand');
    Route::get('brand/delete/{id}',[BrandController::class,'destroy'])->name('admin.delete.brand');
    Route::post('brand/update', [BrandController::class, 'update'])->name('admin.update.brand');


    //---------------------- Admin Products  --------------//
    Route::get('products',[ProductController::class,'index'])->name('products');
    Route::get('add/products',[ProductController::class,'create'])->name('products.add');
    Route::post('store/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('products/edit/{id}',[ProductController::class,'edit'])->name('admin.edit.products');
    Route::get('products/delete/{id}',[ProductController::class,'destroy'])->name('admin.delete.products');
    Route::get('products/active/{id}',[ProductController::class,'Productactive'])->name('admin.active.products');
    Route::get('products/inactive/{id}',[ProductController::class,'ProductInactive'])->name('admin.inactive.products');
    Route::post('products/update', [ProductController::class, 'update'])->name('admin.update.products');
    Route::post('products/mainimage/update', [ProductController::class, 'MainImageUpdate'])->name('admin.update.productmainimage');
    Route::post('products/multiimage/update', [ProductController::class, 'MultiImageUpdate'])->name('admin.update.productmultiimage');


     //---------------------- Admin Coupon  --------------//
     Route::get('admin/coupon',[CouponController::class,'index'])->name('admin.coupon');
     Route::get('add/coupon',[CouponController::class,'create'])->name('admin.coupon.add');
     Route::post('store/coupon', [CouponController::class, 'store'])->name('coupon.store');
     Route::get('coupon/edit/{id}',[CouponController::class,'edit'])->name('admin.edit.coupon');
     Route::get('coupon/delete/{id}',[CouponController::class,'destroy'])->name('admin.delete.coupon');
     Route::post('coupon/update', [CouponController::class, 'update'])->name('admin.update.coupon');


     //---------------------- Admin District  --------------//
     Route::get('admin/district',[ShippingController::class,'districtindex'])->name('admin.district');
     Route::get('add/district',[ShippingController::class,'districtcreate'])->name('admin.district.add');
     Route::post('store/district', [ShippingController::class, 'districtstore'])->name('district.store');
     Route::get('district/edit/{id}',[ShippingController::class,'districtedit'])->name('admin.edit.district');
     Route::get('district/delete/{id}',[ShippingController::class,'districtdestroy'])->name('admin.delete.district');
     Route::post('district/update', [ShippingController::class, 'districtupdate'])->name('admin.update.district');



     //---------------------- Admin Divison  --------------//
     Route::get('admin/divison',[ShippingController::class,'divisonindex'])->name('admin.divison');
     Route::get('add/divison',[ShippingController::class,'divisoncreate'])->name('admin.divison.add');
     Route::post('store/divison', [ShippingController::class, 'divisonstore'])->name('divison.store');
     Route::get('divison/edit/{id}',[ShippingController::class,'divisonedit'])->name('admin.edit.divison');
     Route::get('divison/delete/{id}',[ShippingController::class,'divisondestroy'])->name('admin.delete.divison');
     Route::post('divison/update', [ShippingController::class, 'divisonupdate'])->name('admin.update.divison');


     //---------------------- Admin state  --------------//
     Route::get('admin/state',[ShippingController::class,'stateindex'])->name('admin.state');
     Route::get('add/state',[ShippingController::class,'statecreate'])->name('admin.state.add');
     Route::post('store/state', [ShippingController::class, 'statestore'])->name('state.store');
     Route::get('state/edit/{id}',[ShippingController::class,'stateedit'])->name('admin.edit.state');
     Route::get('state/delete/{id}',[ShippingController::class,'statedestroy'])->name('admin.delete.state');
     Route::post('state/update', [ShippingController::class, 'stateupdate'])->name('admin.update.state');



     //---------------------- Admin Promotion Banner  --------------//
     Route::get('admin/pbanner',[PromotionBannerConroller::class,'index'])->name('admin.pbanner');
     Route::get('add/pbanner',[PromotionBannerConroller::class,'create'])->name('admin.pbanner.add');
     Route::post('store/pbanner', [PromotionBannerConroller::class, 'store'])->name('pbanner.store');
     Route::get('pbanner/edit/{id}',[PromotionBannerConroller::class,'edit'])->name('admin.edit.pbanner');
     Route::get('pbanner/delete/{id}',[PromotionBannerConroller::class,'destroy'])->name('admin.delete.pbanner');
     Route::post('pbanner/update', [PromotionBannerConroller::class, 'update'])->name('admin.update.pbanner');




     // ------------------------------ Admin Order Manage Page ----------------------------------
     Route::get('All/orders', [OrderController::class,'AllOrder'])->name('admin.all.order');
     Route::get('pending/order', [OrderController::class,'PendingOrder'])->name('pending.order');
     Route::get('confirmed/order', [OrderController::class,'ConfirmedOrder'])->name('admin.confirmed.order');
     Route::get('processing/order', [OrderController::class,'ProcessingOrder'])->name('admin.processing.order');
     Route::get('delivered/order', [OrderController::class,'DeliveredOrder'])->name('admin.delivered.order');
     Route::get('order/details/{id}', [OrderController::class,'AdminOrderDetails'])->name('admin.order.details');
     Route::get('pending/confirm/{order_id}', [OrderController::class,'PendingToConfirm'])->name('pending-confirm');
     Route::get('confirm/delivered{order_id}', [OrderController::class,'ConfirmToDelivered'])->name('confirm-delivered');
     Route::get('processing/delivered/{order_id}', [OrderController::class,'ProcessingToDelivered'])->name('processing-delivered');
     Route::get('invoice/download/{order_id}', [OrderController::class,'InvoiceDownload'])->name('admin.invoice.download'); 
    

});

