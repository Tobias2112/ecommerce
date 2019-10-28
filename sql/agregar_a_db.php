
<html>



<?php





include ("conexion.php");


//$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

$imagen = $_FILES["imagen"];

//if (is_uploaded_file($_FILES['imagen']['tmp_name'])){

    //Validar el nombre del Archivo
          if(empty($_FILES['imagen']['name'])){
              echo " Nombre del archivo vacio! ";
              exit;
          }

          //$tmp_foto = $_FILES['imagen']['name'];

          $tmp_name = $_FILES["imagen"]["tmp_name"];
          $nameaux = $_FILES["imagen"]["name"];


$ext = pathinfo($nameaux, PATHINFO_EXTENSION);

            $sql = "SELECT id FROM  comics ORDER BY id DESC ";
            $consultax = mysqli_query($conexion,$sql);
            $row = mysqli_fetch_assoc($consultax);

            //listop ahora le suamos uno y a la mierda 

            $ultimoID = $row['id'] + 1;

          $name = $ultimoID.'.'.$ext;
          $uploads_dir = '../imagenes';
          move_uploaded_file($tmp_name, "$uploads_dir/$name");

        $dest="".$name;


        


//    }



$nombre = $_POST["nombre"];
$descr = $_POST["descripcion"];
$precio = $_POST["precio"];
$compania = $_POST["compania"];
$producto = $_POST["Producto"];

$sql = "INSERT INTO comics (imagen , nombre, descripcion, precio, empresa, producto) VALUES ('$dest','$nombre', '$descr' ,'$precio','$compania','$producto')";

$insertar = mysqli_query($conexion,$sql);

if($insertar){
  echo "<script> alert('Comic Agregado Correctamente'); 
  
  window.location = 'Add_product.php';
  
  </script>";
      
  
}

?>




</html>
