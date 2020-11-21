<?php
require("sql/conexion.php");
if(isset($_REQUEST["term"])){
    // Prepare a select statement
    $sql = "SELECT id, nombre FROM comics WHERE nombre LIKE ?";
    
    if($stmt = mysqli_prepare($conexion, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_term);
        
        // Set parameters
        $param_term = '%'. $_REQUEST["term"] . '%';
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo '<a href="producto.php?comic='.$row['id'].'">' . $row["nombre"] .'</a>';
                }
            } else{
                echo "<a>No se encontraron coincidencias</a>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conexion);
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
}
 
// close connection
mysqli_close($conexion);
?>