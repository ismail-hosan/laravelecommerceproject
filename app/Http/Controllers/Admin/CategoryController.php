<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorys = Category::latest()->get();
        return view('admin.category.index',compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $img = $request->file('category_image');
        $name_gen = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(1103,906)->save('media/blog/'.$name_gen);
        $save_url = 'media/blog/'.$name_gen;


        Category::insert([
            'category_name' =>$request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-',$request->category_name)),
            'category_image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

       $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert' => 'success'
        );

        return redirect()->route('admin.category')->with($notification);
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
        $category = Category::findOrFail($id);
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $category_id = $request->id;
        $old_img = $request->old_image;
 
        if ($request->file('category_image')) {
        $image = $request->file('category_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(1103,906)->save('media/category/'.$name_gen);
        $save_url = 'media/category/'.$name_gen;
 
        if (file_exists($old_img)) {
           unlink($old_img);
        }
 
        Category::findOrFail($post_id)->update([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-',$request->category_name)),
            'category_image' => $save_url,
            'updated_at' => Carbon::now(),
        ]);
 
       $notification = array(
            'message' => 'Category Updated with image Successfully',
            'alert' => 'success'
        );
 
        return redirect()->route('admin.category')->with($notification);
 
        } else {
 
            BlogPost::findOrFail($post_id)->update([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-',$request->category_name)),
            'updated_at' => Carbon::now(),
        ]);
 
       $notification = array(
            'message' => 'Category Updated without image Successfully',
            'alert' => 'success'
        );
 
        return redirect()->route('admin.category')->with($notification);
 
        } // end else
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = BlogPost::findOrFail($id);

        $img = $category->category_image;
        unlink($img);

        BlogPost::findOrFail($id)->delete();
        
        $notification=array(
            'message'=>'Category Delete Successfully ',
            'alert'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
