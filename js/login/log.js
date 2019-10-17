var acount = document.getElementById("pass");

var login = document.getElementById("login");
var register = document.getElementById("register");

var cont_reg = document.getElementById("reg_inp");
var cont_log = document.getElementById("log_inp");

function mostrarLogin() {
  login.style.background = "#085C32";
  register.style.background = "gray";

  cont_reg.style.display = "none";
  cont_log.style.display = "block";
}

function mostrarRegister() {
  register.style.background = "#085C32";
  login.style.background = "gray";

  cont_reg.style.display = "block";
  cont_log.style.display = "none";
}
