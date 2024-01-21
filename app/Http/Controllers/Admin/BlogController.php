<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class BlogController extends Controller
{
    // Blog Category Method  //
    public function blog_category()
    {
        $blogcategoryies = BlogCategory::latest()->get();
        return view('admin.blog.blog_category.index_blog_category',compact('blogcategoryies'));
    }

    public function add_blog_category()
    {
        return view('admin.blog.blog_category.add_blog_category');
    }

    public function store_blog_category(Request $request)
    {
        BlogCategory::insert([
            'category_name' => $request->blog_category_name,
            'category_slug' => strtolower(str_replace(' ', '-',$request->blog_category_name)),
            'created_at' => Carbon::now(),
        ]);

       $notification = array(
            'message' => 'Blog Category Inserted Successfully',
            'alert' => 'success'
        );

        return redirect()->route('admin.blog_category')->with($notification);
    }

    public function edit_blog_category($id)
    {
        $blogcategory = BlogCategory::findOrFail($id);
        return view('admin.blog.blog_category.edit_blog_category',compact('blogcategory')); 
    }

    public function delete_blog_category($id)
    {
        BlogCategory::findOrFail($id)->delete();

        $notification=array(
            'message'=>'Blog Category  Delete Successfully ',
            'alert'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function update_blog_category(Request $request)
    {
        // dd($request->all());
        $blog_id = $request->id;

        BlogCategory::findOrFail($blog_id)->update([
            'category_name' => $request->blog_category_name,
            'category_slug' => strtolower(str_replace(' ', '-',$request->blog_category_name)),
        ]);

       $notification = array(
            'message' => 'Blog Category Updated Successfully',
            'alert' => 'success'
        );

        return redirect()->route('admin.blog_category')->with($notification);
    }

    //End Blog Category Method//



    // Start Blog Post Method//
    public function blog_post()
    {
        $blogs = BlogPost::latest()->get();
        return view('admin.blog.blog_post.index',compact('blogs'));
    }

    public function add_blog_post()
    {
        $blogs = BlogCategory::latest()->get();
        return view('admin.blog.blog_post.add_blog',compact('blogs'));

    }

    public function store_blog_post(Request $request)
    {
        $img = $request->file('post_image');
        $name_gen = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(1103,906)->save('media/blog/'.$name_gen);
        $save_url = 'media/blog/'.$name_gen;


        BlogPost::insert([
            'category_id' => $request->category_id,
            'post_title' => $request->post_title,
            'post_slug' => strtolower(str_replace(' ', '-',$request->post_title)),
            'post_image' => $save_url,
            'post_short_desc' => $request->post_short_description,
            'post_long_desc' => $request->post_long_description,
            'created_at' => Carbon::now(),
        ]);

       $notification = array(
            'message' => 'Blog Post Inserted Successfully',
            'alert' => 'success'
        );

        return redirect()->route('admin.blog_post')->with($notification);
    }

    public function edit_blog_post($id)
    {
        $blogcategory = BlogCategory::latest()->get();
        $blogpost = BlogPost::findOrFail($id);
        return view('admin.blog.blog_post.edit_blog',compact('blogpost','blogcategory')); 
    }

    public function delete_blog_post($id)
    {
        BlogPost::findOrFail($id)->delete();

        $notification=array(
            'message'=>'Blog Post Delete Successfully ',
            'alert'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function update_blog_category_post(Request $request)
    {
        $post_id = $request->id;
       $old_img = $request->old_image;

       if ($request->file('post_image')) {
       $image = $request->file('post_image');
       $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
       Image::make($image)->resize(1103,906)->save('media/blog/'.$name_gen);
       $save_url = 'media/blog/'.$name_gen;

       if (file_exists($old_img)) {
          unlink($old_img);
       }

       BlogPost::findOrFail($post_id)->update([
           'category_id' => $request->category_id,
           'post_title' => $request->post_title,
           'post_slug' => strtolower(str_replace(' ', '-',$request->post_title)),
           'post_short_desc' => $request->post_short_description,
           'post_long_desc' => $request->post_long_description,
           'post_image' => $save_url,
           'updated_at' => Carbon::now(),
       ]);

      $notification = array(
           'message' => 'Blog Post Updated with image Successfully',
           'alert' => 'success'
       );

       return redirect()->route('admin.blog.post')->with($notification);

       } else {

           BlogPost::findOrFail($post_id)->update([
           'category_id' => $request->category_id,
           'post_title' => $request->post_title,
           'post_slug' => strtolower(str_replace(' ', '-',$request->post_title)),
           'post_short_desc' => $request->post_short_description,
           'post_long_desc' => $request->post_long_description,
           'updated_at' => Carbon::now(),
       ]);

      $notification = array(
           'message' => 'Blog Post Updated without image Successfully',
           'alert' => 'success'
       );

       return redirect()->route('admin.blog_post')->with($notification);

       } // end else
    }

    //End Blog Post Method//

}


