<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    //
    /**
     * List all Blogs
     *
     * @return View
     */
    public function index():View{
        $blogs = Blog::where('status',Blog::PUBLISH)->paginate(10);
        return view('blog.list',compact('blogs'));
    }

    /**
     * Show a blog
     *
     * @return View
     */
    public function show(string $blog_slug):View{
        $blog = Blog::where('slug',$blog_slug)->first();
        if(!$blog){
            abort('404','Blog not found');
        }
        return view('blog.show',compact('blog'));
    }
}
