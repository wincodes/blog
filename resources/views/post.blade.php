@extends('layout')

@section('content')
    <div class="container-fluid"  style="padding: 10px;">
        <h2 class="heading">{{$posts->title}}</h2>
        <div class="card" style="padding: 10px;">
            <img src="/storage/images/{{$posts->picture}}" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="text-justify">{!!$posts->body!!}</p> 
            </div>
        </div>
        <small>Published: {{substr($posts->created_at, 0, 10)}}</small>
        <hr>
        <div class="row">
            <div class="col-6">
                <a href="/blog/{{$posts->id}}/edit" class="btn btn-primary" role="button">Edit</a>
            </div>
            <div class="col-6">
                <form method="POST" action="/blog/{{$posts->id}}">
                    <input name="_method" type="hidden" value="DELETE">
                    @csrf
                    <button type="submit"  name="submit" class="btn  btn-outline-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>

@endsection