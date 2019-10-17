
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Agregar Comic</title>
	<link rel="stylesheet" href="est.css" type="text/css"/>
	<link rel="stylesheet" href="fonts/style.css" type="text/css"/>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>



<header>
<h1>Agregar Producto</h1>
</header>






<div class="cont_form">

<form action="agregar_a_db.php" method="POST" enctype="multipart/form-data"><br>



		<label for="nombre">Nombre:</label><br>
	<input type="text" placeholder="Nombre" name="nombre" required>
		<br><br>
		<label for="precio">Descripcion:</label><br>
		<textarea name="descripcion" id="desc" cols="30" rows="10"></textarea>
	<!-- <input type="text" placeholder="Descripcion producto" name="descripcion" required> -->
		<br><br>
		<label for="precio">Precio:</label><br>
	<input type="text" placeholder="Precio" name="precio" required>
		<br><br>
		<label for="compania">Compañia:</label><br>
	<select name="compania" id="compania">

		<option value="Marvel">Marvel</option>
		<option value="DC">DC</option>

	</select><br><br>

		<label for="Producto">Tipo De Producto</label><br>
		<select name="Producto" id="compania">

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
		<input type="submit" value="enviar" name="enviar" class="enviar"><br><br>

</form>


<form action="agregar_heroes.php" class="heores"  method="POST" enctype="multipart/form-data"><br>

	<center><h1>Heroes</h1></center>

		<label for="nombre">Nombre:</label><br>
	<input type="text" placeholder="Nombre" name="nombre" required>
		<br><br>
		<label for="compania">Compañia:</label><br>
	<select name="compania" id="compania">

		<option value="Marvel">Marvel</option>
		<option value="DC">DC</option>

	</select><br><br>

		<div id="div_file">
		<i class="fas fa-upload"></i>
			<p id="texto">Select File</p>
		<input type="file" name="imagen" id="btn_enviar" required><br><br>
		</div>
		<input type="submit" value="enviar" name="enviar" class="enviar"><br><br>

</form>
</div>

<center> <h1 class="tt">Editar o Borrar // <button class="hero" id="hero" onclick="mostrarHeroes()" >Heroes</button> <button class="comics" id="comics" onclick="mostrarComics()">Comics</button>  </h1><br></center>
<div class="cont_comic" id="cont_comic">
<?php

include("conexion.php");

$sql = "SELECT * FROM comics";

$mostrar = mysqli_query($conexion,$sql);


while($row = mysqli_fetch_assoc($mostrar)){
	?>




<div class="comic">

<img src="../imagenes/<?php echo $row['imagen']; ?>">
<p><u>   Nombre:</u></p>
<p  id="nombre"> <?php echo $row['nombre']; ?> </p>
<p><u>Precio:</u></p>
<p><?php echo $row['precio']; ?></p>
<p><u>Compañia:</u></p>
<p><?php echo $row['empresa']; ?></p>
<p><u>Tipo Producto:</u></p>
<p><?php echo $row['producto']; ?></p><br>



<a href="modificar.php?id=<?php echo $row['id'];?>">   <span class="icon-pencil"></span>  </a>
<a href="eliminar.php?id=<?php echo $row['id'];?>">    <span class="icon-bin"></span>  </a>

</div>


<?php
}

?>
</div>

<!-- HEORES -->

<div class="cont_comic" id="cont_hero">
<?php

include("conexion.php");

$sql = "SELECT * FROM heroes";

$mostrar = mysqli_query($conexion,$sql);


while($row = mysqli_fetch_assoc($mostrar)){
	?>




<div class="comic">

<img src="../imagenes/heroes/<?php echo $row['imagen']; ?>">
<p><u>Nombre:</u></p>
<p  id="nombre"> <?php echo $row['nombre']; ?> </p>
<p><u>Compañia:</u></p>
<p><?php echo $row['compania']; ?></p>



<a href="modificar.php?id=<?php echo $row['id'];?>">   <span class="icon-pencil"></span>  </a>
<a href="eliminar.php?id=<?php echo $row['id'];?>">    <span class="icon-bin"></span>  </a>

</div>


<?php
}

?>
</div>


<script src="main.js"></script>

</body>
</html>
