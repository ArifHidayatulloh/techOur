<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<style>
    .body{
        background-color: #303234;
        height: 100vh;
    }

    @media screen and (max-width: 796px){
        .body{
            background-color: #F6F6F6;
            flex-direction: column;
        }
    }
</style>

<body>
    <div class="body d-flex justify-content-center align-items-center">
        <div class="row d-flex justify-content-center align-items-center p-5 rounded" style="background-color: #f6f6f6">
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    <b>Opps!</b> {{ session('error') }}
                </div>
            @endif
            <div class="row-img col-lg-6">
                <img src="https://i.pinimg.com/564x/f1/7b/7c/f17b7c18cbff2108b875e05eaae1020d.jpg" class="img-fluid">
            </div>
            <div class="row-form col-lg-6">
                <form action="{{ route('actionlogin') }}" method="post">
                    @csrf
                    <div class="d-flex flex-row align-items-center justify-content-center">
                        <p class="lead fw-bold mb-3" style="font-family: Georgia; letter-spacing: 1px;">Log in</p>
                    </div>

                    <!-- Email input -->
                    <div class="form-floating mb-4">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"
                            name="email">
                        <label for="floatingInput">Email address</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                            name="password">
                        <label for="floatingPassword">Password</label>
                        <input type="checkbox" onclick="myFunction()" class="ms-1"> show password
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn text-white w-auto ps-5 pe-5"
                            style="background-color: #3E4C59;">Log in</button>
                    </div>

                </form>
            </div>
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
</body>

</html>
