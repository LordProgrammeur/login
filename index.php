<?php
    session_start();
    
    require 'database.php';

    if (isset($_SESSION['user_IDusuario'])) {
        $records = $conn->prepare('SELECT IDusuario, email, password FROM users WHERE IDusuario = :IDusuario');
        $records->bindParam(':IDusuario', $_SESSION['user_IDusuario']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $user = null;

        if (count($results) > 0) {
            $user = $results;
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if (!empty($user)): ?>
        <br> Binvenido <?= $user['email'] ?>
        <br> Iniciaste sesion con exito
        <a href="logout.php">Cierre de sesion correcto.</a>
    <?php else: ?>
    <h1>Iniciaste sesion con exito</h1>
    <a href="login.php"></a>
    <a href="registro-login.php"></a>
    <?php endif?>
</body>
</html>