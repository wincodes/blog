<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Godwin Blog</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css">
        
    </head>
    <body>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="/">GODWIN</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                  
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                          <a class="nav-link" href="/">Blog <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="/post/new">Add Post</a>
                        </li>

                        <li class="nav-item">
                                <a class="nav-link" href="/about">About</a>
                        </li>

                        <li class="nav-item">
                        @if (Route::has('login'))
                            @auth
                                <a  class="nav-link" href="{{ url('/home') }}">Home</a>
                            @else
                                <a  class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>

                            <li class="nav-item">   
                                @if (Route::has('register'))
                                    <a  class="nav-link" href="{{ route('register') }}">Register</a>
                                @endif
                            </li>
                            @endauth
                        @endif
                       
                        <li class="nav-item">     
                        @if (Auth::id())
                        <a  class="nav-link" href="/secure/logout">Logout</a>
                        @endif
                        </li>
                    </ul>

                      <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                      </form>
                    </div>
                </nav>

            <div class="container">
                <div class="row">
                    <div class="col-2">
                        
                        @yield('left-sidebar')
                        
                    </div> 
                    <div class="content col-8">
                            @if (count($errors)> 0)
                            @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">
                                    {{$error}} 
                                  </div>
                            @endforeach
                            
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                              {{session('success')}} 
                            </div>
                        @endif
            
                        @if (session('error'))
                            <div class="alert alert-danger">
                              {{session('error')}} 
                            </div>
                        @endif
                        
                        @yield('content') 
                    </div>
                    <div class="col-2">
                        
                        @yield('right-sidebar')
                        
                    </div>
                </div>
            </div>
        
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
</body>
</html>
