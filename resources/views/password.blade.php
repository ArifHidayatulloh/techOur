@extends('layout.header')
@section('index-content')

    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Password change</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>

    <body>
        <div class="d-flex justify-content-center">
            <div class="content rounded-3 border border-dark-subtle w-100 m-5 p-5 shadow-sm">
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
        </div>
    </body>

    </html>
@stop
