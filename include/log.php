

<!-- Login -->
<div id="pass" class="login">
  <div class="log_content">
    <div class="btn_content">
      <button type="button" id="login" class="login" onclick="mostrarLogin()" name="button">
        Iniciar sesion
      </button>
      <button type="button" id="register" class="register" onclick="mostrarRegister()" name="button">
        Registrarse
      </button>
    </div>

    <div class="register_input animacion" id="reg_inp">
    <?php 
      if(isset($_REQUEST['mesage'])){
        $mesage = $_REQUEST['mesage'];
        echo '<p id="mensage">'.$mesage.'</p>';
      }
      
      ?>
      <form action="./sql/login/register.php" method="POST" name='registro'>
        <input type="text" name="nombre" value="" placeholder="Full Name" />
        <input type="email" name="mail" value="" placeholder="Email" />
        <input type="password" name="contra" value="" placeholder="Password" />
        <input type="password" name="conf_contra" value="" placeholder="Confirm Password"/>
        <input type="submit" id="submit" name="button" value="Continuar">
      </form>
    </div>
    <div id="log_inp" class="register_input animacion">
    <?php 

      if(isset($_REQUEST['error'])){
        $mesage = $_REQUEST['error'];
        echo '<p id="mensage">'.$mesage.'</p>';
      }
      
      ?>
          <form action="./sql/login/sign-up.php" method="POST">
          <input type="email" name="email_login" value="" placeholder="Email">
          <input type="password" name="pass_login" value="" placeholder="Contraseña">
          <input type="submit" id="submit" name="button" value="Continuar">
          </form>
        </div>

       
  </div>
</div>
