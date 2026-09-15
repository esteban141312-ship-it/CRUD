<?php
session_start();

// Eliminar solo la variable de usuario
unset($_SESSION['usuario']);

header("Location: ../index.php");
exit;
?>
