<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @yield('styles')
    @vite('resources/css/app.css')
    <title>Facemilenio - @yield('title')</title>
</head>
<body id="body-pd">
    @include('sweetalert::alert')
    @section('topbar')

        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div> 
                    <a id="nav-toggle" class="nav_logo">
                        <i class='bx bx-layer nav_logo-icon'></i> 
                        <img src="{{url('/images/facemilenio.png')}}" class="nav_logo-name" style="width: 120px;">
                    </a>
                    <div class="nav_list">
                        <a class="nav_link">
                            <div class="header_img">
                                {{-- TODO: Custom image of profile --}}
                                <img src="{{auth()->user->url_photo ?? ('/images/default_profile_picture.jpg')}}" alt="">
                            </div>
                            <span class="nav_name">Hi, {{auth()->user()->name}}</span> 
                        </a>
                        <a href="{{url('/home')}}" class="{{request()->routeIs('home.*') ? 'nav_link active' : 'nav_link'}}">
                            <i class='bx bx-grid-alt nav_icon'></i> 
                            <span class="nav_name">Dashboard</span> 
                        </a>
                        <a href="{{url('/account' . '/' . Auth::user()->email)}}" class="{{request()->routeIs('account.*') ? 'nav_link active' : 'nav_link'}}">
                            <i class='bx bx-user nav_icon'></i> 
                            <span class="nav_name">Account</span> 
                        </a>
                    </div>
                </div> 
                <a href="{{url('/logout')}}" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Logout</span> </a>
            </nav>
        </div>
      
    @show

    <div class="container">
        @yield('content')
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
   
            const showNavbar = (toggleId, navId, bodyId) =>{
                const toggle = document.getElementById(toggleId),
                nav = document.getElementById(navId),
                bodypd = document.getElementById(bodyId);
                //headerpd = document.getElementById(headerId)
            
                // Validate that all variables exist
                if(toggle && nav && bodypd){
                        toggle.addEventListener('click', ()=>{
                        // show navbar
                        nav.classList.toggle('show')
                        // change icon
                        //toggle.classList.toggle('bx-x')
                        // add padding to body
                        bodypd.classList.toggle('body-pd')
                        // add padding to header
                        //headerpd.classList.toggle('body-pd')
                    })
                }
            }

            showNavbar('nav-toggle','nav-bar','body-pd');
            
        });

    </script>
    @yield('scripts')
</body>
</html>