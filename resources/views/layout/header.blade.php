<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('assets/css/layout/header.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                    <li><a href="{{ route('competition.index') }}">COMPETITION</a></li>
                    <li><a href="{{ route('team.index') }}">TEAM</a></li>
                    <li><a href="{{ route('news.index') }}">NEWS</a></li>
                </ul>
            </center>
        </div>
    </div>

    <div class="content">
        @yield('index-content')
    </div>
</body>
</html>