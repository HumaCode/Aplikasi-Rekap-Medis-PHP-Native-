<?php

require_once "../_config/config.php";

session_destroy();

// session_unset($_SESSION['user']['nama_user']);
// session_unset($_SESSION['user']['username']);
// session_unset($_SESSION['user']['id_user']);
// session_unset($_SESSION['user']['level']);


echo "
            <script>
                alert('Berhasil logout');
                window.location='" . base_url('auth/login.php') .  "';
            </script>
        ";
