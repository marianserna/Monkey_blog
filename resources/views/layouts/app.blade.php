<!DOCTYPE html>
<html lang="en">
<!-- An app by Marian Serna & Justice Ampofo -->
{{-- Gracious thanks to flaticon.com for the free monkey icon (http://www.flaticon.com/free-icon/chimp-face-of-brazil_47247#term=monkey&page=1&position=9) --}}
{{-- And to Flickr.com for the palm tree image! --}}
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Monkey Magazine') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body class="@yield('page-class')">
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Monkey Magazine
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ route('posts.index') }}">Posts</a></li>
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#" class="day-night">Day Mode</a></li>
                                    @if(Auth::user()->is_admin)
                                      <li>
                                        <a href="{{ route('admin.users.index')}}">Manage Users</a>
                                      </li>
                                    @endif
                                    @if(Auth::user()->is_admin || Auth::user()->is_editor || Auth::user()->is_author)
                                      <li>
                                        <a href="{{ route('admin.posts.index')}}">Manage Posts</a>
                                      </li>
                                    @endif
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
          @if(Session::has('flash_message'))
            <div class="alert alert-success">
              {{Session::get('flash_message')}}
            </div>
          @endif
          @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
