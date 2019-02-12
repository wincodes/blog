@extends('layout')

@section('content')
<div class="container" style="padding: 10px;">
    <form method="POST" action="/blog" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Post Title">
            </div>
            
            <div class="form-group">
            <label for="post">Post</label>
            <textarea class="form-control" name="post" id="article-ckeditor" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="picture">Picture</label>
                <input type="file" name="picture" id="picture" class="form-control">
            </div>

            <button type="submit"  name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection