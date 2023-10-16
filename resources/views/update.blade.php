@extends('layout.header')
@section('index-content')

    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>User edit</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    </head>

    <body>
        <div class="d-flex justify-content-center align-items-center mt-5 mb-5">
            <div class="row d-flex justify-content-center align-items-center p-5 rounded" style="background-color: #f6f6f6">
                <div class="col-lg-6">

                    <!-- Form -->
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="d-flex flex-row align-items-center justify-content-center">
                            <p class="lead fw-bold mb-3">Update</p>
                        </div>

                        <!-- Email name -->
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Name" name="name"
                                value="{{ $user->name }}">
                            <label for="floatingInput">Name</label>
                        </div>

                        <!-- Email input -->
                        <div class="form-floating mb-4">
                            <input type="email" class="form-control" id="floatingInput" placeholder="Email address"
                                name="email" value="{{ $user->email }}">
                            <label for="floatingInput">Email address</label>
                        </div>

                        <!-- Hp input -->
                        <div class="form-floating mb-4">
                            <input type="number" class="form-control" id="floatingInput" placeholder="Hp" name="hp"
                                value="{{ $user->hp }}">
                            <label for="floatingInput">Phone Number</label>
                        </div>

                        <select class="form-select form-select-lg" style="font-size: 17px" aria-label="Large select example"
                            name="role" value="{{ $user->role }}">
                            @if ($user->role != null)
                                <option selected value="{{ $user->role }}">{{ $user->role }}</option>
                                <option value="admin">admin</option>
                                <option value="sub admin">sub admin</option>
                            @else
                                <option value="admin">admin</option>
                                <option value="sub admin">sub admin</option>
                            @endif
                        </select>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn text-white w-auto ps-5 pe-5"
                                style="background-color: #3E4C59;">Save</button>
                            <button type="reset" class="btn text-white w-auto ps-5 pe-5"
                                style="background-color: #3E4C59;">Cancel</button>
                        </div>

                    </form>
                </div>
                <div class="col-lg-6">
                    <img src="https://i.pinimg.com/564x/f1/7b/7c/f17b7c18cbff2108b875e05eaae1020d.jpg" class="img-fluid"
                        alt="Sample image">
                </div>
            </div>
        </div>
    </body>

    </html>
@stop
