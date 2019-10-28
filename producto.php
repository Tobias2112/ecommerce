

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title> <?php echo $row['nombre']; ?> </title>
    <link rel="icon" href="imagenes/atom.ico">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/producto.css">
    <link rel="stylesheet" href="css/login/log.css">
    <link rel="stylesheet" href="css/login/animated.css">   
    <link rel="stylesheet" href="css/modal.css"> 
    <link rel="stylesheet" href="css/buscador.css"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Staatliches&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  </head>
  <body>

  <?php
session_start();

if(isset($_SESSION['nueva'])){
  include("include/sesion_header.php");
  include("include/sesion_nav.html");

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
  include("include/nav.html");
  session_destroy();
} ?>


    <div id="open-modal" class="modal-window">
      <div>
       <a href="#" title="Close" class="modal-close">Close</a>
       <?php  include("include/log.php");  ?>
      </div>
    </div>


 <?php 
      
      $id = $_REQUEST['comic'];

      include("sql/conexion.php");

      $sql = "SELECT * FROM comics WHERE id='$id'";

      $resultado = mysqli_query($conexion,$sql);

      $row = mysqli_fetch_assoc($resultado);

    
    ?>

    <div class="producto">


      <section class="imagen">

      <img class="img_prod" src="imagenes/<?php echo $row['imagen']; ?>" alt="">

      </section>
      <section class="caract">
        <p class="nombre"><?php echo $row['nombre']; ?></p>
        <p class="precio">$<?php echo $row['precio']; ?></p> 
        <p class="descripcion"><?php echo $row['descripcion']; ?></p>
        
        
            <section class="btn_buy">
                 <a href="#"> <button type="button" name="button">ADD TO CART </button>  </a>
                <a href="#"> <button> Volver  </button> </a>
            </section>

            
            

      </section>

     

    </div>

    





    <?php include ("include/footer.html"); ?>
    <script src="js/login/log.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="js/buscador.js"></script>
  </body>
</html>
