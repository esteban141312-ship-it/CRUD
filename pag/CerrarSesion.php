<?php
session_start();

// Eliminar solo la variable de usuario
unset($_SESSION['usuario']);



// Redirigir al index
header("Location: ../index.php");
exit;
?>
