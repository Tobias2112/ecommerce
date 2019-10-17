<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Modificar Comic</title>
	<link rel="stylesheet" href="est.css" type="text/css"/>

</head>
<body>



<header>
<h1>Modificar Producto</h1>
</header>





<?php

$id = $_REQUEST['id'];

include("conexion.php");

$sql = "SELECT * FROM comics WHERE id='$id'";

$mostrar = mysqli_query($conexion,$sql);

$row = mysqli_fetch_assoc($mostrar);

?>



<form action="proceso_modificar.php?id=<?php echo $row['id'];?>" method="POST" enctype="multipart/form-data"><br>

		<label for="nombre">Nombre:</label><br>
	<input type="text" placeholder="Nombre" name="nombre" value="<?php echo $row['nombre']; ?>">
		<br><br>
		<label for="precio">Precio:</label><br>
	<input type="text" placeholder="Precio" name="precio" value="<?php echo $row['precio']; ?>" >
		<br><br>
		<label for="compania">Compañia:</label><br>
	<select name="compania" id="compania" value="<?php echo $row['empresa']; ?>">

		<option value="Marvel">Marvel</option>
		<option value="DC">DC</option>

	</select><br><br>

		<label for="Producto">Tipo De Producto</label><br>
		<select name="Producto" id="compania" value="<?php echo $row['producto']; ?>">

			<option value="Comic">Comic</option>
			<option value="Pelicula">Pelicula</option>
			<option value="Poster">Poster</option>
			<option value="Muñeco">Muñeco</option>

		</select>

		<br><br>
		<div id="div_file">
		<i class="fas fa-upload"></i>
			<p id="texto">Select File</p>
		<input type="file" name="imagen" id="btn_enviar" required><br><br>
		</div>
		<input type="submit" value="enviar" name="enviar" class="enviar" ><br><br>



<?php 

if($row['imagen']){

echo 'imagen actual : <br> <img src="../imagenes/'.$row['imagen'].'">';


}


?>




</form>
