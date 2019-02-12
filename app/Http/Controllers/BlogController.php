<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
            $post = Post::orderby('id', 'desc')->paginate(10);
           return view('welcome')->with('posts', $post);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'post' => 'required',
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|nullable|max:1024'  
        ]);
        
        if($request->hasFile('picture'))
        {
            $file = $request->file('picture')->getClientOriginalName();
            $fileName = time().'_'.$file;
            
            $path = $request->file('picture')->storeAs('public/images', $fileName);
        }

         $post = new Post();

        $post->user_id = Auth::id();
        $post->title = $request->input('title');
        $post->body = $request->input('post');
        if(!empty($fileName)){
            $post->picture = $fileName;
        }
        
        $post->save();
        return redirect('/')->with('success', 'Post Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        //return $post;
        return view('post')->with('posts', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        //return $post;
        return view('edit')->with('posts', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'post' => 'required',
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|nullable|max:1024'  
        ]);

        if($request->hasFile('picture'))
        {
            $file = $request->file('picture')->getClientOriginalName();
            $fileName = time().'_'.$file;
            
            $path = $request->file('picture')->storeAs('public/images', $fileName);
        }

        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->body = $request->input('post');
        if(!empty($fileName)){
            $post->picture = $fileName;
        }
        $post->updated_at = NOW();
        $post->save();
        return redirect('blog/'.$post->id.'')->with('success', 'Post Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if(!empty($post->picture)){
            Storage::delete('public/images/'.$post->picture);
        }
        $post->delete();
        return redirect('/')->with('success', 'Post Deleted');
    }
}
