<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $post = Post::orderby('id', 'desc')->paginate(10);
       return view('welcome')->with('posts', $post);
    }

    public function show($title)
    {
        $post = Post::where('title', $title)->get();
        return $post;
    }
}
