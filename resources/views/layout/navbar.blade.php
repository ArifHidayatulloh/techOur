<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ 'font/Revamped.otf' }}">
</head>
<style>
    @font-face {
        font-family: rv;
        src: url('assets/font/Revamped.otf');
    }

    @import url('https://fonts.googleapis.com/css2?family=Andika&display=swap');

    .dropdown-menu {
        display: none;
        margin-left: -25px;
    }

    .dropdown-menu li {
        line-height: 40px;
    }

    .nav-item:hover .dropdown-menu {
        display: block;
        cursor: pointer;
        font-family: 'Andika', sans-serif;
        background-color: #020F1F;
        padding: 7px;
    }
</style>

<body>
    
    <samp>
        <nav class="navbar navbar-expand-lg border-bottom border-body" data-bs-theme="dark"
            style="background-color: #020F1F;">
            <div class="container-fluid">
                <div class="card bg-transparent border-0" style="width: 70px; height:70px; left:10px;">
                    <img src="{{ asset('assets/image/TECH_TOURNAMENT.png') }}" class="card-img-top">
                </div>
                <a class="navbar-brand text-white p-3 fs-3 fw-bold" href="/"
                    style="font-family:'rv'; margin-left:10px;"><i>TECHOUR</i></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav nav-underline p-3 ms-auto"
                        style="font-size: 15px; letter-spacing: 2px; font-family: 'Andika', sans-serif;">
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="/">HOME</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="/index-tournament" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                TOURNAMENT
                            </a>
                            <ul class="dropdown-menu" id="dropdown-menu">
                                <li>
                                    <h6 class="dropdown-header">competition</h6>
                                </li>
                                <li>
                                    {{-- <a class="dropdown-item" href="#"></a> --}}
                                    <?php
                                    $apiUrl = 'http://localhost:8001/api/competition';
                                    $apiData = file_get_contents($apiUrl);

                                    $apiData = json_decode($apiData, true);

                                    if(isset($apiData['data']) && is_array($apiData['data'])){
                                        foreach ($apiData['data'] as $item) {

                                            if (isset($item['id']) && isset($item['competition'])) {
                                                $id = $item["id"];
                                                $competition = $item['competition'];

                                                $linkTag = "<a class='dropdown-item' href='/competition/$id'}>$competition</a>";

                                                echo $linkTag;
                                            }

                                        }
                                    }
                                    else{
                                        echo "Tidak Dapat mengambil data";
                                    }
                                    ?>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="{{ route('news.list') }}">NEWS</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </samp>
    <div class="content">
        @yield('content')
    </div>

    {{-- <script>
        fetch('http://localhost:8001/api/competition')
            .then(response => response.json())
            .then(apiData => {

                const dataArray = apiData.data;
                const linkElements = document.querySelectorAll('#dropdown-menu a')

                dataArray.forEach(data => {
                    const linkValue = data.id
                    const linkUrl = data.competition

                    console.log('ini id: ' + linkValue)
                    linkElements.innerText = linkValue;

                });



            })
            .catch(error => {
                console.error('Error Fetching Data', error)
            })
    </script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>
