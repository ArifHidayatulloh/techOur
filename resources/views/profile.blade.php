@extends('layout.header')
@section('index-content')

    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <title>profile</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>

    <style>
        .card {
            width: 20rem;
            height: 100%;
        }

        @media screen and (max-width: 796px) {
            .body {
                flex-direction: column;
            }

            .card {
                display: flex;
                width: 18rem;
                margin: 0;
            }
        }
    </style>

    <body>
        <div class="body d-flex">
            <div class="card m-5 p-3">
                <div class="card-img text-center">
                    @if (Auth::user()->image == null)
                        <img src="{{ url('assets/image/it/user.png') }}" alt="" class="w-50 mb-2">
                    @else
                        <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="" class="w-50 mb-2">
                    @endif
                </div>
                <div class="text-center">
                    <h5 class="card-title fs-4">{{ Auth::user()->name }}</h5>
                    <p class="card-text fs-6">{{ Auth::user()->email }}</p>
                </div>
                <div class="text-center">
                    <a href="" class="text-decoration-none text-dark mt-1">limit :
                        {{ $data }}/{{ $limit }}
                    </a>
                </div>
                <div class="card-btn bg-body-tertiary mb-3 mt-3 p-1 text-center">
                    <a href="/password" class="text-decoration-none text-dark">ubah sandi</i></a>
                </div>
            </div>

            <div class="content rounded-3 border border-dark-subtle w-75 m-5 ms-0 p-5 shadow-sm">
                <h4>Profile information</h4>
                <p>Update your account's profile information and email address</p>
                @if (session('successProfile'))
                    <div class="alert alert-success mt-2 me-5 ms-5 justify-content-center">
                        {{ session('successProfile') }}
                    </div>
                @endif
                <form action="{{ route('profile.edit', ['id' => Auth::user()->id]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="d-flex justify-content-center mb-4">
                        @if (Auth::user()->image == null)
                            <img src="{{ url('assets/image/it/user.png') }}" alt="" class="w-25">
                        @else
                            <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="" class="w-25">
                        @endif
                    </div>
                    <div class="input-group mb-4">
                        <input class="form-control" type="file" name="image">
                    </div>

                    <!-- Name input -->
                    <div class="input-group mb-4">
                        <div class="input-group-text"><i class='bx bxs-user'></i></div>
                        <input type="text" class="form-control" placeholder="Username" name="name"
                            value="{{ Auth::user()->name }}" />
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
            <div>
                <div class="d-flex">
                    <button class="border-0 bg-transparent fw-bold" onclick="history()">History</button>
                    <button type="button" class="btn-close" aria-label="Close" id="close" style="display: none"></button>
                </div>
                <div class="card" style="width: 23rem; display: none;" id="card">
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

        {{-- <div class="d-flex justify-content-center">
            <div class="content rounded-3 border border-dark-subtle w-100 m-5 mt-0 p-5 shadow-sm">
                <h4>Update Password</h4>
                <p>Ensure your account is using a long, random password to stay secure.</p>


                <form action="{{ route('password.update', ['id' => Auth::user()->id]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <!-- Password -->
                    <div class="form-outline mb-4">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="current_password" />
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label">New Password</label>
                        <input type="password" class="form-control" name="new_password" />
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="new_password_confirm" />
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success w-75">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger w-75">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('notMatch'))
                        <div class="alert alert-danger w-75">
                            {{ session('notMatch') }}
                        </div>
                    @endif
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">save</button>
                </form>
            </div>
        </div> --}}

        <script>
            const card = document.getElementById('card');
            const close = document.getElementById("close");

            function history() {
                card.style.display = 'block';
                close.style.display = 'block';
                close.style.marginLeft = '17rem';
            }

            close.addEventListener("click", function() {
                card.style.display = 'none';
                close.style.display = 'none';
            });
        </script>
    </body>

    </html>
@stop
