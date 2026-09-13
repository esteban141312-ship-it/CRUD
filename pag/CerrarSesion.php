<?php
session_start();

// Eliminar solo la variable de usuario
unset($_SESSION['usuario']);

// O si quieres destruir toda la sesión:
// session_unset();
// session_destroy();

// Redirigir al index
header("Location: ../index.php");
exit;
?>
