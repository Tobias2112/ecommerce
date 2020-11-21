<?php 
// function listarProductos(){
// 	include("conexion.php");
// 	$sql="SELECT * FROM productos ORDER BY descripcion";
// 	$consulta=$conexion->query($sql) or die($consulta->error());
// 	if($consulta->num_rows>0){
// 		while($registro=$consulta->fetch_assoc()){
// 			echo '<tr>
// 				 <td>'.$registro['id_prod'].'</td>
// 				 <td>'.$registro['descripcion'].'</td>
// 				 <td>'.$registro['precio'].'</td>
// 				 <td><a href="carrito.php?id='.$registro['id_prod'].'">agregar a carrito</a></td>'; 
// 		}
// 	}
// 	$consulta->free();
// 	$conexion->close();
// }
function agregarPrimerProducto($id){
	include("conexion.php");
	$sql="SELECT * FROM comics WHERE id=".$id."";
	$resultado=$conexion->query($sql);
	while($registro=$resultado->fetch_array()){

		$Id_prod=$registro['id'];
		$img=$registro['imagen'];
        $Precio=$registro['precio'];
        $nombre=$registro['nombre'];
		$Cantidad=1; //por ser la primera vez que cargo el producto
	}
	$prods_compra[]=array('id'=>$Id_prod,'imagen'=>$img,
		'precio'=>$Precio,'nombre'=>$nombre,'cantidad'=>$Cantidad);
	//CREAMOS LA VARIABLE DE SESSION $_SESSION['carrito']
	$_SESSION['carrito']=$prods_compra;	
	$resultado->free();
	$conexion->close();
}
function mostrarProductosCarrito(){
	//a veces llamamos a la funcion y el carrito ya no existe por ejemplo porque
	// eliminamos el ultimo producto por lo cual eliminamos la variable de sesion carrito
	if(!isset($_SESSION['carrito'])){
	echo "<div> carrito vacio </div> <br>";	
	}else{
	$total=0;
	$prods_compra=$_SESSION['carrito'];
	
    echo '<br>';
        echo '<div class="shopping-cart">
        <div class="title">
          Carrito
        </div>';
	foreach ($prods_compra as  $indice => $producto) {
            echo '<div class="item">
            <div class="buttons">
            <a href="carrito.php?id_borra='.$prods_compra[$indice]['id'].'"><span class="delete-btn">  </span></a>
              <span class="like-btn"></span>
            </div>
         
            <div class="image">
              <img src="imagenes/'.$producto['imagen'].'" alt="" />
            </div>
         
            <div class="description">
              <span>'.$producto['nombre'].'</span>
            </div>

            <div class="quantity">
              <a href="carrito.php?id_resta='.$prods_compra[$indice]['id'].'" style="    text-decoration: none;
              " >
                
                <img src="imagenes/carrito/minus.svg" alt="" />
              </a>
              <input type="text" name="name" value="'.$producto['cantidad'].'" disabled>
              <a href="carrito.php?id_suma='.$prods_compra[$indice]['id'].'" >
               
                <img src="imagenes/carrito/plus.svg" alt="" />
              </a>
            </div>
         
            <div class="total-price">$'.$producto['precio'].'</div>
          </div>';
		
	echo '<br>';
	$total=$total+($prods_compra[$indice]['cantidad']*$prods_compra[$indice]['precio']);
	}
	echo '<p class="f">TOTAL: $'.$total.'</p><br><br>';
    }
    echo '</div>';
}
function buscarSiProductoExite($id){
	$prods_compra=$_SESSION['carrito'];
	$existe=0;
	foreach ($prods_compra as $indice => $producto) {
		if($producto['id']==$id){
			$existe=1;
			$prods_compra[$indice]['cantidad']++;
		}
	}
	$_SESSION['carrito']=$prods_compra;
	return $existe;		
}
function agregarNuevoProducto($id){
	$prods_compra=$_SESSION['carrito'];
	include("conexion.php");
	$sql="SELECT * FROM comics WHERE id=".$id."";
	$resultado=$conexion->query($sql);
	while($registro=$resultado->fetch_array()){
		$Id_prod=$registro['id'];
		$img=$registro['imagen'];
        $Precio=$registro['precio'];
        $nombre=$registro['nombre'];
		$Cantidad=1; //por ser la primera vez que cargo el producto
	}
	$nuevo_prod=array('id'=>$Id_prod,'imagen'=>$img,
    'precio'=>$Precio,'nombre'=>$nombre,'cantidad'=>$Cantidad);
		array_push($prods_compra, $nuevo_prod);
		$_SESSION['carrito']=$prods_compra;
	$resultado->free();
	$conexion->close();
}
function sumarCantidad($id){
	$prods_compra=$_SESSION['carrito'];
	foreach ($prods_compra as $indice => $producto) {
		if($producto['id']==$id){
			$prods_compra[$indice]['cantidad']++;
		}
	}
	$_SESSION['carrito']=$prods_compra;
}
function restarCantidad($id){
	$prods_compra=$_SESSION['carrito'];
	foreach ($prods_compra as $indice => $producto) {
		if($producto['id']==$id){
			$prods_compra[$indice]['cantidad']--;
		}
	}
	$_SESSION['carrito']=$prods_compra;
}

function eliminarProdCarrito($id){
	$prods_compra=$_SESSION['carrito'];
	foreach ($prods_compra as $indice => $producto) {
		if($producto['id']==$id){
			unset($prods_compra[$indice]);
		}
	}
	// hay que fijarse si el carrito esta vacio 
	//eliminar la variable de sesion carrito
	if(count($prods_compra)>0){
	$_SESSION['carrito']=$prods_compra;
	}else{
		unset($_SESSION['carrito']);
	}
}

function confirmarCompra(){
	$prods_compra=$_SESSION['carrito'];
    $total=0;
    echo '<p class="f" style="margin-top:5%;"> Usted esta comprando:</p>';
	foreach ($prods_compra as  $indice => $producto) {
			echo '<div class="cPadre">';
			echo '<p class="c">Nombre - '.$producto['nombre'].'</p><br>';
			echo '<p class="c">Precio - '.$producto['precio'].'</p><br>';
			echo '<p class="c">Cantidad - '.$producto['cantidad'].'</p><br>';
            echo '</div>';
		    $total=$total+($prods_compra[$indice]['cantidad']*$prods_compra[$indice]['precio']);
	}
	echo '<p class="f">TOTAL: $'.$total.'</p><br><br>';
}

function comprar(){

	include("conexion.php");
	$fecha=time();
	$usuario=$_SESSION['id_usuario'];
    echo $usuario.'<br>';
	$sql="INSERT INTO ventas (fecha, id_usuario) VALUES ('$fecha','$usuario')";
	$insert=$conexion->query($sql);
	

	$sqlc="SELECT id_venta FROM ventas ORDER BY id_venta desc LIMIT 1";
	$consulta=$conexion->query($sqlc);
	$registro=$consulta->fetch_array();
	echo $registro[0];
	$id_venta=$registro[0];

	$prods_compra=$_SESSION['carrito'];
	$total=0;
	foreach ($prods_compra as $indice => $producto) {
		$id_prod=$producto['id'];
		$precio=$producto['precio'];
		$cantidad=$producto['cantidad'];

		$sqli="INSERT INTO prodxventa (id_venta, id_prod, precio_u, cant) VALUES ('$registro[0]','$id_prod','$precio','$cantidad')";
		$insertar=$conexion->query($sqli);

		$total=$total+($prods_compra[$indice]['precio']*$prods_compra[$indice]['cantidad']);
	}
	
	$sql="UPDATE ventas SET total='$total' WHERE id_venta='$id_venta'";
    $actualizar=$conexion->query($sql);
    if($actualizar){
        echo "<script>alert('compra finalizada'); window.open('index.php','_self');</script>";
    }
	}

?>