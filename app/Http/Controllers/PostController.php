<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function posts()
    {
        
        return view('auth.posts');
    }

    public function store(Request $request) {

    $request->validate([
        'name'=>'required',
        'description'=>'required',
        'category'=>'required',
    ]);

        Post::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'category'=>$request->category,
        ]);

        return redirect()->route('dashboard');
    }

    public function editPost(Post $post) 
    {
        return view('auth.edit-post', compact('post'));
    }

    public function update(Post $post, Request $request) 
    {

        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'category'=>'required',
        ]);
        
        $post->update([
            'name'=> $request->name,
            'description'=> $request->description,
            'category'=> $request->category
        ]);

        return redirect()->route('dashboard');
    }

    public function destroyPost($post)
    {
        $post = Post::findOrFail($post); 
        $post->delete();
        return redirect()->route('dashboard');
    }
}
