
<html>



<?php





include ("conexion.php");

$id = $_REQUEST['id'];




if(empty($_FILES['imagen']['name'])){




$sql = "UPDATE comics SET nombre='$nombre', precio='$precio', empresa='$compania', producto='$producto'  WHERE id='$id'";


}else{
//aca el tipo si quiere cambiar la imagen y subio una nueva en teoria
$tmp_name = $_FILES["imagen"]["tmp_name"];
$nameaux = $_FILES["imagen"]["name"];


$ext = pathinfo($nameaux, PATHINFO_EXTENSION); 

$name = $id.'.'.$ext;
$uploads_dir = '../imagenes';
move_uploaded_file($tmp_name, "$uploads_dir/$name");  
$dest="".$name;



$imagen - $id.'.'.$ext; // esta bien no?

$sql = "UPDATE comics SET nombre='$nombre', precio='$precio', empresa='$compania', producto='$producto', imagen='$dest' WHERE id='$id'";

}

//$tmp_foto = $_FILES['imagen']['name'];

$nombre = $_POST["nombre"];
$precio = $_POST["precio"];
$compania = $_POST["compania"];
$producto = $_POST["Producto"];


$insertar = mysqli_query($conexion,$sql);

?>

<meta http-equiv = "refresh" content = "0; url = Add_product.php" />


</html>

