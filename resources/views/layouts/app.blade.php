<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @yield('extra-script')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    E-Chary <i class="fa fa-shopping-basket"></i>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home
                              <span class="sr-only">(current)</span>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">Services</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                          </li>

                    </ul>
                     <!-- Search Input -->
                <form action="{{ route('products.search') }}" class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search..." value="{{ request()->search ?? ''}}" aria-label="Search">
                        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                      </form>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a href="#" class="dropdown-item">Mon Profile</a>
                                


                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="{{ route('cart.index')}}">Panier <i class="fa fa-shopping-cart"></i> <span class="badge badge-pill badge-light"> {{ Cart::count() }} </span> </a>
                              </li>
                        @endguest

                        
                    </ul>
                </div>
            </div>
        </nav>
       
        <main class="py-4">
            @yield('content')
        </main>

        
    </div>

     <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="social_icon1">
                        <a class="icons-sm fb-ic mr-3"><i class="fa fa-facebook fa-3x"></i></a>
                        <!--Twitter-->
                        <a class="icons-sm tw-ic mr-3"><i class="fa fa-twitter fa-3x"></i></a>
                        <!--Google +-->
                        <a class="icons-sm gplus-ic mr-3"><i class="fa fa-google-plus fa-3x"> </i></a>
                        <!--Linkedin-->
                        <a class="icons-sm li-ic mr-3"><i class="fa fa-linkedin fa-3x"> </i></a> 
                        <!--Pinterest-->
                        <a class="icons-sm pin-ic mr-3"><i class="fa fa-pinterest fa-3x"> </i></a>
                </div> <!--social_icon1-->
            </div><!--col-md-3-->
             <p class="col-md-6 text-center text-white">Copyright &copy; Yassine ZAHIR 2020</p>
        </div>
    </div>
    <!-- /.container -->
  </footer>

  
  <!-- Bootstrap core JavaScript -->
  
  <script src="js/bootstrap/js/bootstrap.bundle.min.js"></script>

@yield('extra-js')
</body>
</html>
