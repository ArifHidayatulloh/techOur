<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ 'assets/css/admin/index.css' }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

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
                        <li class="nav-item dropdown mt-2 list-unstyled rounded">
                            <a class="nav-link dropdown-toggle text-dark pe-3 ps-3 text-center" href="#"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->email }}
                            </a>
                            <i class='bx bxs-user-circle'></i>
                            <ul class="dropdown-menu text-center" id="dropdown-menu">
                                <li>{{ Auth::user()->name }}</li>
                                <li>
                                    @if (Auth::user()->image == null)
                                        <img src="{{ asset('assets/image/team.jpg') }}" alt=""
                                            class="rounded-circle" style="width: 110px; height: auto;">
                                    @else
                                        <img src="{{ asset('storage/' . Auth::user()->image) }}" alt=""
                                            class="rounded-circle" style="width: 110px; height: auto;">
                                    @endif
                                </li>
                                @if (Auth::user()->role != 'admin')
                                    <li class="me-3 mt-2 fw-bold rounded-2" style="color:#6a7f92;">limit
                                        @php
                                            $limit = \App\Models\History::where(['user_id' => Auth::user()->id, 'status' => 'success'])->sum('limit');
                                            $totalDataCount = \App\Models\Tournament::all()->where('user_id', Auth::user()->id)->count();
                                            echo "$totalDataCount/$limit";
                                        @endphp
                                    </li>
                                @endif
                                <li>{{ Auth::user()->email }}</li>
                                <li class="mb-3 mt-3 p-1">
                                    <a href="/password"><box-icon name='key'></box-icon></a>
                                    <a href="/profile"><box-icon type='solid' name='edit-alt'></box-icon></a>
                                </li>
                                <li><a href="{{ route('actionlogout') }}">Log Out</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="btn-list d-flex justify-content-end">
            <a href="{{ route('limit.index') }}" class="caption text-center me-5 p-2 mt-4 text-decoration-none"
                style="cursor: pointer;" id="create">list paket</a>
        </div>

        <div class="container">
            <div class="pilih">
                <div class="pilihan">
                    @if (Auth::user()->role == 'admin')
                        <div class="box">
                            <center><a href="{{ route('competition.index') }}" class="link">CATEGORY COMPETITION</a>
                            </center>
                            <a href="{{ route('competition.index') }}"><img
                                    src="{{ 'assets/image/category-comp.png' }}" alt=""></a>
                        </div>
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
                        <div class="box">
                            <center><a href="{{ route('users.index') }}" class="link">User Control</a></center>
                            <a href="{{ route('users.index') }}"><img src="{{ 'assets/image/team.png' }}"
                                    alt=""></a>
                        </div>
                    @elseif(Auth::user()->role == 'sub admin')
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
                        <div class="box">
                            <center><a href="{{ route('limit.index') }}" class="link">LIMIT PACKAGE</a></center>
                            <a href="{{ route('limit.index') }}"><img src="{{ 'assets/image/news.png' }}"
                                    alt=""></a>
                        </div>
                    @elseif(Auth::user() == null)
                        <script>
                            var info = 'Session telah habis, kembali login'
                            alert(info)
                            document.location.href = "{{ route('login') }}"
                        </script>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>

</html>
