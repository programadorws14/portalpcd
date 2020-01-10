<?php

namespace App\Http\Controllers\Site;

use App\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    function show($slug)
    {
        $post = Blog::with('categoria')->whereSlug($slug)->first();
        return view('site.blog.blog_single', compact('post'));
    }
}
