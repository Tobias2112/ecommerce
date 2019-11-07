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
			echo '<div style="
      margin: 20px auto;
      width: fit-content;
      font-size: 25px;
      text-decoration: underline;
  "> carrito vacio </div>'.'<br>';
  echo '<style>footer {
    position: absolute;
    width: 100%;
    bottom: 0;
  }</style>';
		}	
	echo '<a href="prod.php" class="seguir_viendo">Seguir viendo productos</a>';
}else{
	//si no existe $_SESSION['usuario']
	echo '<div style="
  margin: 2% auto;
  width: fit-content;
  font-size: 25px;
">Debes iniciar sesion para utilizar el carrito</div>';
echo '<style>footer {
  position: absolute;
  width: 100%;
  bottom: 0;
}</style>';
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

    <!-- pushbar -->

    <?php 
      $sql2 = "SELECT * FROM usuario";
      @$exe = mysqli_query($conexion,$sql2);
      @$row2 = mysqli_fetch_assoc($exe);
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