<?php

$id_heroe = $_REQUEST['id'];
include("conexion.php");

$eliminar = "DELETE FROM heroes WHERE id_heroe='$id_heroe'";

$eliminarEjecuta = mysqli_query($conexion, $eliminar);

if($eliminarEjecuta){
    echo "<script> alert('Heroe eliminado Correctamente'); 
    
    window.location = 'Add_product.php';
    
    </script>";
        
    
}
?>