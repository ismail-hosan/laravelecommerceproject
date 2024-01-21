<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        $img = $request->file('slider_image');
        $name_gen = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(770,207)->save('media/slider/'.$name_gen);
        $save_url = 'media/slider/'.$name_gen;


        Slider::insert([
            'slider_title' => $request->slider_title,
            'slider_short_title' => $request->slider_short_title,
            'slider_image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

       $notification = array(
            'message' => 'Slider Inserted Successfully',
            'alert' => 'success'
        );

        return redirect()->route('admin.slider')->with($notification);
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
        $slider = Slider::find($id);
        return view('admin.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // dd($request->all());
        $slider_id = $request->id;
        $old_img = $request->old_image;
 
        if ($request->file('slider_image')) {
        $image = $request->file('slider_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(770,207)->save('media/slider/'.$name_gen);
        $save_url = 'media/slider/'.$name_gen;
 
        if (file_exists($old_img)) {
           unlink($old_img);
        }
 
        Slider::findOrFail($slider_id )->update([
            'slider_title' => $request->slider_title,
            'slider_short_title' => $request->slider_short_title,
            'slider_image' => $save_url,
            'updated_at' => Carbon::now(),
        ]);
 
       $notification = array(
            'message' => 'Slider Updated with image Successfully',
            'alert' => 'success'
        );
 
        return redirect()->route('admin.slider')->with($notification);
 
        } else {
 
            Slider::findOrFail($slider_id)->update([
            'slider_title' => $request->slider_title,
            'slider_short_title' => $request->slider_short_title,
            'updated_at' => Carbon::now(),
        ]);
 
       $notification = array(
            'message' => 'Slider Updated without image Successfully',
            'alert' => 'success'
        );
 
        return redirect()->route('admin.slider')->with($notification);
 
        } // end else
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
