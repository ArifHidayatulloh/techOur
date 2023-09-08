@extends('layout.header')
@section('index-content')

    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>profile</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    </head>

    <body>
        <div class="d-flex justify-content-center">
            <div class="content rounded-3 border border-dark-subtle w-100 m-5 p-5 shadow-sm">
                <h4>Profile information</h4>
                <p>Update your account's profile information and email address</p>

                @if (session('successProfile'))
                    <div class="alert alert-success w-75">
                        {{ session('successProfile') }}
                    </div>
                @endif
                <form action="{{ route('profile.edit', ['id' => Auth::user()->id]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form7Example1">Name</label>
                        <input type="text" id="form7Example1" class="form-control" name="name"
                            value="{{ Auth::user()->name }}" />
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form7Example2">Email address</label>
                        <input type="email" id="form7Example2" class="form-control" name="email"
                            value="{{ Auth::user()->email }}" />
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">save</button>
                </form>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <div class="content rounded-3 border border-dark-subtle w-100 m-5 mt-0 p-5 shadow-sm">
                <h4>Update Password</h4>
                <p>Ensure your account is using a long, random password to stay secure.</p>


                <form action="{{ route('password.update', ['id' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- Password -->
                    <div class="form-outline mb-4">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="current_password"/>
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label">New Password</label>
                        <input type="password" class="form-control" name="new_password"/>
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="new_password_confirm"/>
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
        </div>
    </body>

    </html>
@stop
