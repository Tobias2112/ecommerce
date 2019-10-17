<?php

include ("../conexion.php");

$cod = $_REQUEST['cod'];

$sql = "SELECT * FROM usuario WHERE codigo='$cod'";

$consulta = mysqli_query($conexion,$sql);

$row = mysqli_fetch_assoc($consulta);

if ($cod == $row['codigo'] ) {
    $update = "UPDATE usuario SET verificacion='verificado' WHERE codigo='".$cod."'";   
    $update_sq = mysqli_query($conexion,$update);?>
    

    <!DOCTYPE html>
    <html lang="en">
    <head>
      <link href="https://fonts.googleapis.com/css?family=Hind+Siliguri&display=swap" rel="stylesheet">
       <link rel="stylesheet" href="esilos.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        
        <div class="ventana">
        
        <h1>Gracias por Confirmar</h1>
        <p>Para seguir navegando haga click en el siguiente enlace</p>
        <a href="../../index.php">Inicio</a>
        </div>

    </body>
    </html>
    
    
    
    
    
    <?php
}




?>

