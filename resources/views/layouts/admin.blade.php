<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body>
    <div id="app">
        
        <main class="body-max">
            <div class="container-fluid">
                <div class="row">
                    
                    <nav class="d-flex flex-column flex-shrink-0 text-white bg-dark side-bar">
                        <a href="{{ route('guest.index') }}" class="d-flex py-2 ps-2 link-dark text-decoration-none navbar-brand flex-column justify-content-center align-items-center mx-0" data-bs-toggle="tooltip" data-bs-placement="right">
                          <i class="fa-brands fa-laravel"></i>
                          <span class="sidebar-brand"> Laravel </span>
                        </a>
                        <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
                            
                            <li class="nav-item">
                                <a href="{{ route('admin.home') }}" class="nav-link active py-3" aria-current="page" title="Dashboard" data-bs-toggle="tooltip" data-bs-placement="right">
                                    <i class="bi bi-activity"></i>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="{{ route('admin.categories.index') }}" class="nav-link py-3" title="All Categories" data-bs-toggle="tooltip" data-bs-placement="right">
                                    <i class="bi bi-files"></i>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="{{ route('admin.posts.index') }}" class="nav-link py-3" title="All Posts" data-bs-toggle="tooltip" data-bs-placement="right">
                                    <i class="bi bi-stickies"></i>
                                </a>
                            </li>
                            
                            
                            
                            <li class="nav-item">
                                <a href="{{ route('admin.posts.indexUser') }}" class="nav-link py-3" title="My Posts" data-bs-toggle="tooltip" data-bs-placement="right">
                                    <i class="bi bi-sticky"></i>
                                </a>
                            </li>
                            
                            
                            <li class="nav-item">
                                <a href="{{ route('admin.posts.create') }}" class="nav-link py-3" title="Add Post" data-bs-toggle="tooltip" data-bs-placement="right">
                                    <i class="bi bi-plus-circle"></i>
                                </a>
                            </li>
                            
                        </ul>
                        <div class="dropdown">
                            <a href="#" class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none nav-link" id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-check"></i>
                            </a>
                            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">
                                <li><a class="dropdown-item" href="#">New project...</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Sign out</a></li>
                            </ul>
                        </div>
                    </nav>
                    
                    <div class="col px-0">
                        @include('partials.header')
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>