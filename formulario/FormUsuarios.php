<?php
session_start();
?>

<h1>Registrar Usuario</h1>
<form action="../index.php" method="POST" autocomplete="off">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required><br>

    <label for="apellido">Apellido:</label>
    <input type="text" name="apellido" required><br>

    <label for="cedula">Cédula:</label>
    <input type="text" name="cedula" required><br>

    <label for="correo">Correo:</label>
    <input type="email" name="correo" required><br>

    <label for="telefono">Teléfono:</label>
    <input type="text" name="telefono" required><br>

    <label for="contraseña">Contraseña:</label>
    <input type="password" name="contraseña" required><br>

    <label for="confcontraseña">Confirmar Contraseña:</label>
    <input type="password" name="confcontraseña" required><br>

    <input type="submit" name="agregar" value="Registrar">
</form>
<a href="FormLogin.php">iniciar sesion</a>