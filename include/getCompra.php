<?php

    include("../sql/conexion.php");


    $sql = "SELECT  v.id_venta, v.fecha, v.total, v.id_usuario, 
                    u.nbr_user, u.id_user,
                    c.id , c.nombre, c.precio,
                    p.id_venta, p.id_prod, p.precio_u, p.cant 
                    FROM ventas v
                    JOIN prodxventa p ON v.id_venta = p.id_venta
                    JOIN usuario u ON v.id_usuario = u.id_user 
                    JOIN comics c ON p.id_prod = c.id";
    
    $exe = mysqli_query($conexion,$sql);

    $id_o=0;

    if(mysqli_num_rows($exe) >  0) {
        while($row = mysqli_fetch_assoc($exe)){

?>

<tr>
<?php  if($id_o != $row['id_venta']){   ?>
    <th> <p> <?php echo $row['id_venta']; ?> </p> </th>
    <th> <p> <?php echo $row['nbr_user']; ?> </p> </th>
    <th> <p> <?php echo $row['nombre']; ?> </p> </th>
    <th> <p> <?php echo $row['cant']; ?> </p> </th>
    <?php
        if ($row['precio'] == $row['total']) {
            echo  " <th> <p> - </p> </th> " ;
        }else {
             echo  " <th> <p> $ " . $row[ 'precio' ] . " </p> </th> " ;
        }
     ?>
    <th> <p> <?php echo "$ ". $row['total']; ?> </p> </th>
    <th> <p> <?php echo date('d-m-Y',$row['fecha']); ?> </p> </th>
    
</tr>   

<?php $id_o++; 
}
else
{ ?>
<th><p>  </p> </th>
<th><p>  </p> </th>

<th><p> <?php echo $row['nombre'];?> </p> </th>
<th><p> <?php echo $row['cant'];?> </p> </th>
<th><p> $ <?php echo $row['precio']?> </p> </th>

<th><p>  </p></th>
<th><p>  </p></th>


<?php } ?>
</tr>

<?php }}
else {
    echo "error";
} ?>