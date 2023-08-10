<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/layout/sidebar.css') }}">
</head>

<body>
    <input type="checkbox" id="check">
    <label for="check">
        <span class="fa-solid fa-bars fa-2x" style="color: #ffffff;" id="bars"></span>
    </label>
    <!-- LIST MENU -->
    <div class="container">
        <div class="sidebar">
            <label for="check">
                <span class="fa-solid fa-xmark fa-2x" style="color: #ffffff;" id="cancel"></span>
            </label>
            <h3>Admin <span>TechOur</span></h3>
            <ul>
                <li><a href="/">HOME</a></li>
                <li><a href="{{ route('tournament.index') }}">TOURNAMENT</a></li>
                <li><a href="{{ route('competition.index') }}">COMPETITION</a></li>
                <li><a href="{{ route('team.index') }}">TEAM</a></li>
                <li><a href="{{ route('news.index') }}">NEWS</a></li>
            </ul>
            <div class="logout">
                <i><a href="/login">LOGOUT</a></i>
            </div>
        </div>
    </div>

    <div class="content">
        @yield('content')
    </div>

</body>
</html>