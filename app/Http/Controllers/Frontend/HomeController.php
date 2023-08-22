<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
    	$blogs = Blog::orderBy('id', 'DESC')->take(3)->get();
    	return view('frontend.home.index', compact('blogs'));
    }
}
