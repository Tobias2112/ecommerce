
<html>



<?php





include ("conexion.php");



$id = $_REQUEST['id'];



$sql = "DELETE FROM comics WHERE id='$id'";

$insertar = mysqli_query($conexion,$sql);


if($insertar){
    echo "<script> alert('Comic eliminado Correctamente'); 
    
    window.location = 'Add_product.php';
    
    </script>";
        
    
}


?>



</html>
