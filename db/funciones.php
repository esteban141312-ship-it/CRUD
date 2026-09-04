<?php
function obtener_usuarios()
{
    try {
        // 1. Importar conexion a la DB
        require "conexion.php";


        // 3. Consultar la DB
        $sql = "SELECT * FROM autor;";

        // 4. Ejecutar la consulta con mysqli
        $query = mysqli_query($conex, $sql);

        // 5. Acceder a los resultados
        // echo '<pre>';
        //  var_dump(mysqli_fetch_assoc($query));
        // echo '</pre>';
        // 6. Cierre de conexión (opcional)
        // $cierre = mysqli_close($conex);
        // var_dump($cierre);




        return $query;
    } catch (\Throwable $th) {
        var_dump($th);
    }
}


function insertar_autor()
{
    try {
        require "conexion.php";

        // Insertar datos
        if (
            isset($_POST["nombre"]) && isset($_POST["nacionalidad"]) &&
            $_POST["nombre"] != "" && $_POST["nacionalidad"] != "" && !$errores
        ) {

            $nombre = $_POST["nombre"];
            $nacionalidad = $_POST["nacionalidad"];

            $sql = "INSERT INTO autor (nacionalidad, nombre) 
                VALUES ('$nacionalidad', '$nombre')";

            mysqli_query($conex, $sql);
        }
    } catch (\Throwable $th) {
        var_dump($th);
    }
}

// $resultado = mysqli_query($conex, $query);
// if($resultado->num_rows){
//     $errores[]="El usuario ya existe";
// }




