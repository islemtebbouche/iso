<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'store iso') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/740e44de40.js" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @yield('style')
</head>
<body>
    <div id="app">
    <div class="overlay"></div>

<div class="utility-nav d-none d-md-block">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6">
        <p class="small"><i class="bx bx-envelope"></i> logo@example.com | <i class="bx bx-phone"></i> +213 561228653
        </p>
      </div>

      <div class="col-12 col-md-6 text-right">
        <p class="small">Free shipping on total of $99 of all products</p>
      </div>
    </div>
  </div>
</div>

<nav class="navbar navbar-expand-md navbar-light bg-light main-menu" style="box-shadow:none">
  <div class="container">

    <button type="button" id="sidebarCollapse" class="btn btn-link d-block d-md-none">
                <i class="bx bx-menu icon-single"></i>
            </button>

    <a class="navbar-brand" href="#">
      <h4 class="font-weight-bold">{{ config('app.name', 'store iso') }}</h4>
    </a>

    <ul class="navbar-nav ml-auto d-block d-md-none">
    <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                    <div class="cart_icon"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918704/cart.png" alt="">
                                        <div class="cart_count"><span>{{session()->get('cart') ? session()->get('cart')->totalQty : '0'  }}</span></div>
                                    </div>
                                    <div class="cart_content">
                                        <div class="cart_text"><a href="{{ route ('cart.show')}}">Cart</a>
                                         
                                       </div>
                                        
                                    </div>
                                    @guest
                            <li class="nav-item">
                               <a class="nav-link ml-6 mr-8" href="{{ route('login') }}" style="margin:10px" >  <span class="fas fa-sign-in-alt" style="color:black">  {{ __('Login') }}</span> </a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link ml-6" href="{{ route('register') }}"><span class="fas fa-user-plus" style="color:black">  {{ __('Register') }}</span> </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   <span class="fas fa-user-alt" style="margin:10px;color:black">  {{ Auth::user()->name }}</span> 
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a href="{{ route('order.index') }}" class="dropdown-item">Orders <i class="fas fa-grip-horizontal ml-2"></i></a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                        <i class="fas fa-sign-out-alt ml-2"></i>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        
    </ul>

    <div class="collapse navbar-collapse">
      <form class="form-inline my-2 my-lg-0 mx-auto" action="/products" method="POST" >
      @csrf
        <input class="form-control" type="text" placeholder="Search for products..." aria-label="Search"  name="q" id="q">
        <button class="btn btn-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
      </form>

      <ul class="navbar-nav">
      <div class="cart">
                                <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                    <div class="cart_icon"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918704/cart.png" alt="">
                                        <div class="cart_count"><span>{{session()->get('cart') ? session()->get('cart')->totalQty : '0'  }}</span></div>
                                    </div>
                                    <div class="cart_content">
                                        <div class="cart_text"><a href="{{ route ('cart.show')}}">Cart</a>
                                         
                                       </div>
                                        
                                    </div>
        </li>
        @guest
                            <li class="nav-item">
                               <a class="nav-link" href="{{ route('login') }}" >  <span class="fas fa-sign-in-alt" style="color:black">  {{ __('Login') }}</span> </a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"><span class="fas fa-user-plus" style="color:black">  {{ __('Register') }}</span> </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   <span class="fas fa-user-alt" style="color:black">  {{ Auth::user()->name }}</span> 
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a href="{{ route('order.index') }}" class="dropdown-item">Orders <i class="fas fa-grip-horizontal ml-2"></i></a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                        <i class="fas fa-sign-out-alt ml-2"></i>
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

<nav class="navbar navbar-expand-md navbar-light bg-light sub-menu">
  <div class="container">
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{route('store')}}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('product.index')}}">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Schools</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#">categories</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#"></a>
         
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            more
                        </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Delivery Information</a>
            <a class="dropdown-item" href="#">Privacy Policy</a>
            <a class="dropdown-item" href="#">Terms & Conditions</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="search-bar d-block d-md-none">
  <div class="container">
    <!-- <div class="row">
      <div class="col-12"> -->
     
      <div class="collapse" id="navbarToggleExternalContent">
  <div class="bg-light ">
  <ul class="navbar-nav mx-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{route('store')}}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('product.index')}}">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Schools</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Publishers</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Support
                        </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Delivery Information</a>
            <a class="dropdown-item" href="#">Privacy Policy</a>
            <a class="dropdown-item" href="#">Terms & Conditions</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
      </ul>
  </div>
</div>
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
  <form class="form-inline my-2 my-lg-0 mx-auto" action="/products" method="post" >
      @csrf
        <input class="form-control" type="search" placeholder="Search for products..." aria-label="Search"  name="q" id="q">
        <button class="btn btn-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
      </form>
      
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>        
<ul>
      </div>
    </div>
    
                     
    
  </div>
</div>

<!-- Sidebar -->

</nav>
 

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @include('sweetalert::alert')
    @yield('script')
</body>
</html>
