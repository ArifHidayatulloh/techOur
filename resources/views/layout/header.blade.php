<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{ asset('assets/css/layout/header.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- NAVBAR -->
    <div class="navbar">
        <div class="judul">
            <h3>
                Admin<span><i>TechOur</i></span>
            </h3>
        </div>
        <input type="checkbox" id="check">
        <label for="check">
            <i class="fa-solid fa-angle-down fa-2x" style="color: #ffffff;" id="arrow-down"></i>
            <i class="fa-solid fa-angle-up fa-2x" style="color: #ffffff;" id="arrow-up"></i>
        </label>
        <div class="listmenu">
            <center>
                <ul>
                    <li><a href="/">HOME</a></li>
                    <li><a href="{{ route('tournament.index') }}">TOURNAMENT</a></li>
                    @if (Auth::user()->role == 'admin')
                        <li><a href="{{ route('competition.index') }}">COMPETITION</a></li>
                    @else
                    @endif
                    <li><a href="{{ route('news.index') }}">NEWS</a></li>
                    @if (Auth::user()->role == 'admin')
                        <li><a href="{{ route('users.index') }}">USER</a></li>
                    @else
                    @endif
                </ul>
            </center>
        </div>

        <div class="user d-flex align-items-center justify-content-center ">
            <div class="dropmenu w-100 d-flex align-items-center justify-content-end mt-3" style="width: 10px">
                <ul class="dropdown" style="width:">
                    <li class="nav-item dropdown p-1 list-unstyled rounded ">
                        <i class="fa-solid fa-user" style="color: #ffffff;"></i>
                        <ul class="dropdown-menu text-center" id="dropdown-menu" style="margin-left:-110px">
                            <li><a href="/profile">Profile</a></li>
                            <li><a href="{{ route('actionlogout') }}">Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="content">
        @yield('index-content')
    </div>
</body>

</html>
