<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="stylesheet" href="{{ asset('assets/css/layout/header.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
<<<<<<< HEAD
        crossorigin="anonymous" referrerpolicy="no-referrer" />    
=======
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
>>>>>>> 2600016118f15761f8f8fb2e6ae32ec40d2c9511
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
                    <li><a href="/list-paket">LIST PAKET</a></li>
                </ul>
            </center>
        </div>

        <div class="user align-items-center justify-content-center">
            <div class="dropmenu d-flex align-items-center justify-content-end mt-3">
                <ul class="dropdown">
                    <li class="nav-item dropdown list-unstyled rounded ">
                        <i class="fa-solid fa-circle-user fa-xl" style="color: #ffffff;"></i>
                        <ul class="dropdown-menu text-center" id="dropdown-menu" style="margin-left:-130px">
                            <li>{{ Auth::user()->name }}</li>
                            <li><img src="{{ asset('assets/image/team.jpg') }}" alt="" class="rounded-circle w-75 mt-2 mb-2"></li>
                            <li class="ms-3 me-3">{{ Auth::user()->email }}</li>
                            <li class="bg-body-tertiary mb-3 mt-3 p-1">
                                <a href="/password"><i class='bx bx-key bx-sm' ></i></a>
                                <a href="/profile"><i class='bx bxs-edit-alt bx-sm'></i></a>
                            </li>
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
