<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

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
   
    // Post::create([
    //   //'message' => $message,
    //   'message' => $request->get('message'),
    //   'user_id' => auth()->id(),
    // ]);
    $dataValidates=$request->validate([
        'message' => ['required', 'min:8', 'max:255'],
    ]);
    //primero accedioento al user desde el request, luego a post desde iser y finalmente 
    //a create desde post, ahora solo pasar los datos
    @dump($dataValidates);
    $request->user()->post()->create([
        'message' => $request->get('message'),
    ]);
        return to_route('posts.index')->with ('status',__('post create succesfully!'));
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
     // return view('posts/edit',['post' => $post]);
     $this->authorize('update',$post);
     return view('posts/edit',[
        'post' => $post,
     ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $this -> authorize('update', $post);

        $dataValidates = $request->validate([
            'message' =>['required', 'min:8','max:255'],
        ]);
        $post->update($dataValidates);
        return to_route('posts.index')->with('status', __('post update succefully!'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
     $post->delete();
     return to_route('post.index')-> with ('status')
    }
}
