<?php
require "conexion.php";

function create_user($conex) {
    if (isset($_POST['agregar'])) {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $cedula = $_POST['cedula'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $contraseña = $_POST['contraseña'];
        $confcontraseña = $_POST['confcontraseña'];

        $errores = [];

        if ($contraseña !== $confcontraseña) {
            $errores[] = "Las contraseñas no coinciden";
        }

        if (empty($errores)) {
            // Encriptar contraseña antes de guardar
            $hash = password_hash($contraseña, PASSWORD_DEFAULT);

            $sql = "INSERT INTO usuarios (nombre, apellido, cedula, correo, celular, contraseña) 
                    VALUES ('$nombre', '$apellido', '$cedula', '$correo', '$telefono', '$hash')";
            mysqli_query($conex, $sql);
        }

        return $errores;
    }
}

function obtener_usuarios($conex) {
    $sql = "SELECT * FROM usuarios";
    $resultado = mysqli_query($conex, $sql);
    return $resultado; // 🔑 aquí devolvemos el resultado de la consulta
}
?>


// $resultado = mysqli_query($conex, $query);
// if($resultado->num_rows){
//     $errores[]="El usuario ya existe";
// }
