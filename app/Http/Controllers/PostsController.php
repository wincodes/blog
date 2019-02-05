<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'post' => 'required'  
        ]);

        $post = new Post();

        $post->title = $request->input('title');
        $post->body = $request->input('post');
        $post->save();
        return redirect('/')->with('success', 'Post Added!');
    }

    public function index()
    {
        $post = Post::orderby('id', 'desc')->paginate(10);
       return view('welcome')->with('posts', $post);
    }

    public function show($id)
    {
        $post = Post::find($id);
        //return $post;
        return view('post')->with('posts', $post);
    }

    public function new()
    {
        return view('new');
    }

    
}
