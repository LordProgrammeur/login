<?php
    require 'database.php';

    $message = '';

    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email',$_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password);
        if ($stmt->execute()) {
            echo "<script>alert('Usuario creado con exito');</script>";
            // $message = 'Usuario creado con exito';
        } else {
            echo "<script>alert('Lo siento, no se ha podido crear el usuario');</script>";
            // $message = 'Lo siento, no se ha podido crear el usuario';
        }
    }   
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet-Stylo</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .bg{
            background-image: url(img/gato.jpg);
            background-position: center center;
            background-repeat: no-repeat;
        }
        body{
            background-image: url(img/fondo.jpg);
        }

        .login{
            background: linear-gradient(#70d0df, #e2e2e2, #70d0df);
        }
        footer{
            background-color: #70d0df;
        }
    </style>
</head>
<body>
    <header class="navbar navbar-expand-sm fondoHeader">
        <div class="container-fluid">
            <!--Icono-->
            <a class="navbar-brand" href="#">
                <img class="logo" src="img/logo sin fondo.png" alt="">
            </a>
            <!--Icono menu-->
            <button style="background-color: #ee8133;" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!--Elementos del menu colapsable-->
            <div style="background-color: #70d0df;" class="collapse navbar-collapse rounded p-4" id="menu">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Citas</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a style="background-color: #ee8133;" class="btn nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown">Horarios</a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item">Lunes a Viernes: 8:00am a 6:00pm</li>
                            <li class="dropdown-item">Sabados y Domingos: 11:00am a 4:00pm</li>
                        </ul>
                    </li>
                </ul>   
                <a class="d-flex ms-auto" href="login.php">Inicia sesion</a>
            </div>
        </div>
    </header>

    <?php if(!empty($message)): ?>
        <p><?= $message; ?></p>
    <?php endif; ?>

    <main>
        <div class="container w-75 rounded shadow login mt-4 mb-4">
            <div class="row align-items-stretch">
                <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">

                </div>
                <div class="col p-5 rounded-end">
                    <div class="text-end">
                        <img src="img/tienda-en-linea.png" width="70" alt="">
                    </div>
                    <h2 class="fw-bold text-center py-5">Ingresa tus datos</h2>
                    <span>O <a href="login.php">Inicia sesion</a></span>
                    <!--Registro datos-->
                    <form action="registro-login.php" method="post">
                        <div class="mb-4">
                            <label for="email" class="form-label">Correo Electronico</label>
                            <input type="email" class="form-control" name="email" id="" required>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label">Crear Contraseña</label required>
                            <input type="password" class="form-control" name="password" id="">
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label">Repetir Contraseña</label required>
                            <input type="password" class="form-control" name="confirm-password" id="">
                        </div>
                        <div class="d-grid">
                            <button style="background-color: #70d0df;" type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <footer>Aqui va el footer</footer>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>