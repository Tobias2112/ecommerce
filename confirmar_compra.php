<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carrito</title>

    <link rel="icon" href="imagenes/atom.ico">
    <link rel="stylesheet" href="css/pushbar/pushbar.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/contactenos.css">
    <link rel="stylesheet" href="css/login/log.css">
    <link rel="stylesheet" href="css/login/animated.css">   
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/carrito/carrito.css"> 
     <link rel="stylesheet" href="css/carrito/estilos.css">
     <link rel="stylesheet" href="css/buscador.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Staatliches&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-2.2.4.js" charset="utf-8"></script>
    
</head>

<body>

<?php

session_start();
include("sql/libreria.php");
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
}
?>



<?php 

if(!isset($_GET['c'])){
    confirmarCompra();
    echo '<a class="finalizar" style="margin: 5% auto;" href="confirmar_compra.php?c=1">Confirmar Compra</a>';
  }else{
    comprar();
  }
?>

    <!-- pushbar -->

    <?php 
      $sql2 = "SELECT * FROM usuario";
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
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="js/buscador.js"></script>
    <script src="js/pushbar/pushbar.js" type="text/javascript"></script>
  <script type="text/javascript">
  new Pushbar({
    blur:true,
    overlay:true,
  });
</script>
</body>
</html>