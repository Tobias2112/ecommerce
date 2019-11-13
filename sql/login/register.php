<?php 

include ("../conexion.php");

  

$mesage = '';
if(!empty($_POST['nombre']) && !empty($_POST['mail']) && !empty($_POST['contra'] && !empty($_POST['conf_contra'])  )){
  
  $nombre = $_POST['nombre'];
  $email = $_POST['mail'];
  $password = md5($_POST['contra']);
  $mail_cod = md5($_POST['mail']);

  $fecha_registro = time();


  // Verifico que no este registrado

  $count_mail = "SELECT COUNT(*) as cont FROM usuario WHERE email ='".$email."'";

  $mail_sql = mysqli_query($conexion,$count_mail);
  
  $array = mysqli_fetch_assoc($mail_sql);
  
  if($array['cont'] > 0){
      header ("location: ../../index.php?mesage=Usted ya esta registrado#open-modal");
  }elseif ($_POST['contra'] == $_POST['conf_contra']) {

      

    $codigo = $password.$mail_cod;

    
      $sql = "INSERT INTO usuario (nbr_user, email, contrasenia, verificacion, codigo, fecha_registro, ultima_conexion) VALUES ('$nombre', '$email', '$password','no verificado', '$codigo','  $fecha_registro', '$fecha_registro')";
      $insertar = mysqli_query($conexion,$sql); 


      $para = $email;
      $tema = 'Confirmar cuenta';
      $mensaje = 'Acaba de registrarse en'." <a href='#'>Atomic Comic</a><br> ".'Porfavor Haga la confirmacion de cuenta ingresando en este enlace'." <a href='sql/login/confimacion.php?cod=$codigo'>Confirmacion</a> ";
      $cabecera = "MIME-Version: 1.0\r\n";
      $cabecera = "Content-type: text/html; charset=iso-8859-1\r\n";
      $cabecera = 'De : Atomicomic@gmail.com'."\r\n".
                  'Para :'.$email."\r\n";
      mail($para, $tema, $mensaje, $cabecera);

      if($insertar){
        header ('location: ../../index.php?mesage=Registro completo#open-modal');
      }else {
        header ('location: ../../index.php?mesage=Error en el registro#open-modal');
      }

}elseif($_POST['contra'] != $_POST['conf_contra']){
  header ('location: ../../index.php?mesage=Las Contraseñas no coinciden#open-modal');
}
 
  

}


?>
