<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $page_title }}</title>
        <link rel = "icon" href = "{{ asset('images/Logo_Binuseats.png') }}" type = "image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

        <script src="https://kit.fontawesome.com/db7406598f.js" crossorigin="anonymous"></script>
        <script src="editprofile.js"></script>

        <link href="{{asset('css/homepage.css')}}" rel="stylesheet" />
        <link href="{{asset('css/profile.css')}}" rel="stylesheet" />
        <link href="{{asset('css/order.css')}}" rel="stylesheet" />
        <link href="{{asset('css/cartpage.css')}}" rel="stylesheet" />
        <link href="{{asset('css/topup.css')}}" rel="stylesheet" />
        <link href="{{asset('css/menu.css')}}" rel="stylesheet" />
        <link href="{{asset('css/menudetail.css')}}" rel="stylesheet" />
        <link href="{{asset('css/notification.css')}}" rel="stylesheet" />


    </head>
    <body>
        <div class="banner">
            @yield('home')
            <img class="home-button" src="{{asset('/images/Logo_Binuseats.png')}}" alt="home-button"onclick="window.location.href='/homepage/{{$id}}'">

            <form action="/homepage/{{$id}}">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit">| <i class="fas fa-search" style="color: #000000;"></i></button>
            </form>

            <div class="navigation-bar">
                <div class="Bell" id="bar" onclick="window.location.href='/notification/{{$id}}'">
                    <i class="fa-solid fa-bell" style="color: #{{ $active_number == 1 ? 'FD6727': 'ffffff'}} "></i>
                    <p style="color: #{{ $active_number == 1 ? 'FD6727': 'ffffff'}} ">Notification</p>
                </div>

                <div class="cart" id="bar" onclick="window.location.href='/{{$id}}/cart'">
                    <i class="fas fa-shopping-cart" style="color: #{{ $active_number == 2 ? 'FD6727': 'ffffff'}} "></i>
                    <p style="color: #{{ $active_number == 2 ? 'FD6727': 'ffffff'}} ">Cart</p>
                </div>

                <div class="order" id="bar" onclick="window.location.href='/order/{{$id}}'">
                    <i class='fas fa-file-alt' style="color: #{{ $active_number == 3 ? 'FD6727': 'ffffff'}} "></i>
                    <p style="color: #{{ $active_number == 3 ? 'FD6727': 'ffffff'}} ">Order</p>
                </div>


                <div class="profile" id="bar" onclick="window.location.href='/profile/{{$id}}'">
                    <i class="fa-solid fa-user" style="color: #{{ $active_number == 4 ? 'FD6727': 'ffffff'}} "></i>
                    <p style="color: #{{ $active_number == 4 ? 'FD6727': 'ffffff'}} ">Profile</p>
                </div>
            </div>
        </div>

        <div class="content">
            @yield('content')
        </div>

    </body>
</html>
