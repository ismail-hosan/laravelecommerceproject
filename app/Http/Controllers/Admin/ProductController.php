<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Brand;
use App\Models\MutiImage;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $activeVendor = User::where('status','active')->where('role','vendor')->latest()->get();
        $subcategory = Subcategory::latest()->get();
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        return view('admin.products.add',compact('brands','categories','subcategory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(1100,1100)->save('media/product/'.$name_gen);
        $save_url = ('media/product/'.$name_gen);

        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ', '-',$request->product_name)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags' => $request->product_tags,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_disc' => $request->short_disc,
            'long_disc' => $request->long_disc,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'product_thumbnail' => $save_url,
            'vendor_id' => $request->vendor_id,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        // Multiple Image Uploaded -----------------------------------------------------
        $images = $request->file('multi_img');
        foreach ($images as $img) {
            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(1100,1100)->save('media/multiImage/'.$make_name);
            $uploadPath = 'media/multiImage/'.$make_name;

            MutiImage::insert([
                'product_id' => $product_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(),
            ]);
        } // Multi Image Method End
        $notification=array(
            'message'=>'Product All Information Add Successfully ',
            'alert'=>'success'
        );
        return Redirect()->route('products')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $multi_image = MutiImage::where('product_id',$id)->get();
        // $activeVendor = User::where('status','active')->where('role','vendor')->latest()->get();
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        // dd($product);
        return view('admin.products.edit',compact('product','multi_image','brands','categories','subcategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $product_id = $request->id;

            Product::findOrFail($product_id)->Update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ', '-',$request->product_name)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags' => $request->product_tags,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_disc' => $request->short_disc,
            'long_disc' => $request->long_disc,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'vendor_id' => $request->vendor_id,
            'status' => 1,
            'updated_at' => Carbon::now(),
        ]);
        $notification=array(
            'message'=>'Product Update Without Image Successfully ',
            'alert'=>'success'
        );
        return Redirect()->route('products')->with($notification);

    }

    public function MainImageUpdate(Request $request){
        // dd($request->all());
        $pro_id = $request->id;
        $oldImage = $request->old_img;

        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(1100,1100)->save('media/product/'.$name_gen);
        $save_url = ('media/product/'.$name_gen);

        if (file_exists($oldImage)) {
            unlink($oldImage);
        }
        Product::findOrFail($pro_id)->update([
            'product_thumbnail' => $save_url,
            'updated_at' => Carbon::now(),
        ]);
        $notification=array(
            'message'=>'Product Image Update Successfully ',
            'alert'=>'success'
        );
        return Redirect()->back()->with($notification);
    }// End Method


    // MultiImage Update ----------------------------------------------

    public function MultiImageUpdate (Request $request){
        // DD($request->post());
        $imgs = $request ->multi_images;
        foreach ($imgs as $id => $img) {
            $imgDel = MutiImage::findOrFail($id);
            unlink($imgDel->photo_name);

            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(1100,1100)->save('media/multiImage/'.$make_name);
            $uploadPath = 'media/multiImage/'.$make_name;

            MutiImage::where('id',$id)->update([
                'photo_name' => $uploadPath,
                'updated_at' => Carbon::now(),
            ]);
            $notification=array(
                'message'=>'Product Multiple Image Update Successfully ',
                'alert'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
    } /// end method


    public function ProductInactive($id){
        Product::findOrFail($id)->Update(['status' => 0]);
        $notification=array(
            'message'=>'Product InActive Successfully ',
            'alert'=>'success'
        );
        return Redirect()->back()->with($notification);
    } // end method

    public function Productactive($id){
        Product::findOrFail($id)->Update(['status' => 1]);
        $notification=array(
            'message'=>'Product InActive Successfully ',
            'alert'=>'success'
        );
        return Redirect()->back()->with($notification);
    } // end method

   
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        unlink($product->product_thumbnail);
        Product::findOrFail($id)->delete();

        $images = MutiImage::where('product_id',$id)->get();
        foreach ($images as  $img) {
            unlink($img->photo_name);
            MutiImage::where('product_id',$id)->delete();
        }
        $notification=array(
            'message'=>'Product Delete Successfully ',
            'alert'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
