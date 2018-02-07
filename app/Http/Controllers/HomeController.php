<?php

namespace App\Http\Controllers;

use App\Blog;
use App\BlogPost;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogPosts = BlogPost::latest()->paginate(20);

        return view('home',compact('blogPosts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $blogpost)
    {
        return view('blogpost.show',compact('blogpost'));
    }
}
