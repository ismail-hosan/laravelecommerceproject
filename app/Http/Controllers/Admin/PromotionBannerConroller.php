<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PBanner; 
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class PromotionBannerConroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pbanners = PBanner::latest()->get();
        return view('admin.promotion-banner.index',compact('pbanners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.promotion-banner.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        
        $mimage = $request->file('pbanner_main_image');
        $dimage = $request->file('pbanner_discount_image');
        // dd($dimage);

        $name_gen = hexdec(uniqid()).'.'.$mimage->getClientOriginalExtension();
        Image::make($mimage)->resize(711,507)->save('media/pbanner/main_image'.$name_gen);
        $main_save_url = ('media/pbanner/main_image'.$name_gen);

        $disname_gen = hexdec(uniqid()).'.'.$dimage->getClientOriginalExtension();
        Image::make($dimage)->resize(155,135)->save('media/pbanner/dis_image'.$disname_gen);
        $dis_save_url = ('media/pbanner/dis_image'.$disname_gen);

        PBanner::insert([
            'pbanner_name' => $request->pbanner_name,
            'end_date' => $request->pbanner_end_date,
            'pbanner_m_image' => $main_save_url,
            'pbanner_d_image' => $dis_save_url,
            'created_at' => Carbon::now(),
        ]);
        $notification=array(
            'message'=>'promotion Banner Uploaded Successfully ',
            'alert'=>'success'
        );
        return Redirect()->route('admin.pbanner')->with($notification);

    }// End Method

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pbanner = PBanner::findOrFail($id);
        return view('admin.promotion-banner.edit',compact('pbanner'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pbanner = PBanner::findOrFail($id);
        return view('admin.promotion-banner.edit',compact('pbanner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // dd($request->all());
        $banner_id = $request->id;
        $old_img = $request->main_old_image;
        $dis_main_old = $request->dis_old_image;

        if($request->file('pbanner_main_image') && $request->file('pbanner_discount_image'))
        {
            $m_image = $request->file('pbanner_main_image');
            $m_name_gen = hexdec(uniqid()).'.'.$m_image->getClientOriginalExtension();
            Image::make($m_image)->resize(711,507)->save('media/pbanner'.$m_name_gen);
            $main_save_url = ('media/pbanner'.$m_name_gen);

            unlink($old_img);

            $d_image = $request->file('pbanner_discount_image');
            $d_name_gen = hexdec(uniqid()).'.'.$d_image->getClientOriginalExtension();
            Image::make($d_image)->resize(711,507)->save('media/pbanner'.$d_name_gen);
            $dis_save_url = ('media/pbanner'.$d_name_gen);

            unlink($dis_main_old);

            PBanner::findOrFail($banner_id)->Update([
                'pbanner_name' => $request->pbanner_name,
                'end_date' => $request->pbanner_end_date,
                'pbanner_m_image' => $main_save_url,
                'pbanner_d_image' => $dis_save_url,
                'updated_at' => Carbon::now(),
            ]);
            $notification=array(
                'message'=>'promoted Banner Updated With All Image Successfully',
                'alert'=>'success'
            );
            return Redirect()->route('admin.pbanner')->with($notification);

        }
        elseif($request->file('pbanner_main_image'))
        {
            $image = $request->file('pbanner_main_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(711,507)->save('media/pbanner'.$name_gen);
            $main_save_url = ('media/pbanner'.$name_gen);

            if (file_exists($old_img)) {
                unlink($old_img);
            }

            PBanner::findOrFail($banner_id)->Update([
                'pbanner_name' => $request->pbanner_name,
                'end_date' => $request->pbanner_end_date,
                'pbanner_m_image' => $main_save_url,
                'updated_at' => Carbon::now(),
            ]);
            $notification=array(
                'message'=>'promoted Banner Updated With Main Image Successfully',
                'alert'=>'success'
            );
            return Redirect()->route('admin.pbanner')->with($notification);
        }
        elseif($request->file('pbanner_discount_image'))
        {
            $image = $request->file('pbanner_discount_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(711,507)->save('media/pbanner'.$name_gen);
            $dis_save_url = ('media/pbanner'.$name_gen);

            if (file_exists($dis_main_old)) {
                unlink($dis_main_old);
            }

            PBanner::findOrFail($banner_id)->Update([
                'pbanner_name' => $request->pbanner_name,
                'end_date' => $request->pbanner_end_date,
                'pbanner_d_image' => $dis_save_url,
                'updated_at' => Carbon::now(),
            ]);
            $notification=array(
                'message'=>'promoted Banner Updated With Discount Image Successfully',
                'alert'=>'success'
            );
            return Redirect()->route('admin.pbanner')->with($notification);
        }
        else {
            PBanner::findOrFail($banner_id)->Update([
                'pbanner_name' => $request->pbanner_name,
                'end_date' => $request->pbanner_end_date,
            ]);
            $notification=array(
                'message'=>'Promoted Banner Updated Without Image Successfully ',
                'alert'=>'success'
            );
            return Redirect()->route('admin.pbanner')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
