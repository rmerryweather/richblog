<?php

namespace App\Http\Controllers;

use App\Blog;
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
        return view('home');
    }

    /**
     * Test method for Rich to test with
     */
    public function test()
    {
        $blogs = Blog::all();
        var_dump($blogs);exit;

        // TODO clean all this up later - but it is working for now!

        $blog = new Blog();
        $blog->name = 'RARRRGHLRBK';
        $blog->save();
    }
}
