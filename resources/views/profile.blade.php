@extends('layout.header')
@section('index-content')

    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <title>profile</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>

    <style>
        .card{
            width: 20rem;
        }

        @media screen and (max-width: 796px){
            .body{
                flex-direction: column;
            }

            .card{
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
                    <img src="{{ asset('assets/image/team.jpg') }}" class="mt-5 mb-3 rounded-circle w-75" alt="...">
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title fs-4">{{ Auth::user()->name }}</h5>
                    <p class="card-text fs-6">{{ Auth::user()->email }}</p>
                </div>
                <div class="card-btn bg-body-tertiary mb-3 p-1 text-center">
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

                    <div class="d-flex justify-content-center mb-4" >
                        @if (Auth::user()->image == null)
                            <img src="data:image/png;base64,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" alt="" style="width: 250px;height:250px"> 
                        @else
                            <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="" style="width: 250px; border-radius:50%; height:250px;">
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
                        {{-- <input type="text" id="form7Example1" class="form-control" name="name"
                            value="{{ Auth::user()->name }}" /> --}}
                    </div>

                    <!-- Email input -->
                    <div class="input-group mb-4">
                        <div class="input-group-text">@</div>
                        <input type="text" class="form-control" placeholder="Email" name="email"
                            value="{{ Auth::user()->email }}" />
                        {{-- <input type="email" id="form7Example2" class="form-control" name="email"
                            value="{{ Auth::user()->email }}" /> --}}
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block">save</button>
                </form>
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
    </body>

    </html>
@stop
