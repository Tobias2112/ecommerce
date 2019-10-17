<?php 

require '../conexion.php';

session_start();

$mail = $_POST['email_login'];
$pass = md5($_POST['pass_login']); 

$sql = "SELECT COUNT(*) as contar FROM usuario WHERE email ='".$mail."' AND contrasenia ='".$pass."'";

$consulta = mysqli_query($conexion,$sql);

$arrayAlgo = mysqli_fetch_assoc($consulta);



if($arrayAlgo['contar'] > 0){
    $_SESSION['nueva'] = $mail;
    $ultima = time();
    $update = "UPDATE usuario SET ultima_conexion='".$ultima."' WHERE email='".$_SESSION['nueva']."'";
    $update_sq = mysqli_query($conexion,$update);

    header ("location: ../../index.php");
}else{
    header ("location: ../../index.php?error=Datos Incorrectos#open-modal");
}



?>