<?php 

require '../conexion.php';

session_start();

$mail = $_POST['email_login'];
$pass = md5($_POST['pass_login']); //aca estas encriptando la pass y consultando por el email y la pass encriptada pero en la base no la tenes encriptada jajajaja mm creo q lo cambie desde el colegio pero no me acuerdo cuando porq aca seguramente lo debo tener bien

$sql = "SELECT COUNT(*) as contar FROM usuario WHERE email ='".$mail."' AND contrasenia ='".$pass."'";

$consulta = mysqli_query($conexion,$sql);

$arrayAlgo = mysqli_fetch_assoc($consulta);

//aca hay dos problemas 
// primero que array es una palabra reservada ... no se puede usar como nombre de variable, por mas que te la toma bien a veces.
//podrias poner $arrayAlgo pero $array solo mejor no ponerlo okey
//el otro problema es que 'contar' no creo que exista pero tengo dudas es el COUNT() le asigno ese nombre nada masah si si ahi vi que lo pusiste como un as contar arriba muy bien

//pero de todas maneras

//vamos a tirar un print r aca a ver que trae subirlo al server y correlo


if($arrayAlgo['contar'] > 0){
    $_SESSION['nueva'] = $mail;
    $ultima = time();
    $update = "UPDATE usuario SET ultima_conexion='".$ultima."' WHERE email='".$_SESSION['nueva']."'";
    $update_sq = mysqli_query($conexion,$update);
    // echo '<pre>';
    // print_r($_SESSION);//subi esto y refresh bien ahi
    // echo '</pre>';

//esta bien concatenado en el update? si eso no importa en realidad .. fijate si hizo el update con el email bien  graba y subi y probemos


    //  exit;


    header ("location: ../../index.php");
}else{
    header ("location: ../../index.php?error=Datos Incorrectos#open-modal");
}



?>