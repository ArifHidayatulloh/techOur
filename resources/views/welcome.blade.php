<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ 'assets/css/admin/index.css' }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>INDEX</title>
</head>

<body>
    <div class="content">
        <div class="nav">
            <div class="nav-content">
                <div class="d-flex">
                    <img src="{{ 'assets/image/TECH_TOURNAMENT.png' }}" alt="">
                    <h2>ADMIN</h2>
                </div>
                <div class="dropmenu w-100 d-flex align-items-center justify-content-end">
                    <ul class="dropdown">
                        <li class="nav-item dropdown p-1 list-unstyled rounded">
                            <a class="nav-link dropdown-toggle text-dark pe-3 ps-3 text-center" href="#"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->email }}
                            </a>
                            <i class="fa-solid fa-circle-user fa-xl mt-2" style="color: #ffffff;"></i>
                            <ul class="dropdown-menu text-center" id="dropdown-menu">
                                <li><a href="{{ route('profile') }}">Profile</a></li>
                                <li><a href="{{ route('actionlogout') }}">Log Out</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="pilih">
                <div class="pilihan">
                    @if (Auth::user()->role == 'admin')
                        <div class="box">
                            <center><a href="{{ route('competition.index') }}" class="link">CATEGORY COMPETITION</a>
                            </center>
                            <a href="{{ route('competition.index') }}"><img src="{{ 'assets/image/category-comp.png' }}"
                                    alt=""></a>
                        </div>
                    @else
                    @endif
                    <div class="box">
                        <center><a href="{{ route('tournament.index') }}" class="link">TOURNAMENT</a></center>
                        <a href="{{ route('tournament.index') }}"><img src="{{ 'assets/image/code.png' }}"
                                alt=""></a>
                    </div>
                    <div class="box">
                        <center><a href="{{ route('news.index') }}" class="link">NEWS</a></center>
                        <a href="{{ route('news.index') }}"><img src="{{ 'assets/image/news.png' }}"
                                alt=""></a>
                    </div>
                    @if (Auth::user()->role == 'admin')
                        <div class="box">
                            <center><a href="{{ route('users.index') }}" class="link">User Control</a></center>
                            <a href="{{ route('users.index') }}"><img src="{{ 'assets/image/team.png' }}"
                                    alt=""></a>
                        </div>
                    @else
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>

</html>
