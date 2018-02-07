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
//        $members = Member::latest()->paginate(10);
//        return view('members.index',compact('members'))
//            ->with('i', (request()->input('page', 1) - 1) * 5);

        $blogPosts = BlogPost::latest()->paginate(20);
        return view('home', ['blogPosts' => $blogPosts]);
    }
}
