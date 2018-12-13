<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{route('shop.index')}}">Products</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{route('cart.index')}}">Cart
                            @if(Cart::count() > 0)
                            <span style="color: blue;padding:5px ;background-color: #ED5485;border-radius:100%;margin-left: 5px;">{{Cart::count()}}</span>
                            @endif
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{route('watchlater.index')}}">WatchLater
                            @if(Cart::instance('watchLater')->count() > 0)
                            <span style="color: blue;padding:5px ;background-color: #ED5485;border-radius:100%;margin-left: 5px;">
                                {{Cart::instance('watchLater')->count()}}</span>
                            @endif
                            </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Contact us</a>
                        
                    </ul>                      
                   <form class="form-inline my-2 my-lg-0" action="{{route('search')}}" method="GET" class="search-form">
 
                        @csrf
                     
                      <input type="search" name="query" id="query" value="{{ request()->input('query') }}" class=" form-control mr-sm-2 search-box" placeholder="i am shopping for..." aria-label="Search" required style="width: 300px">
                      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" >Search</button>
                    </form>
                    

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
