@extends('layout.header')
@section('index-content')

    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <title>Profile</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>

    <style>
        .card {
            width: 20rem;
            height: 100%;
        }

        .trash {
            background-color: rgba(255, 255, 255, 0.678);
            height: auto;
            display: block;
            margin-left: 20%;
            margin-top: 20px;
            margin-bottom: -10%;
        }

        .trash i {
            color: black;
            display: block;
        }

        .trash:hover {
            opacity: 75%;
            background-color: white;
        }

        .alert{
            margin-left: 5rem;
            margin-right: 5rem;
        }

        .img {
            width: 12rem;
        }

        @media screen and (max-width: 796px) {
            .body {
                flex-direction: column;
            }

            .img {
                width: 8rem;
            }

            .alert{
                width: 250px;
                margin-left: -1.5rem;
                margin-right: 0
            }
            
            .history {
                position: absolute;
                margin-left: 0;
            }

            .card-history{
                display: none;
            }
        }
    </style>

    <body>
        <div class="body d-flex">
            <div class="card m-5 p-3">
                <div class="card-img text-center">
                    @if (Auth::user()->image == null)
                        <img src="{{ url('assets/image/it/user.png') }}" alt="" class="w-50 mb-2 rounded-circle">
                    @else
                        <img src="{{ asset('storage/' . Auth::user()->image) }}" style="height: auto;" alt=""
                            class="w-50 mb-2 rounded-circle">
                    @endif
                </div>
                <div class="text-center">
                    <h5 class="card-title fs-4">{{ Auth::user()->name }}</h5>
                    <p class="card-text fs-6">{{ Auth::user()->email }}</p>
                </div>
                <div class="text-center rounded-2 mt-1">
                    @if (Auth::user()->role != 'admin')
                        <a href="" class="text-decoration-none fw-bold mt-1"
                            style="color:#6a7f92; letter-spacing: 1px;">limit :
                            {{ $data }}/{{ $limit }}
                    @endif
                    </a>
                </div>
                <div class="card-btn bg-body-tertiary mb-3 mt-3 p-1 text-center">
                    <a href="/password" class="text-decoration-none text-dark">change password</i></a>
                </div>
            </div>
            
            <div class="content profile rounded-3 border border-dark-subtle w-75 m-5 p-5 shadow-sm">
                <h4>Profile information</h4>
                <p>Update your account's profile information and email address</p>
                @if (Auth::user()->image != null)
                    <form action="{{ route('photo.edit', ['id' => Auth::user()->id]) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <button role="button" type="submit"
                            class="trash rounded-circle p-2 d-flex start-50 translate-middle"
                            id="trash"><i class='bx bxs-trash-alt bx-sm' name="delete-image"></i></button>
                    </form>
                @endif
                <form action="{{ route('profile.edit', ['id' => Auth::user()->id]) }}" method="post"
                    enctype="multipart/form-data" class="form-profile">
                    @csrf
                    <div class="image d-flex justify-content-center mb-4 edit">
                        @if (Auth::user()->image == null)
                        <img src="{{ url('assets/image/it/user.png') }}" alt="" style="height: auto"
                                class="img rounded-circle" id="review">
                        @else
                            <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="" style="height: auto"
                                class="img rounded-circle" id="review">
                        @endif
                    </div>

                    @if (session('successProfile'))
                        <div class="alert alert-success justify-content-center">
                            {{ session('successProfile') }}
                        </div>
                    @endif

                    <div class="input-group mb-4">
                        <input class="form-control" type="file" name="image" id="inputFile">
                    </div>

                    <!-- Name input -->
                    <div class="input-group mb-4">
                        <div class="input-group-text"><i class='bx bxs-user'></i></div>
                        <input type="text" class="form-control" placeholder="Username" name="name"
                            value="{{ Auth::user()->name }}" />
                    </div>

                    {{-- No.telp --}}
                    <div class="input-group mb-4">
                        <div class="input-group-text"><i class='bx bxs-phone'></i></div>
                        <input type="text" class="form-control" placeholder="Phone" name="hp"
                            value="{{ Auth::user()->hp }}" />
                    </div>

                    <!-- Email input -->
                    <div class="input-group mb-4">
                        <div class="input-group-text">@</div>
                        <input type="text" class="form-control" placeholder="Email" name="email"
                            value="{{ Auth::user()->email }}" />
                    </div>
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block">save</button>
                </form>
            </div>

            <div class="history">
                <div class="d-flex">
                    <button class="border-0 bg-transparent fw-bold" onclick="history()">History</button>
                    <button type="button" class="btn-close" aria-label="Close" id="close"
                        style="display: none"></button>
                </div>
                <div class="card card-history" style="width: 23rem;" id="card">
                    <table class="table align-middle bg-white text-center">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Limit</th>
                                <th>Prize</th>
                                <th>Status</th>
                                <th>Created at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($history as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->limit }}</td>
                                    <td>{{ $item->prize }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script>
            const card = document.getElementById('card');
            const close = document.getElementById('close');
            const trash = document.querySelector(".trash");

            function history() {
                card.style.display = 'block';
                close.style.display = 'block';
                close.style.marginLeft = '17rem';
                trash.style.marginLeft = '2%';
            }

            close.addEventListener("click", function() {
                card.style.display = 'none';
                close.style.display = 'none';
                trash.style.marginLeft = '16%';
            });

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
    </body>

    </html>
@stop
