<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use App\Models\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('admin.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('media/brand/'.$name_gen);
        $save_url = ('media/brand/'.$name_gen);

        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_slug' => strtolower(str_replace(' ', '-',$request->brand_name)),
            'brand_image' => $save_url,
            'created_at' => Carbon::now(),
        ]);
        $notification=array(
            'message'=>'Brand Image Uploaded Successfully ',
            'alert'=>'success'
        );
        return Redirect()->route('admin.brand')->with($notification);

    // End Method
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
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $brand_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('brand_image')) {
            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('media/brand/'.$name_gen);
            $save_url = ('media/brand/'.$name_gen);

            if (file_exists($old_img)) {
                unlink($old_img);
            }

            Brand::findOrFail($brand_id)->Update([
                'brand_name' => $request->brand_name,
                'brand_slug' => strtolower(str_replace(' ', '-',$request->brand_name)),
                'brand_image' => $save_url,
                'created_at' => Carbon::now(),
            ]);
            $notification=array(
                'message'=>'Brand Updated With Image Successfully ',
                'alert'=>'success'
            );
            return Redirect()->route('admin.brand')->with($notification);
        } else {
            Brand::findOrFail($brand_id)->Update([
                'brand_name' => $request->brand_name,
                'brand_slug' => strtolower(str_replace(' ', '-',$request->brand_name)),
                'created_at' => Carbon::now()
            ]);
            $notification=array(
                'message'=>'Brand Updated Without Image Successfully ',
                'alert'=>'success'
            );
            return Redirect()->route('admin.brand')->with($notification);
        }
     // End Method
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);
        $img = $brand->brand_image;
        unlink($img);

        Brand::findOrFail($id)->delete();

        $notification=array(
            'message'=>'Brand Data Delete Successfully ',
            'alert'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
