
<html>



<?php





include ("conexion.php");


//$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

$imagen = $_FILES["imagen"];

if (is_uploaded_file($_FILES['imagen']['tmp_name'])){

    //Validar el nombre del Archivo
          if(empty($_FILES['imagen']['name'])){
              echo " Nombre del archivo vacio! ";
              exit;
          }

          $tmp_foto = $_FILES['imagen']['name'];

          //Guardar archivo
        $dest="".$tmp_foto;
    }



$nombre = $_POST["nombre"];
$compania = $_POST["compania"];


$sql = "INSERT INTO heroes (nombre, imagen, compania) VALUES ('$nombre', '$dest', '$compania')";

$insertar = mysqli_query($conexion,$sql);

?>

<meta http-equiv = "refresh" content = "0; url = Add_product.php" />


</html>
