@extends('layout')

@section('content')
    <div class="container-fluid"  style="padding: 10px;">
        <h2 class="heading">{{$posts->title}}</h2>
        <div class="card" style="padding: 10px;">
            {{--<img src="..." class="card-img-top" alt="...">--}}
            <div class="card-body">
                <p class="text-justify">{{$posts->body}}</p> 
            </div>
        </div>
        <small>Published: {{substr($posts->created_at, 0, 10)}}</small>
    </div>

@endsection