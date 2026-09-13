<?php

function obtener_usuarios()
{
    try {
        require "conexion.php";
        $sql = "SELECT * FROM usuarios";
        $query = mysqli_query($conex, $sql);

        return $query;
    } catch (\Throwable $th) {
        var_dump($th);
    }
}


function create_user()
{
    if (isset($_POST['agregar'])) {

        require "conexion.php";

        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $cedula = $_POST["cedula"];
        $correo = $_POST["correo"];
        $telefono = $_POST["telefono"];
        $contraseña = $_POST["contraseña"];
        $comprobacion = $_POST["confcontraseña"];

        $errores = [];

        if (!$cedula) {
            $errores[] = "Ingrese el numero de cedula";
        }

        if (!$nombre) {
            $errores[] = "Ingrese un nombre";
        }

        if (!$apellido) {
            $errores[] = "Ingrese el apellido";
        }

        if (!$correo) {
            $errores[] = "Ingrese el correo";
        }

        if (!$telefono) {
            $errores[] = "Ingrese el numero de telefono";
        }

        if (!$contraseña) {
            $errores[] = "Ingrese la contraseña";
        }

        if ($contraseña != $comprobacion) {
            $errores[] = "Las contraseñas no coinciden";
        } else {
            $contraseña = password_hash($contraseña, PASSWORD_BCRYPT);
        }

        if (empty($errores)) {

            $sql = "INSERT INTO usuarios 
            (cedula, nombre, apellido, correo, contraseña, celular) 
            VALUES 
            ('$cedula', '$nombre', '$apellido', '$correo', '$contraseña', '$telefono')";

            $query = mysqli_query($conex, $sql);

            if ($query) {
                header("Location: index.php");
                exit;
            }
        } else {
            return $errores;
        }
    }
}

// $resultado = mysqli_query($conex, $query);
// if($resultado->num_rows){
//     $errores[]="El usuario ya existe";
// }
