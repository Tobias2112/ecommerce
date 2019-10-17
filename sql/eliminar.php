
<html>



<?php





include ("conexion.php");



$id = $_REQUEST['id'];



$sql = "DELETE FROM comics WHERE id='$id'";

$insertar = mysqli_query($conexion,$sql);





?>
<meta http-equiv = "refresh"  = "0; url = Add_product.php" />


</html>
