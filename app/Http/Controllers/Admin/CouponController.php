<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Carbon\Carbon;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupon = Coupon::latest()->get();
        return view('admin.coupon.index',compact('coupon'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.coupon.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Coupon::insert([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'created_at' => Carbon::now(),
        ]);
        $notification=array(
            'message'=>'Coupon Inserted Successfully ',
            'alert'=>'success'
        );
        return Redirect()->route('admin.coupon')->with($notification);
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
        $coupon = Coupon::findOrFail($id);
        return view('admin.coupon.edit',compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $coupon_id = $request->id;

        Coupon::findOrFail($coupon_id)->Update([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'updated_at' => Carbon::now(),
        ]);
        $notification=array(
            'message'=>'Coupon Updated Successfully ',
            'alert'=>'success'
        );
        return Redirect()->route('admin.coupon')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Coupon::findOrFail($id)->delete();

        $notification=array(
            'message'=>'Coupon Delete Successfully ',
            'alert'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
