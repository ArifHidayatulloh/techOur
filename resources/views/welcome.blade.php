<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ ('assets/css/admin/index.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDEX</title>
</head>
<body>
    <div class="menu">
        <div class="bagan">
            <div class="admin">
                <img src="{{ ('assets/image/TECH_TOURNAMENT.png') }}" alt="">
                <h2>ADMIN</h2>
            </div>
            <div class="log">
                <h3><a href="login">logout</a></h3>
                <a href="login"><img src="{{ ('assets/image/log.png') }}" alt=""></a>
            </div>
        </div>
        <div class="container">
            <div class="pilih">
                <div class="pilihan">
                    <div class="box">
                        <center><a href="{{ route('competition.index') }}" class="link">CATEGORY COMPETITION</a></center>
                        <a href="{{ route('competition.index') }}"><img src="{{ ('assets/image/category-comp.png') }}" alt=""></a>
                    </div>
                    <div class="box">
                        <center><a href="{{ route('tournament.index') }}" class="link">TOURNAMENT</a></center>
                        <a href="{{ route('tournament.index') }}"><img src="{{ ('assets/image/code.png') }}" alt=""></a>
                    </div>
                    <div class="box">
                        <center><a href="{{ route('news.index') }}" class="link">NEWS</a></center>
                        <a href="{{ route('news.index') }}"><img src="{{ ('assets/image/news.png') }}" alt=""></a>
                    </div>
                    {{-- <div class="box">
                        <center><a href="{{ route('team.index') }}" class="link">TEAM</a></center>
                        <a href="{{ route('team.index') }}"><img src="{{ ('assets/image/team.png') }}" alt=""></a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</body>
</html>
