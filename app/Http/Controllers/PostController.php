<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\controllers\PostController;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    return view ('post');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //return 'posting Now ...';
    //return request('message');
    //$message = request('message');
    $request->validate([
        'messge' => ['required','string'],
    ]);
    Post::create([
      //'message' => $message,
      'message' => $request->get('message'),
      'user_id' => auth()->id(),
    ]);
    return to_route('posts.index')->with ('status',_('post created succesfully!'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
