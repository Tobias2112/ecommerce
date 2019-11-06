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
if(isset($_SESSION['nueva'])){
	if(isset($_SESSION['carrito'])){	
		if(isset($_GET['id'])){
		//ingresa un nuevo product o un producto existente para actualizar cantidad
		$existe=buscarSiProductoExite($_GET['id']);
			if($existe==0){
				//ingresa un nuevo producto
				agregarNuevoProducto($_GET['id']);
			}
		}
		if(isset($_GET['id_suma'])){
			sumarCantidad($_GET['id_suma']);
		}
		if(isset($_GET['id_resta'])){
			restarCantidad($_GET['id_resta']);
		}
		if(isset($_GET['id_borra'])){
			eliminarProdCarrito($_GET['id_borra']);
		}	
		mostrarProductosCarrito();	
		if(isset($_SESSION['carrito'])){	
		echo '<a href="confirmar_compra.php" class="finalizar">Finalizar compra</a><br>';
		}	
	}elseif(isset($_GET['id'])){
		// COMO NO EXISTE $_SESSION['carrito']
		//quiere decir que ingresa el primer producto al carrito
		agregarPrimerProducto($_GET['id']);
		mostrarProductosCarrito();
		echo '<a href="confirmar_compra.php" class="finalizar">Finalizar compra</a><br>';
		}else{
			echo 'carrito vacio'.'<br>';
		}	
	echo '<a href="prod.php" class="seguir_viendo">Seguir viendo productos</a>';
}else{
	//si no existe $_SESSION['usuario']
	echo 'Debes iniciar sesion para utilizar el carrito
		  Iniciar Sesion';
}
 ?>


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