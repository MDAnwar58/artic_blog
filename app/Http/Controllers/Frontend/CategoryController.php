<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($slug)
    {
    	$category = Category::where('slug', $slug)->with('blogs')->first();
    	$blogs = Blog::orderBy('id', 'DESC')->where('category_id', $category->id)->paginate(1);
    	return view('frontend.blog.index', compact('blogs'));
    }
}
