<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blog;

class blogsController extends Controller
{
    public function blogsList(){

        $data['blog'] = Blog::get();
        // dd($data);
        return view('blogs_listing',$data);
    }

    public function addBlogs(){

        return view('addBlogs');
    }

    public function addBlogData(Request $request){

        // dd($request->all());

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        Blog::create(['name'=>$request->name,
                    'date'=>$request->date,
                    'description'=>$request->description,
                    'image'=>$imageName
                ]); 

        return response()->json(['success' => true, 'message' => 'Form submitted successfully']);
    }

    public function filterBlogs(Request $request)
    {
        if($request->ajax()) {
            $from_date = $request->get('from_date');
            $to_date = $request->get('to_date');
            
            $blogs = Blog::whereBetween('date', [$from_date, $to_date])->get();
            
            return response()->json($blogs);
        }
    }
}
