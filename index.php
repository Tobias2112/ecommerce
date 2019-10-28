
<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="imagenes/atom.ico">
  <link rel="stylesheet" href="css/pushbar/pushbar.css">
    <link href="css/index.css" rel="stylesheet">
    <link href="css/header.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Staatliches&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/login/log.css">
    <link rel="stylesheet" href="css/login/animated.css">   
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/buscador.css">  
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  </head>
  <body class="index">


  <?php



    

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
<!-- MODAL -->


    
   

<div id="open-modal" class="modal-window">
  <div>
    <a href="#" title="Close" class="modal-close">Close</a>
    <?php  include("include/log.php");  ?>
    </div>
</div>

<!-- MODAL -->

  <div class="banner">

        <div class="banner__item">
          <a class="banner__title marvel" href="hero.php?compania=Marvel">Marvel</a>
        </div>

        <div class="banner__item">
          <a class="banner__title dc" href="hero.php?compania=DC">d</a>
        </div>


    </div>
    <!-- pushbar -->
     <div data-pushbar-id="mypushbar1" class="pushbar from_right">
        <button data-pushbar-close><i class="fas fa-times"></i></button>
        <form class="pushForm" action="#">
          <input name="nombre" type="text">
          <input type="email" name="email" id="">
          <input name="fechaRegistro" type="text">
          <input name="ultimaConeccion" type="text">
        </form>
        <a class="cerrarSesion" href="sql/login/logout.php">Cerrar sesion</a>
      </div>
      <!-- pushbar -->

    <?php

      include("include/footer.html");

    ?>
    <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script src="js/login/log.js"></script>
<script src="js/buscador.js"></script>
<script src="js/pushbar/pushbar.js"></script>
<script type="text/javascript">
  new Pushbar({
    blur:true,
    overlay:true,
  });
</script>
  
  </body>
</html>
