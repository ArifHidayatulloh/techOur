<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh; background-color: #303234">
        <div class="row d-flex justify-content-center align-items-center p-5 rounded" style="background-color: #f6f6f6">
            <div class="col-lg-6">
                <img src="https://i.pinimg.com/564x/f1/7b/7c/f17b7c18cbff2108b875e05eaae1020d.jpg" class="img-fluid"
                    alt="Sample image">
            </div>
            <div class="col-lg-6">
                <form>
                    <div class="d-flex flex-row align-items-center justify-content-center">
                        <p class="lead fw-bold mb-3">Log in</p>
                    </div>

                    <!-- Email input -->
                    <div class="form-floating mb-4">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Checkbox -->
                        <div class="form-check mb-0">
                            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                            <label class="form-check-label" for="form2Example3">
                                Remember me
                            </label>
                        </div>
                        <a href="#!" class="text-body">Forgot password?</a>
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn text-white w-auto ps-5 pe-5" style="background-color: #3E4C59;">Log in</button>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="/register"
                                class="link-danger">Register</a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>
