<?php
session_start();

// Si ya hay sesión activa, redirigir al index
if (isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login por Nombre</title>
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <form action="../pag/login.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>

        <label for="contraseña">Contraseña:</label>
        <input type="password" name="contraseña" required><br>

        <input type="submit" name="login" value="Ingresar">
    </form>
</body>
</html>
