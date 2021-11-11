<?php
require_once "_config/config.php";

// jika ada session maka akan di arahkan ke halaman dashboard
if (isset($_SESSION['user'])) {
    echo "
        <script>
            window.location ='" . base_url('dashboard') . "';
        </script>
        ";
} else {
    echo "
        <script>
            alert('Kamu harus login dulu.!');
            window.location = '" . base_url('auth/login.php') . "';
        </script>
    ";
}
