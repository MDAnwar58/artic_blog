<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
    	$blogs = Blog::orderBy('id', 'DESC')->paginate(1);
    	return view('frontend.blog.index', compact('blogs'));
    }
    public function show($slug)
    {
    	$blog = Blog::where('slug', $slug)->firstOrFail();
        $comments = Comment::with('child.user')->where('blog_id', $blog->id)->where('p_id', 0)->get();
        $countComments = Comment::where('blog_id', $blog->id)->where('p_id', 0)->count();
    	return view('frontend.blog.show', compact('blog', 'comments', 'countComments'));
    }
}
