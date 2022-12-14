<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<link rel="stylesheet" href="<?php echo asset('/app.css')?>" type="text/css"> 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('', 'Artly') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>
<style>
</style>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/feed') }}">
                    {{ config('','Artly') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <div class="cart-but">
                            <a class="button" href="#popup1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                            </svg></a>
                        </div>
                        <div class="box-but">
                            <a class="button" href="cart">Cart({{ \Gloudemans\Shoppingcart\Facades\Cart::content()->count() }})</a>
                        </div>
                            <div id="popup1" class="overlay">
                                <div class="popup">
                                    <div class="pop-virsraksts">
                                        <h2>ADD A POST</h2>
                                    </div>
                                    <a class="close" href="#">&times;</a>
                                    <div class="content">
                                        <form method="post" action="{{url('newpost')}}" enctype="multipart/form-data">
                                            <div>
                                              @csrf
                                              <div class="photo-add"><input type="file" name="image"></div>
                                            <div class="ievades-lauki">
                                                <label for="exampleFormControlTextarea1">Art Name</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" name="product_name" rows="1"></textarea>
                                              </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">Art Price</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="product_price" rows="1"></textarea>
                                                </div>
                                                <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Art Description</label>
                                                <textarea class="form-control description" id="exampleFormControlTextarea1" name="product_description" rows="3"></textarea>
                                                </div>
                                                <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Art Category</label>
                                                <select  class="form-control category" name="product_category" id="exampleFormControlTextarea1">
                                                        <option value="1">Other</option>
                                                        <option value="2">Cars</option>
                                                        <option value="3">Birds</option>
                                                        <option value="4">Planes</option>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="submit">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                          </form>
                                    </div>
                                </div>
                            </div>   
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">  
                                    <a class="dropdown-item" href="/home">Profile</a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @if (session()->has('status') )
            <div class="alert alert-success">{{ session()->get('status') }}</div>
        @endif
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
