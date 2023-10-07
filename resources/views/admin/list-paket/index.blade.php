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
            margin-bottom: 15px;
        }

        .form .tmbh-limit .input-limit input {
            width: 100%;
            margin-top: 3px;
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

            .bagan {
                margin-left: 3rem;
                margin-bottom: 2rem;
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

            .modal-body .form-label {
                width: 8rem;
            }
        }
    </style>

    <body>
        <div class="button d-flex justify-content-between">
            @if (Auth::user()->role == 'admin')
                <a class="caption fw-bold text-success fs-4 mb-3 mt-4 text-decoration-none"
                    style="cursor: pointer; display: block;" data-bs-toggle="modal" data-bs-target="#exampleModal">+Add
                    Limit</a>

                <a href="{{ route('limit.pending') }}"
                    class="btn approve btn-outline-success justify-content-end me-5 mt-4 mb-3" id="approve">Approve</a>
            @endif
        </div>

        <!-- Modal Create Limit -->
        @if (Auth::user()->role == 'admin')
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#576b7d;">
                            <div class="text-center fs-3 p-2 text-white">
                                <h2>Limit</h2>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('limit.store') }}" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                @csrf
                                <div class="form">
                                    <div class="tmbh-limit">
                                        <div class="input-limit">
                                            <span class="details fw-bold">Paket</span>
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
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="d-flex justify-content-center gap-2">
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
        
        @if (session('updated'))
        <div class="alert alert-success w-75">
            {{ session('updated') }}
        </div>
        @endif
        @php
            $chunkedLimits = $limit->chunk(4);
        @endphp
        <div class="card justify-content-left">
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
                                    data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}">
                                    Rp. {{ $item->prize }}
                                </button>

                                @if (Auth::user()->role == 'admin')
                                    <div class="d-flex justify-content-around border-0">
                                        <div class="update">
                                            <a class="btn" type="button" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $item->id }}"><i
                                                    class='bx bxs-edit-alt bx-sm' style="color: black"></i></a>
                                        </div>
                                        <div class="delete">
                                            <form action="{{ route('limit.delete', ['id' => $item->id]) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn">
                                                    <i class="bx bxs-trash-alt bx-sm" style="color: black"></i>
                                                </button>
                                            </form>
                                        </div>

                                        <!-- Update Limit -->
                                        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header" style="background-color:#576b7d;">
                                                        <div class="text-center fs-3 p-2 text-white">
                                                            <h2>Edit Limit</h2>
                                                        </div>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('limit.update', ['id' => $item->id]) }}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="form">
                                                                <div class="tmbh-limit">
                                                                    <div class="input-limit">
                                                                        <span class="details fw-bold">Paket</span>
                                                                        <input type="text" size="22" required
                                                                            name="name" autocomplete="off"
                                                                            value="{{ $item->name }}">
                                                                    </div>
                                                                    <div class="input-limit">
                                                                        <span class="details fw-bold">Limit</span>
                                                                        <input type="number" size="22" required
                                                                            name="limit" autocomplete="off"
                                                                            value="{{ $item->limit }}">
                                                                    </div>
                                                                    <div class="input-limit">
                                                                        <span class="details fw-bold">Harga</span>
                                                                        <input type="text" size="22" required
                                                                            name="prize" autocomplete="off"
                                                                            value="{{ $item->prize }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="d-flex justify-content-center gap-2">
                                                                <input type="submit" value="SIMPAN"
                                                                    class="btn btn-outline-success w-auto">
                                                                <input type="reset" value="BATAL"
                                                                    class="btn btn-outline-danger w-auto">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </li>
                        </ul>


                        <!-- Buy Limit -->
                        <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Buy Limit</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('buyLimit') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body d-flex justify-content-between m-5 mb-4 mt-4 border"
                                            style="height: 5rem">
                                            <div>
                                                <input type="text" class="form-label fw-bold border-0 bg-transparent"
                                                    name="name" value="{{ $item->name }}" readonly>
                                                <p class="d-flex">Limit <input type="text"
                                                        class="form-label border-0 bg-transparent" name="limit"
                                                        value="{{ $item->limit }}" readonly></p>
                                            </div>
                                            <div>
                                                <p class="d-flex text-success fw-bold">Rp. <input type="text"
                                                        class="form-label text-success fw-bold border-0 bg-transparent"
                                                        name="prize" value="{{ $item->prize }}" readonly></p>
                                            </div>
                                        </div>
                                        <div class="mb-3 form-check me-3">
                                            <label>
                                                <b>PAYMENT :</b><br>
                                                💸 Pembayaran dilakukan melalui: <br>
                                                > ShopeePay 081211903974 / username noisestudio <br>
                                                > Dana 081211903974 a.n. FNP <br>
                                                > BCA 0710125872 a.n. FNP
                                            </label>
                                        </div>
                                        <div class="mb-3 form-check me-3">
                                            <label for="formFile" class="form-label">Bukti Transfer</label>
                                            <input class="form-control" type="file" id="inputFile" name="image">
                                            <img src="" class="w-25 mt-3" alt="" id="review">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Buy</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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

        @if (session('success'))
            <script>
                var info = "{{ session('success') }}"
                alert(info)
            </script>
        @endif

        <script>
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
