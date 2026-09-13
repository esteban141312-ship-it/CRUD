
<?php
session_start();
require "../db/funciones.php";
require "../db/conexion.php";

// Proteger acceso
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

$usuarios = obtener_usuarios();
?>

<h1>Lista de Usuarios</h1>
<a href="../formulario/FormUsuarios.php">Agregar Usuario</a> | 
<a href="CerrarSesion.php">Cerrar Sesión</a>

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



<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
?>
