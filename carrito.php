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
     <link rel="stylesheet" href="css/buscador.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Staatliches&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-2.2.4.js" charset="utf-8"></script>
    
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
}
?>
<div class="shopping-cart">
  <!-- Titulo xd -->
  <div class="title">
    Carrito
  </div>
 
  <!-- Producto #1 -->
  <div class="item">
    <div class="buttons">
      <span class="delete-btn"></span>
      <span class="like-btn"></span>
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

<script type="text/javascript">
      $('.minus-btn').on('click', function(e) {
        e.preventDefault();
        var $this = $(this);
        var $input = $this.closest('div').find('input');
        var value = parseInt($input.val());

        if (value > 1) {
          value = value - 1;
        } else {
          value = 0;
        }

        $input.val(value);

      });

      $('.plus-btn').on('click', function(e) {
        e.preventDefault();
        var $this = $(this);
        var $input = $this.closest('div').find('input');
        var value = parseInt($input.val());

        if (value < 100) {
          value = value + 1;
        } else {
          value =100;
        }

        $input.val(value);
      });

      $('.like-btn').on('click', function() {
        $(this).toggleClass('is-active');
      });
    </script>

<?php

include("include/footer.html");

?>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="js/buscador.js"></script>
</body>
</html>