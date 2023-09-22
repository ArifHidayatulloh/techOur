@extends('layout.header')
@section('index-content')

    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>register page</title>
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    </head>

    <body>
        <div class="d-flex justify-content-center align-items-center mt-5">
            <div class="row d-flex justify-content-center align-items-center p-5 rounded" style="background-color: #f6f6f6">
                <div class="col-lg-6">

                    <!-- Form -->
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf


                        <div class="d-flex flex-row align-items-center justify-content-center">
                            <p class="lead fw-bold mb-3">Register</p>
                        </div>

                        <!-- Email name -->
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Name" name="name">
                            <label for="floatingInput">Name</label>
                        </div>


                        <!-- Email input -->
                        <div class="form-floating mb-4">
                            <input type="email" class="form-control" id="floatingInput" placeholder="Email address"
                                name="email">
                            <label for="floatingInput">Email address</label>
                        </div>

                        @if (session('errors'))
                            <div class="alert alert-warning w-80">
                                <i class='bx bx-error'></i> {{ session('errors') }}
                            </div>
                        @endif

                        <!-- Hp input -->
                        <div class="form-floating mb-4">
                            <input type="number" class="form-control" id="floatingInput" placeholder="Hp" name="hp">
                            <label for="floatingInput">No Telpon</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                                name="password">
                            <label for="floatingPassword">Password</label>
                            <input type="checkbox" onclick="myFunction()" class="ms-1"> show password
                        </div>

                        <select class="form-select form-select-lg" style="font-size: 17px" aria-label="Large select example"
                            name="role">
                            <option selected>Choose Role</option>
                            <option value="sub admin">Sub Admin</option>
                            <option value="admin">Admin</option>
                        </select>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn text-white w-auto ps-5 pe-5"
                                style="background-color: #3E4C59;">Register</button>
                        </div>

                    </form>
                </div>
                <div class="col-lg-6">
                    <img src="https://i.pinimg.com/564x/f1/7b/7c/f17b7c18cbff2108b875e05eaae1020d.jpg" class="img-fluid"
                        alt="Sample image">
                </div>
            </div>


            <script>
                function myFunction() {
                    var x = document.getElementById("floatingPassword");
                    if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
                }
            </script>

            {{-- <div class="d-flex justify-content-center align-items-center" style="height: 100vh">
        <div class="card border-black" style="width: 30rem; background-color: #F6F6F6;">
            <div class="card-body">
                <form class="p-5">
                <h1 class="text-center mb-5">Sign Up</h1>
                <div class="mb-3">
                    <label for="staticEmail">Email</label>
                    <input type="email" class="form-control border-black" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="inputName">Name</label>
                    <input type="email" class="form-control border-black" id="exampleInputName">
                </div>
                <div class="mb-3">
                    <label for="inputPassword">Password</label>
                    <input type="password" class="form-control border-black" id="exampleInputPassword1">
                    <div id="passwordHelpBlock" class="form-text">
                        Your password must be 8-20 characters long
                      </div>
                </div>
                <button type="submit" class="btn text-white w-auto" style="background-color: #3E4C59;">Sign Up</button>
            </form>
        </div>
    </div> --}}
    </body>

    </html>
@stop
