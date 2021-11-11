<?php

require_once "../_config/config.php";

// proses login
if (isset($_POST['login'])) {
    $user = trim(mysqli_real_escape_string($con, $_POST['user']));
    $pass = sha1(mysqli_real_escape_string($con, $_POST['password']));
    // echo $pass;
    $sql_login = mysqli_query($con, "SELECT * FROM tb_user WHERE username = '$user' AND password = '$pass'") or die(mysqli_error($con));

    if (mysqli_num_rows($sql_login)) {
        $d = mysqli_fetch_array($sql_login);

        // buat session
        $_SESSION['user'] = [
            'id_user' => $d['id_user'],
            'nama_user' => $d['nama_user'],
            'username' => $d['username'],
            'level' => $d['level']
        ];

        echo "
            <script>
                window.location='" . base_url() .  "';
            </script>
        ";
    } else {

        echo "
            <script>
                alert('Username atau Password Salah');
            </script>
        ";
    }
}

if (isset($_SESSION['user'])) {
    echo "
        <script>
            alert('Anda sudah login.!');
            window.location='" . base_url() .  "';
        </script>
    ";
} else {
?>

    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.84.0">
        <title>Halaman Login</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">


        <link rel="stylesheet" href="<?= base_url() ?>_assets/bootstrap-5/css/bootstrap.min.css">


        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
        </style>


        <!-- Custom styles for this template -->
        <link href="<?= base_url() ?>_assets/bootstrap-5/login/signin.css" rel="stylesheet">

        <!-- icon -->
        <link rel="icon" href="<?= base_url() ?>_assets/img/icon/login.png">
    </head>

    <body class="text-center">

        <main class="form-signin">
            <img class="mb-4" src="<?= base_url() ?>_assets/img/icon/login.png" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Halaman Login</h1>

            <form action="" method="post">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="user" autocomplete="off" required>
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating mt-2">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
                    <label for="floatingPassword">Password</label>
                </div>

                <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Login</button>
            </form>
            <p class="mt-5 mb-3 text-muted">&copy; 2021 | By Humaidi Zakaria | Bootstrap-5</p>
        </main>



    </body>

    </html>

<?php } ?>