<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carrito</title>

    <link rel="icon" href="imagenes/atom.ico">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/contactenos.css">
    <link rel="stylesheet" href="css/login/log.css">
    <link rel="stylesheet" href="css/login/animated.css">   
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/carrito/carrito.css"> 
     <link rel="stylesheet" href="css/carrito/estilos.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Staatliches&display=swap" rel="stylesheet">
    
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

<div class="shopping-cart">
  <!-- Titulo xd -->
  <div class="title">
    Carrito
  </div>
 
  <!-- Producto #1 -->
  <div class="item">
    <div class="buttons">
      <span class="delete-btn"></span>
      <span class="like-btn" onclick="animacion()"></span>
    </div>
 
    <div class="image">
      <img src="imagenes/25.png" alt="" />
    </div>
 
    <div class="description">
      <span>The Killing Joke</span>
      <span>Joker</span> 
      <span>DC</span>
    </div>
 
    <div class="quantity">
      <button class="plus-btn" type="button" name="button">
        <img src="imagenes/carrito/plus.svg" alt="" />
      </button>
      <input type="text" name="name" value="1">
      <button class="minus-btn" type="button" name="button">
        <img src="imagenes/carrito/minus.svg" alt="" />
      </button>
    </div>
 
    <div class="total-price">$549</div>
  </div>
 
</div>

<script src="js/carrito/carrito.js"></script>

<?php

include("include/footer.html");

?>

</body>
</html>