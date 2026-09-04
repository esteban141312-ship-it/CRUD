<?php
require "./db/funciones.php";
$autor = obtener_usuarios();
insertar_autor();

// header("location: index.php");
// exit();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>conexion con mysqli</h1>
    <table>
        <thead>
            <tr>
                <th>Nombres</th>
                <th>Nacionalidad</th>

            </tr>
        </thead>


        <tbody>
            <?php
            while($user = mysqli_fetch_assoc($autor)){
               ?> 

               <tr>
                <td><?php echo $user['nombre']?></td>
                <td><?php echo $user['apellido']?></td>
               </tr>
               
            <?php   
            }
            ?>
        </tbody>

        <form method="POST">
            <input type="text" name="nombre" placeholder="Nombre">
            <label for="apellido">apellido</label>
            <input type="text" name="apellido" id=apellido>
            <label for="correo">correo</label>
            <input type="email" name="email" id="email">
            <input type="text" name="cedula" placeholder="Cedula">

            
            <input type="submit" value="Guardar">
        </form>

        <tbody>
            <?php
            while ($user = mysqli_fetch_assoc($autor)) {


            ?>
                <tr>
                    <td><?php echo $user["nombre"] ?></td>
                    <td><?php echo $user["nacionalidad"] ?></td>

                </tr>

            <?php
            }
            ?>
        </tbody>


    </table>




</body>

</html>