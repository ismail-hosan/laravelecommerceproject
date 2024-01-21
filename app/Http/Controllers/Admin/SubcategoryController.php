<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use Carbon\Carbon;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategorys = Subcategory::latest()->get();
        return view('admin.sub-category.index',compact('subcategorys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::latest()->get();
        return view('admin.sub-category.add',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Subcategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name' =>$request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ', '-',$request->subcategory_name)),
            'created_at' => Carbon::now(),
        ]);

       $notification = array(
            'message' => 'Sub Category Inserted Successfully',
            'alert' => 'success'
        );

        return redirect()->route('admin.subcategory')->with($notification);
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
        $categorys = Category::latest()->get();
        $subcategorys = Subcategory::findOrFail($id);
        return view('admin.sub-category.edit',compact(['subcategorys','categorys']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $subCat_id = $request->id;
        Subcategory::findOrFail($subCat_id)->Update([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ', '-',$request->subcategory_name)),
        ]);
        $notification=array(
            'message'=>' Sub Category Update Successfully ',
            'alert'=>'success'
        );
        return Redirect()->route('admin.subcategory')->with($notification);
 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
