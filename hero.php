<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="icon" href="imagenes/atom.ico">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/hero.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/owl/owl.carousel.css">
    <link rel="stylesheet" href="css/owl/carousel.css">
    <link rel="stylesheet" href="css/login/log.css">
    <link rel="stylesheet" href="css/login/animated.css">   
    <link rel="stylesheet" href="css/modal.css"> 
    <link rel="stylesheet" href="css/buscador.css"> 

    
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


<!-- MODAL -->
<div id="open-modal" class="modal-window">
  <div>
    <a href="#" title="Close" class="modal-close">Close</a>
    <?php  include("include/log.php");  ?>
    </div>
</div>
<!-- MODAL -->

<div class="contenedor">

    <h1>Comics Varios</h1>

    <div class="slider">
	<div class="owl-carousel" id="slider">

    <?php

$compania = $_REQUEST['compania'];

                    include("sql/conexion.php"); 
                    $sql = "SELECT * FROM comics WHERE empresa='$compania'";
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

                                                <a href="agregar_carrito.php?id_user=<?php echo $row2['id_user']; ?>&&?id_prod=<?php echo $row['id']; ?>"><i class="fas fa-cart-plus"></i></a>
                                                   <?php
                                                }else{ 
                                        
                                        ?>
                                        <a href="#"><i class="fas fa-cart-plus"></i></a>

                                                <?php } ?>
                                    </div>
                                </div>
                                <hr>
                                <p class="nombre" ><a href="producto.php?comic= <?php echo $row['id']; ?> "> <?php echo $row['nombre']; ?> </a></p>
                                <p class="precio">$<?php echo $row['precio']; ?></p>
                            </section>




                <?php } ?>

	</div>
</div>


    <h1>Heroes</h1>
    <div class="cont-heros">
    <?php 
    
    $consulta = "SELECT * FROM heroes WHERE compania='$compania'";
    $result = mysqli_query($conexion,$consulta);
    
    while($campo = mysqli_fetch_assoc($result)){
     ?>  

    
            <div class="hero">
                <h2><?php echo $campo['nombre']; ?></h2>
                <div class="imagen">
                    <a href="prod.php?heroes=<?php echo $campo['id_heroe']; ?>"><img src="imagenes/heroes/<?php echo $campo['imagen'];?>" alt=""></a>
                </div>
            </div>

    
     <?php 
    }
    
    ?>
    </div>
</div>

<?php include("include/footer.html") ?>

<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="js/owl/owl.carousel.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.owl-carousel').owlCarousel({
			loop:true,
		    responsiveClass:true,
            center: true,
             autoplay: true,
            autoplayTimeout:2000,
            autoplayHoverPause: true,
		    responsive:{
		        0:{
		            items:1,
		            nav:false
		        },
		        600:{
		            items:2,
		            nav:false
		        },
		        1000:{
		            items:4,
		            nav:true,
		            loop:true
		        }
		        }
		});
	})
</script>

<script src="js/login/log.js"></script>
<script src="js/buscador.js"></script>

</body>
</html>