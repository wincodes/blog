@extends('layout')

@section('content')
    <h2 class="heading"> Blog Posts</h2>
    @if(count($posts) > 1)
        @foreach ($posts as $post)
        <div class="card" style="padding: 10px;">
                {{--<img src="..." class="card-img-top" alt="...">--}}
                <div class="card-body">
                  <h5 class="card-header">{{$post->title}}</h5>
                  <p class="card-text">{{substr($post->body, 0, 50)}}...</p>
                  <small>{{$post->created_at}}</small>  
                  <a href="post/{{$post->id}}" class="btn btn-primary">continue reading</a>
                </div>
              </div>              
        @endforeach
    @else
            <p>No posts found</p>
    @endif

@endsection