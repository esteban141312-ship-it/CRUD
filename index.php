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
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
</head>
<body>
<?php if (!isset($_SESSION['usuario'])): ?>
    <br>
    <a href="formulario/FormLogin.php">Ir al Login</a>

    <!-- formulario registro-->
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
    </form>

    <?php
    if (!empty($adduser) && is_array($adduser)) {
        foreach ($adduser as $error){
            echo "<p style='color:red;'>$error</p>";
        }
    }
    ?>

<?php else: ?>
    <h1>Bienvenido, <?= $_SESSION['usuario'] ?></h1>
    <a href="pag/CerrarSesion.php">Cerrar Sesión</a>

    <!-- Botón para crear usuario dentro del panel -->
    <h2>Acciones</h2>
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

        <input type="submit" name="agregar" value="Crear Usuario">
    </form>

    <h2>Lista de Usuarios</h2>
    <table >
        <tr>
            <th>ID</th>
            <th>Cédula</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Teléfono</th>
        </tr>
        <?php while($u = mysqli_fetch_assoc($usuarios)): ?>
            <tr>
                <td><?= $u['id'] ?></td>
                <td><?= $u['cedula'] ?></td>
                <td><?= $u['nombre'] ?></td>
                <td><?= $u['apellido'] ?></td>
                <td><?= $u['correo'] ?></td>
                <td><?= $u['celular'] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
<?php endif; ?>
</body>
</html>
