@extends('layout')

@section('content')
    <h2 class="heading"> Blog Posts</h2>
    @if(count($posts) > 0)
        @foreach ($posts as $post)
        <div class="card" style="padding: 10px;">
                {{--<img src="..." class="card-img-top" alt="...">--}}
                <div class="card-body">
                  <h5 class="card-header"><strong>{{$post->title}}</strong></h5>
                  <p class="card-text">{{substr($post->body, 0, 50)}}...</p>
                  <small>{{substr($post->created_at, 0, 10)}}</small> 
                  <br> 
                  <a href="post/{{$post->id}}/{{$post->title}}" class="btn btn-primary">continue reading</a>
                </div>
        </div>
        <br>              
        @endforeach
        {{$posts->links()}}
    @else
            <p>No posts found</p>
    @endif

@endsection