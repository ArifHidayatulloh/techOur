@extends('layout.header')
@section('index-content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <title>list paket</title>
    </head>

    <style>
        .bagan {
            display: none;
            border: 1px solid black;
            border-radius: 10px;
            height: 80%;
            margin-left: 5rem;
            margin-right: 3rem;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        .bagan .form {
            margin: 20px;
        }

        .form .tmbh-limit .input-limit {
            margin-bottom: 10px;
        }

        .form .tmbh-limit .input-limit input {
            width: 100%;
            letter-spacing: 1px;
            color: black;
            border: 1px solid black;
            background-color: transparent;
            border-radius: 3px;
            padding: 3px;
        }

        .content .table {
            width: 75%;
        }

        .card {
            display: grid;
            grid-template-columns: auto auto auto;
            border: 0;
        }

        .card,
        .caption {
            margin-left: 3rem;
        }

        .list-group {
            width: 25rem;
        }

        @media screen and (max-width: 796px) {
            .body {
                flex-direction: column;
            }

            .caption {
                margin-left: 3rem;
            }

            .bagan {
                margin-left: 2rem;
            }

            .card {
                display: flex;
                flex-direction: column;
                margin-left: 2rem;
                border: 0;
            }

            .list-group {
                width: 300px;
            }
        }
    </style>

    <body>
        @if (Auth::user()->role == 'admin')
            <a href="#" class="caption d-flex fw-bold text-decoration-none text-success fs-4 mb-3 mt-4"
                onclick="button()">+Add Limit</a>
        @endif

        <div class="body d-flex">
            @if (Auth::user()->role == 'admin')
                <div class="d-flex justify-content-left content">
                    <div class="bagan" id="form">
                        <div class="card-header text-center fs-3 p-2 rounded-top text-white border-bottom border-dark"
                            style="background-color:#576b7d;">
                            <h2>Limit</h2>
                        </div>

                        <!-- FORM -->
                        <div class="form">
                            <form action="#" method="post" enctype="multipart/form-data">
                                <div class="tmbh-limit">
                                    <div class="input-limit">
                                        <span class="details fw-bold">Name</span>
                                        <input type="text" size="22" required name="limit" autocomplete="off">
                                    </div>
                                    <div class="input-limit">
                                        <span class="details fw-bold">Limit</span>
                                        <input type="text" size="22" required name="limit" autocomplete="off">
                                    </div>
                                    <div class="input-limit">
                                        <span class="details fw-bold">Harga</span>
                                        <input type="text" size="22" required name="limit" autocomplete="off">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center gap-2 mt-4 mb-4">
                                    <input type="submit" value="SIMPAN" class="btn btn-outline-success w-auto">
                                    <input type="reset" value="BATAL" class="btn btn-outline-danger w-auto">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @else
            @endif

            <div class="card justify-content-left" id="kotak">
                <div class="card-body">
                    <ul class="list-group list-group-light">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <div class="ms-3">
                                    <p class="fw-bold mb-1">Paket 1</p>
                                    <p class="text-muted mb-0">Limit 10</p>
                                </div>
                            </div>
                            <span class="badge rounded-pill bg-success ms-5">Rp. 2.000</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <div class="ms-3">
                                    <p class="fw-bold mb-1">Paket 1</p>
                                    <p class="text-muted mb-0">Limit 10</p>
                                </div>
                            </div>
                            <span class="badge rounded-pill bg-success ms-5">Rp. 2.000</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <div class="ms-3">
                                    <p class="fw-bold mb-1">Paket 1</p>
                                    <p class="text-muted mb-0">Limit 10</p>
                                </div>
                            </div>
                            <span class="badge rounded-pill bg-success ms-5">Rp. 2.000</span>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-light">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <div class="ms-3">
                                    <p class="fw-bold mb-1">Paket 1</p>
                                    <p class="text-muted mb-0">Limit 10</p>
                                </div>
                            </div>
                            <span class="badge rounded-pill bg-success ms-5">Rp. 2.000</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <div class="ms-3">
                                    <p class="fw-bold mb-1">Paket 1</p>
                                    <p class="text-muted mb-0">Limit 10</p>
                                </div>
                            </div>
                            <span class="badge rounded-pill bg-success ms-5">Rp. 2.000</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <div class="ms-3">
                                    <p class="fw-bold mb-1">Paket 1</p>
                                    <p class="text-muted mb-0">Limit 10</p>
                                </div>
                            </div>
                            <span class="badge rounded-pill bg-success ms-5">Rp. 2.000</span>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-light">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <div class="ms-3">
                                    <p class="fw-bold mb-1">Paket 1</p>
                                    <p class="text-muted mb-0">Limit 10</p>
                                </div>
                            </div>
                            <span class="badge rounded-pill bg-success ms-5">Rp. 2.000</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <div class="ms-3">
                                    <p class="fw-bold mb-1">Paket 1</p>
                                    <p class="text-muted mb-0">Limit 10</p>
                                </div>
                            </div>
                            <span class="badge rounded-pill bg-success ms-5">Rp. 2.000</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <div class="ms-3">
                                    <p class="fw-bold mb-1">Paket 1</p>
                                    <p class="text-muted mb-0">Limit 10</p>
                                </div>
                            </div>
                            <span class="badge rounded-pill bg-success ms-5">Rp. 2.000</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- FORM -->
            <div class="form d-none" id="formTf">
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="tmbh-limit">
                        <div class="input-limit">
                            <span class="details fw-bold">Paket</span>
                            <input type="text" size="22" required name="limit" autocomplete="off">
                        </div>
                        <div class="input-limit">
                            <span class="details fw-bold">Limit</span>
                            <input type="text" size="22" required name="limit" autocomplete="off">
                        </div>
                        <div class="input-limit">
                            <span class="details fw-bold">Harga</span>
                            <input type="text" size="22" required name="limit" autocomplete="off">
                        </div>
                        <div class="input-tur">
                            <span class="details">Bukti Tf</span>
                            <input type="file" style="box-shadow:none; border: none" required name="image"
                                id="inputFile">
                        </div>
                    </div>
                    <div class="d-flex justify-content-center gap-2 mt-4 mb-4">
                        <input type="submit" value="SIMPAN" class="btn btn-outline-success w-auto">
                        <input type="reset" value="BATAL" class="btn btn-outline-danger w-auto">
                    </div>
                </form>
            </div>

        </div>

        <script>
            function button() {
                const kotak = document.getElementById('kotak');
                kotak.style.marginLeft = '10px'; // Menggerakkan kotak ke samping
                kotak.style.marginTop = '-1rem';
                kotak.style.gridTemplateColumns = 'repeat(2,1fr)';
                form.style.display = 'block';
            }
        </script>
    </body>

    </html>
@stop
