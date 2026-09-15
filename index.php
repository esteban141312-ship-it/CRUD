<?php
session_start();
require "./db/conexion.php";
require "./db/funciones.php";

// Procesar registro si se envió el formulario
$adduser = create_user($conex);

// Obtener usuarios si hay sesión activa
$usuarios = null;
if (isset($_SESSION['usuario'])) {
    $usuarios = obtener_usuarios($conex);
}

if (isset($_SESSION['usuario'])) {
    header("Location: pag/users.php");
    exit;
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
</head>

<body>

    <br>
    <a href="formulario/FormLogin.php">Ir al Login</a>


    <!-- 
        <h2>Crear Usuario</h2>
        <form action="index.php" method="POST" autocomplete="off">
            <label>Nombre:</label>
            <input type="text" name="nombre" required><br>

            <label>Apellido:</label>
            <input type="text" name="apellido" required><br>

            <label>Cédula:</label>
            <input type="text" name="cedula" required><br>

            <label>Correo:</label>
            <input type="email" name="correo" required><br>

            <label>Teléfono:</label>
            <input type="text" name="telefono" required><br>

            <label>Contraseña:</label>
            <input type="password" name="contraseña" required><br>

            <label>Confirmar Contraseña:</label>
            <input type="password" name="confcontraseña" required><br>

            <input type="submit" name="agregar" value="Registrar">
        </form> -->

    <?php
    if (isset($adduser)) {
        foreach ($adduser as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
    ?>
</body>

</html>