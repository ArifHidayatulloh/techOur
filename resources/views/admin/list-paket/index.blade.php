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
            height: 100%;
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
                            <form action="{{ route('limit.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="tmbh-limit">
                                    <div class="input-limit">
                                        <span class="details fw-bold">Name</span>
                                        <input type="text" size="22" required name="name" autocomplete="off">
                                    </div>
                                    <div class="input-limit">
                                        <span class="details fw-bold">Limit</span>
                                        <input type="number" size="22" required name="limit" autocomplete="off">
                                    </div>
                                    <div class="input-limit">
                                        <span class="details fw-bold">Harga</span>
                                        <input type="text" size="22" required name="prize" autocomplete="off">
                                    </div>
                                    <div class="d-flex justify-content-center gap-2 mt-4 mb-4">
                                        <input type="submit" value="SIMPAN" class="btn btn-outline-success w-auto">
                                        <input type="reset" value="BATAL" class="btn btn-outline-danger w-auto">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @else
            @endif


            @php
                $chunkedLimits = $limit->chunk(4);
            @endphp
            <div class="card justify-content-left" id="kotak">
                @foreach ($chunkedLimits as $chunk)
                    <div class="card-body">
                        @foreach ($chunk as $item)
                            <ul class="list-group list-group-light">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <div class="ms-3">
                                            <p class="fw-bold mb-1">{{ $item->name }}</p>
                                            <p class="text-muted mb-0">Limit {{ $item->limit }}</p>
                                        </div>
                                    </div>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-success badge rounded-pill d-inline"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Rp. {{ $item->prize }}
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Buy Limit</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="">
                                                    <div class="modal-body d-flex justify-content-between m-5 mb-4 mt-4 border"
                                                        style="height: 5rem">
                                                        <div class="d-flex flex-column">
                                                            <label for="exampleInputEmail1"
                                                                class="form-label fw-bold">{{ $item->name }}</label>
                                                            <label for="exampleInputPassword1" class="form-label">Limit
                                                                {{ $item->limit }}</label>
                                                        </div>
                                                        <div>
                                                            <label for="exampleInputPassword1"
                                                                class="form-label text-success fw-bold align-middle">Rp.
                                                                {{ $item->prize }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 form-check me-3">
                                                        <label for="formFile" class="form-label">Bukti Tf</label>
                                                        <input class="form-control" type="file" id="inputFile">
                                                        <img src="" class="w-25 mt-3" alt="" id="review">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        @endforeach
                    </div>
                @endforeach
            </div>
            @if (session('successAdd'))
                <script>
                    var info = "{{ session('successAdd') }}"
                    alert(info)
                </script>
            @endif

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

            function previewImage(event) {
                let fileInput = event.target;
                let reviewImage = document.getElementById('review')

                if (fileInput.files && fileInput.files[0]) {
                    let reader = new FileReader();

                    reader.onload = function(e) {
                        reviewImage.src = e.target.result;
                    }

                    reader.readAsDataURL(fileInput.files[0]);
                }
            }

            document.getElementById('inputFile').addEventListener('change', previewImage);
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
@stop
