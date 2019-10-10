<!doctype html>
<html lang="en">
<head>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/5f81828b2c.js" crossorigin="anonymous"></script>

        @yield('styles')

</head>
<body>

<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" href="/news">News</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" href="/about">About Us</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" href="/posts">Posts</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" href="/products">Products</a>
                        </li>

                        @if(isset($auth))
                                @if($auth->role == 1)
                                        <li class="nav-item">
                                                <a class="nav-link" href="/admin">Admin panel</a>
                                        </li>
                                @endif
                        @endif

                </ul>
                <form class="form-inline my-2 my-lg-0"  method="GET" action="/search">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>

            <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-user-circle"></i> User account
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                    @if(Auth::check())
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                        @else
                                        <a class="dropdown-item"href="/home">Login</a>
                                        <a class="dropdown-item" href="/register">Register</a>
                                        @endif


                                </div>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link " href="#" tabindex="-1" aria-disabled="true"><i class="fas fa-shopping-cart"></i> Shopping cart</a>
                        </li>
            </ul>
        </div>
</nav>
       <div class="container">
       @yield('content')

       </div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        @yield('scripts')
</body>
</html>



