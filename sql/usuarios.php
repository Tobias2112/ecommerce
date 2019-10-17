<?php

    include ("conexion.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <link rel="stylesheet" href="usuarios.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Usuarios</h1>
    </header>
    <div class="content">

        <?php 

            $sql = "SELECT * FROM usuario";
            $consulta = mysqli_query($conexion,$sql);
            while($row = mysqli_fetch_assoc($consulta)){
        ?>

        <details>
            <summary> Nombre: <?php echo $row['nombre']   ?> <i class="fas fa-sort-down"></i> </summary>
            <p id="tit">Email:</p>
            <p><?php echo $row['email']   ?> </p>
            <p id="tit">Contraseña:</p>
            <p><?php echo $row['contrasenia']   ?> </p>
            <p id="tit">Verificado:</p>
            <p><?php echo $row['verificacion']   ?> </p>
            <p id="tit">Fecha Registro:</p>
            <p> <?php echo  date('d-m-Y', $row['fecha_registro'])   ?> </p>
            <p id="tit">Ultima Conexion</p>
            <p><?php echo date('d-m-Y', $row['ultima_conexion'])   ?> </p>
        </details>

            <?php } ?>
    </div>

</body>
</html>