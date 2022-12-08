<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="style.css" />
    </head>

    <body>
        <div class="login-page">
            <img class="user" src="https://i.ibb.co/yVGxFPR/2.png" height="100px" width="100px" />
            <h3>Sign in here</h3>
            <form action="tambah.php" method="POST">
                <input type="text" name="txtUsername" placeholder="username" />
                <input type="password" name="txtPassword" placeholder="password" />
                <input type="submit" name="" value="Login" />
            </form>
            <p class="text-center">Belum punya akun? <a data-toggle="tab" href="regis.html">Daftar</a></p>
        </div>
    </body>

</html>