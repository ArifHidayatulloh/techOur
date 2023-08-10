<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ ('assets/css/admin/login.css') }}">
    <title>Login</title>
</head>

<body>
    <div class="login">
         <img src="{{ ('assets/image/it/user.png') }}" alt="">
            <form action="">
                <div class="username">
                    <p>Username</p>
                    <input type="text" required>
                </div>
                <div class="pass">
                    <p>Password</p>
                    <input type="password" required>
                </div>
                <div class="btn">
                    <div class="primary">
                        <input type="submit" value="login">
                    </div>
                </div>
            </form>
        </div>
</body>

</html>
