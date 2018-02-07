<?php

namespace App\Http\Controllers;

use App\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogPostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogPosts = BlogPost::latest()->paginate(10);

        return view('home',compact('blogPosts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogpost.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $data = array_merge($request->all(), ['user_id' => Auth::id()]);

        $blogPost = BlogPost::create($data);

        return redirect()
            ->route('blogposts.show', $blogPost)
            ->with('success','Blog post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BlogPost  $blogpost
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $blogpost)
    {
        return view('blogpost.show',compact('blogpost'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BlogPost  $blogpost
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPost $blogpost)
    {
        return view('blogpost.edit',compact('blogpost'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BlogPost  $blogpost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPost $blogpost)
    {
        if (!$this->checkUser($blogpost->id)) {
            return redirect()->route('home')
                ->with('error','This is not your post');
        }

        request()->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $blogpost->update($request->all());
        $blogpost->save();

        return redirect()
            ->route('blogposts.show', $blogpost)
            ->with('success','Blog post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$this->checkUser($id)) {
            return redirect()->route('home')
                ->with('error','This is not your post');
        }

        BlogPost::destroy($id);

        return redirect()->route('home')
            ->with('success','Post deleted successfully');
    }

    /**
     * Check that a user can edit/update/delete
     *
     * @param $blogPostId
     * @return bool
     */
    private function checkUser ($blogPostId) {

        $blogPost = BlogPost::find($blogPostId);
        $isAdmin = Auth::user() && Auth::user()->admin;
        return $blogPost instanceof BlogPost && ($blogPost->user->id == Auth::id() || $isAdmin);
    }
}
