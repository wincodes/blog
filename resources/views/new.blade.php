@extends('layout')

@section('content')
<div class="container" style="padding: 10px;">
    <form method="POST" action="/post/store">
        @csrf
            <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Post Title">
            </div>
            
            <div class="form-group">
            <label for="post">Post</label>
            <textarea class="form-control" name="post" id="post" rows="3"></textarea>
            </div>

            <button type="submit"  name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection