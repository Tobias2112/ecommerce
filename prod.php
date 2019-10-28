<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <link rel="icon" href="imagenes/atom.ico">
    <link href="https://fonts.googleapis.com/css?family=Staatliches&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/prod.css" type="text/css">

    <link rel="stylesheet" href="css/nav.css" type="text/css">

    <link rel="stylesheet" href="css/header.css" type="text/css">

    <link rel="stylesheet" href="css/footer.css" type="text/css">

    <link rel="stylesheet" href="fonts/style.css">

    <link rel="stylesheet" href="css/login/log.css">

    <link rel="stylesheet" href="css/login/animated.css">  

    <link rel="stylesheet" href="css/modal.css">  
    <link rel="stylesheet" href="css/buscador.css">

    <title>Comics</title>

</head>
<body>
<?php

session_start();

if(isset($_SESSION['nueva'])){
    include("include/sesion_header.php");

    include ("sql/conexion.php");

    $sql= "SELECT verificacion FROM usuario WHERE email='".$_SESSION['nueva']."'";
    $consulta = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_assoc($consulta);

    if($row['verificacion'] == "no verificado"){
      echo " <div class='confirm'>
    <p>
       <i class='fas fa-exclamation-triangle'></i>
       Porfavor has la verificacion de la cuenta
    </p>
  </div>";
    }

  }else{
    include("include/header.html");
    session_destroy();
  }




?>
<?php  include("include/nav.html");  ?>
<!-- MODAL -->
<div id="open-modal" class="modal-window">
  <div>
    <a href="#" title="Close" class="modal-close">Close</a>
    <?php  include("include/log.php");  ?>
    </div>
</div>
<!-- MODAL -->
<div class="filtros">
            <h2>Ordenar por:</h2>
            <a href="#">Nombre</a>
            <a href="#">precio</a>
        </div>
<div class="contenedor">
      
                <?php
                @$heroe = $_REQUEST['heroes'];

                    include("sql/conexion.php");

                    if(isset($heroe)){
                        $sql = "SELECT * FROM comics WHERE id_heroe='$heroe'"; 
                    }else{
                        $sql = "SELECT * FROM comics";
                    }

                    
                    $resultado = mysqli_query($conexion,$sql);

                    while($row = mysqli_fetch_assoc($resultado)){
                        ?>


                            <section id="prod">
                            <div class="imagen">
                                <img class="img-prod"  src="imagenes/<?php echo $row['imagen']; ?>"> 
                                    <div class="overlay">
                                    <?php

                                                if(isset($_SESSION['nueva']) ){
                                                $sql2 = "SELECT id_user FROM usuario WHERE email='".$_SESSION['nueva']."'";
                                                $consulta = mysqli_query($conexion, $sql2);
                                                $row2 = mysqli_fetch_assoc($consulta);
                                                ?>

                                                <a href="agregar_carrito.php?id_user=<?php echo $row2['id_user']; ?>"><i class="fas fa-cart-plus"></i></a>
                                                <?php
                                                }else{ 

                                                ?>
                                                <a href="#"><i class="fas fa-cart-plus"></i></a>

                                                <?php } ?>
                                    </div>
                                </div>
                                <hr>
                                <p class="nombre" > <a href="producto.php?comic= <?php echo $row['id']; ?> "> <?php echo $row['nombre']; ?> </a></p>
                                <p class="precio">$<?php echo $row['precio']; ?></p>
                            </section>




                <?php } ?>


</div>
                <?php include("include/footer.html");   ?>
                <script src="js/login/log.js"></script>
                <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
                <script src="js/modal.js"></script>
                <script src="js/buscador.js"></script>

</body>
</html>
