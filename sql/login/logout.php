<?php

require '../conexion.php';
session_start();
session_unset();
session_destroy();
ob_start();
unset($_SESSION["mail"]);
header ("location: ../../index.php");
ob_end_flush(); 
exit();



?>