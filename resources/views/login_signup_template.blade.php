<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{asset('/css/login.css')}}">
    <link rel="stylesheet" href="{{asset('/css/signup.css')}}">

    <title> {{$page_title}} </title>
</head>
<body>
    <div id="divbackground">
        <div id="divwelcome">
            <p id="welcometxt"><strong>Welcome to BinusEats!</strong></p>
        </div>
    
        <div id="divcontentbackground">
            <div id="divcontainer">
                <div id="divlogotxt">
                    <div id="divlogo">
                        <img id="logo" src="{{asset('/images/Logo_Binuseats.png')}}" alt="Logo BinusEats">
                    </div>
                    <div id="divtext">
                        <p id="binuseatstxt"><strong>Eat, Study, Repeat</strong></p>
                    </div>
                </div>
                @yield('content')
            </div>
        </div>
    </div>

    
</body>
</html>