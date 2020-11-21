
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

    <?php 
      $sql2 = "SELECT * FROM usuario WHERE email='".$_SESSION['nueva']."'";
      $exe = mysqli_query($conexion,$sql2);
      $row2 = mysqli_fetch_assoc($exe);
    ?>

     <div data-pushbar-id="mypushbar1" class="pushbar from_right">
        <button data-pushbar-close><i class="fas fa-times"></i></button>
        <form class="pushForm" action="#">
          <label for="nombre">Nombre</label>
          <input name="nombre" id="nombre" type="text" value="<?php echo $row2['nbr_user']; ?>" disabled>
          <label for="email">Email</label>
          <input type="email" id="email" name="email" id="" value="<?php echo $row2['email']; ?>" disabled>
          <label for="fRegistro">Fecha registro</label>
          <input name="fechaRegistro" id="fRegistro" type="text" value="<?php echo date('d-m-Y',$row2['fecha_registro']); ?>" disabled>
          <label for="uConexion">Ultima conexion</label>
          <input name="ultimaConeccion" id="uConexion" type="text" value="<?php echo date('d-m-Y',$row2['ultima_conexion']); ?>" disabled>
        </form>
        <a class="cerrarSesion" href="sql/login/logout.php"><i class="fas fa-power-off"></i> Cerrar sesion</a>
    
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
