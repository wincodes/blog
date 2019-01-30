<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $post = Post::all();
       return view('welcome')->with('posts', $post);
    }

    public function show($id)
    {
        $post = Post::find($id);
        return $post;
    }
}
