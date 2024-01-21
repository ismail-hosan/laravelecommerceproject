<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Divison;
use App\Models\State;
use Carbon\Carbon;

class ShippingController extends Controller
{
    

    //---------- District --------//
    public function districtindex()
    {
        $district = District::latest()->get();
        return view('admin.shipping.district.index',compact('district'));
    }

   
    public function districtcreate()
    {
        $division = Divison::orderBy('division_name','ASC')->latest()->get();
        return view('admin.shipping.district.add',compact('division'));
    }


    public function districtstore(Request $request)
    {
        District::insert([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now(),
        ]);
        $notification=array(
            'message'=>'District Inserted Successfully ',
            'alert'=>'success'
        );
        return Redirect()->route('admin.district')->with($notification);
    }

    
    public function show(string $id)
    {
        //
    }

    
    public function districtedit(string $id)
    {
        $division = Divison::orderBy('division_name','ASC')->latest()->get();
        $district = District::findOrFail($id);
        return view('admin.shipping.district.edit',compact('division','district'));
    }

    
    public function districtupdate(Request $request)
    {
        // dd($request->all());
        $district_id = $request->id;

        District::findOrFail($district_id)->Update([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'updated_at' => Carbon::now(),
        ]);
        $notification=array(
            'message'=>'District Updated Successfully ',
            'alert'=>'success'
        );
        return Redirect()->route('admin.district')->with($notification);
    }

    
    public function districtdestroy(string $id)
    {
        District::findOrFail($id)->delete();

        $notification=array(
            'message'=>'District Delete Successfully ',
            'alert'=>'success'
        );
        return Redirect()->back()->with($notification);
    }



    //---------- Divison ----------//

    public function divisonindex()
    {
        $division = Divison::latest()->get();
        return view('admin.shipping.division.index',compact('division'));
    }


    public function divisoncreate()
    {
        return view('admin.shipping.division.add');
    }


    public function divisonstore(Request $request)
    {
        Divison::insert([
            'division_name' => $request->division_name,
            'created_at' => Carbon::now(),
        ]);
        $notification=array(
            'message'=>'Division Inserted Successfully ',
            'alert'=>'success'
        );
        return Redirect()->route('admin.divison')->with($notification);
    }

    public function divisonedit($id)
    {
        $division = Divison::findOrFail($id);
        return view('admin.shipping.division.edit',compact('division'));
    }

    public function divisonupdate(Request $request)
    {
        $shipping_id = $request->id;

        Divison::findOrFail($shipping_id)->Update([
            'division_name' => $request->division_name,
            'updated_at' => Carbon::now(),
        ]);
        $notification=array(
            'message'=>'Division Updated Successfully ',
            'alert'=>'success'
        );
        return Redirect()->route('admin.divison')->with($notification);
    }

    public function divisondestroy($id)
    {
        Divison::findOrFail($id)->delete();

        $notification=array(
            'message'=>'Division Delete Successfully ',
            'alert'=>'success'
        );
        return Redirect()->back()->with($notification);
    }


     //---------- State ----------//

     public function stateindex(){
        $state = State::latest()->get();
        return view('admin.shipping.state.index',compact('state'));
    } // End Method


    public function statecreate(){
        $division = Divison::orderBy('division_name','ASC')->latest()->get();
        $district = District::orderBy('district_name','ASC')->latest()->get();
        return view('admin.shipping.state.add',compact('division','district'));
    } // End Method


    public function GetDistrict($district_id){

        $district = District::where('division_id',$district_id)->orderBy('district_name','ASC')->get();
        return json_encode($district);

    } //End Method

    public function statestore(Request $request){

        State::insert([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name' => $request->state_name,
            'created_at' => Carbon::now(),
        ]);
        $notification=array(
            'message'=>'State Inserted Successfully ',
            'alert'=>'success'
        );
        return Redirect()->route('state')->with($notification);
    } // End Method

    public function stateedit($id){
        $division = Divison::orderBy('division_name','ASC')->latest()->get();
        $district = District::orderBy('district_name','ASC')->latest()->get();
        $state = State::findOrFail($id);
        return view('admin.shipping.state.edit',compact('division','district','state'));
    } // End Method


    public function stateupdate(Request $request){
        $state_id = $request->id;

        State::findOrFail($state_id)->Update([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name' => $request->state_name,
            'updated_at' => Carbon::now(),
        ]);
        $notification=array(
            'message'=>'State Updated Successfully ',
            'alert'=>'success'
        );
        return Redirect()->route('state')->with($notification);

    } // End Method

    public function statedestroy($id){
        State::findOrFail($id)->delete();

        $notification=array(
            'message'=>'State Delete Successfully ',
            'alert'=>'success'
        );
        return Redirect()->back()->with($notification);
    } // End Method
}
