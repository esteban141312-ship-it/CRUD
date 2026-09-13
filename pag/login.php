<?php
session_start();
require "../db/conexion.php";

if (isset($_POST['login'])) {
    $nombre = $_POST['nombre'];
    $contraseña = $_POST['contraseña'];

    $sql = "SELECT * FROM usuarios WHERE nombre='$nombre' LIMIT 1";
    $query = mysqli_query($conex, $sql);
    $user = mysqli_fetch_assoc($query);

    if ($user && password_verify($contraseña, $user['contraseña'])) {
        $_SESSION['usuario'] = $user['nombre'];
        header("Location: ../index.php");
        exit;
    } else {
        echo "<p style='color:red;'>Nombre o contraseña incorrectos</p>";
        echo "<a href='../formulario/FormLogin.php'>Volver al login</a>";
    }
}
?>
