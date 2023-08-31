<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ ('assets/css/admin/index.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <title>INDEX</title>
</head>
<body>
    <div class="menu">
        <div class="bagan">
            <div class="admin">
                <img src="{{ ('assets/image/TECH_TOURNAMENT.png') }}" alt="">
                <h2>ADMIN</h2>
            </div>
            <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  sub
                </a>
              
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Profile</a></li>
                  <li><a class="dropdown-item" href="#">Log Out</a></li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="pilih">
                <div class="pilihan">
                    <div class="box">
                        <center><a href="/news-admin" class="link">NEWS</a></center>
                        <a href="/news-admin"><img src="{{ ('assets/image/news.png') }}" alt=""></a>
                    </div>
                    <div class="box">
                        <center><a href="/tour-admin" class="link">TOURNAMENT</a></center>
                        <a href="/tour-admin"><img src="{{ ('assets/image/code.png') }}" alt=""></a>
                    </div>
                    <div class="box">
                        <center><a href="/admin-competition" class="link">CATEGORY COMPETITION</a></center>
                        <a href="/admin-competition"><img src="{{ ('assets/image/category-comp.png') }}" alt=""></a>
                    </div>
                    <div class="box">
                        <center><a href="/team-admin" class="link">TEAM</a></center>
                        <a href="/team-admin"><img src="{{ ('assets/image/team.png') }}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
