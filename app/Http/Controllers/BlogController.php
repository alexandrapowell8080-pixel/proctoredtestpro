<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
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
        $blogs = Blog::with(['category:id,name'])->where('status',Blog::PUBLISH)->paginate(10);
        $categories = Category::all();
        return view('blog.list',compact('blogs','categories'));
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
        $related_blogs = Blog::where('category_id',$blog->category_id)->whereNot('id',$blog->id)->take(5)->get();
        return view('blog.show',compact('blog','related_blogs'));
    }
}
