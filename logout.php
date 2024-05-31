<?php
    session_start();

    session_unset();

    session_destroy();

    header('Location: /softwareSena/login/login.php');

    echo "<script>alert('Cierre de sesion exitoso');</script>";

?>