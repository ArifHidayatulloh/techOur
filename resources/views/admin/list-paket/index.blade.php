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
        body {
            margin: 0;
            padding: 0;
        }

        .list-group{
            width: 25rem;
        }

        @media screen and (max-width: 796px){
            .body{
                flex-direction: column;
            }

            .list-group{
                width: 300px;
            }
        }
    </style>

    <body>
        <div class="body m-5 d-flex justify-content-center">
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
    </body>

    </html>
@stop
