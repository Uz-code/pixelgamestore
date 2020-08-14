<?php

session_start();

if(isset($_SESSION["usuario"])){

	header("Location: ".$_SESSION["paginaAnterior"]);

  //exit();

}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="img/favicon.png">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Roboto:300,400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/materialize.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/login.css">
  <title>Log In</title>
</head>
<body>
  <div id="loadingImg">
    <img  src="img/cargando.gif" alt="Funny image">
  </div>
  <header class="main-header js-main-header margin-bottom--lg">
    <div class="container container--lg">
      <div class="main-header__layout">
        <div class="main-header__logo">
        </div>
        <button class="btn--subtle main-header__nav-trigger js-main-header__nav-trigger" aria-label="Toggle menu" aria-expanded="false" aria-controls="main-header-nav">
          <i class="main-header__nav-trigger-icon" aria-hidden="true"></i>
          <span></span>
        </button>
        <nav class="main-header__nav js-main-header__nav" id="main-header-nav" aria-labelledby="main-header-nav-label" role="navigation">
          <div id="main-header-nav-label" class="main-header__nav-label">Main menu</div>
          <ul class="main-header__nav-list">
            <li>
              <div class="buscar-caja">
                <input type="text" name="" class="buscar-txt" placeholder="Buscar..."/>
                <a class="buscar-btn">
                  <i class="large material-icons">search</i>
                </a>
              </div>
            </li>
            <li class="main-header__nav-item"><a href="index.php" class="main-header__nav-link">INICIO</li>
            <li class="main-header__nav-item"><a href="noticias.php" class="main-header__nav-link" >NOTICIAS</a></li>
            <li class="main-header__nav-item"><a href="#0" class="main-header__nav-link">STREAMING</a></li>
            <li class="main-header__nav-item"><a href="ofertas.php" class="main-header__nav-link" >OFERTAS</a></li>
            <li class="main-header__nav-item main-header__nav-divider" aria-hidden="true"></li>
            <li class="main-header__nav-item"><a href="#0" class="main-header__nav-link  dropdown-trigger" data-target='dropdown1'  aria-current="page">PERFIL</a></li>
            <li class="main-header__nav-item"><a href="#0" class="main-header__nav-link  dropdown-trigger" data-target='dropdown2'>IDIOMA</a></li>
            <ul id='dropdown1' class='dropdown-content'>
              <li><a href="#!">Sign up</a></li>
              <li class="divider" tabindex="-1"></li>
              <li class="main-header__nav-item margin-bottom" style="margin:0;padding-top: 9px;padding-left: 6px;">
                <div class="switch" >
                  <input class="switch__input" type="checkbox" id="themeSwitch">
                  <label aria-hidden="true" class="switch__label" for="themeSwitch">On</label>
                  <div aria-hidden="true" class="switch__marker"></div>
                </div>
              </li>
            </ul>
            <ul id='dropdown2' class='dropdown-content'>
              <li class="" data-lang="ar"><a href="" data-index="0" >
                <span>العربية</span></a>
              </li>
              <li class="" data-lang="de"><a href="" data-index="1" >
                <span>Deutsch</span></a>
              </li>
              <li class="" data-lang="en-US"><a href="" data-index="2" >
                <span>English</span></a>
              </li>
              <li class="" data-lang="es-MX"><a href="" data-index="4" >
                <span>Español (LA)</span></a>
              </li>
              <li class="" data-lang="fr"><a href="" data-index="5" >
                <span>Français</span></a>
              </li>
              <li class="" data-lang="it"><a href="" data-index="6" >
                <span>Italiano</span></a>
              </li>
              <li class="" data-lang="ja"><a href="" data-index="7" >
                <span>日本語</span></a>
              </li>
              <li class="" data-lang="ko"><a href="" data-index="8" >
                <span>한국어</span></a>
              </li>
              <li class="" data-lang="pl"><a href="" data-index="9" >
                <span>Polski</span></a>
              </li>
              <li class="" data-lang="pt-BR"><a href="" data-index="10" >
                <span>Português (Brasil)</span></a>
              </li>
              <li class="" data-lang="ru"><a href="" data-index="11" >
                <span>Русский</span></a>
              </li>
              <li class="" data-lang="tr"><a href="" data-index="12" >
                <span>Türkçe</span></a>
              </li>
              <li class="" data-lang="zh-CN"><a href="" data-index="13" >
                <span>简体中文</span></a>
              </li>
            </ul>
          </ul>
        </nav>
      </div>
    </div>
  </header> <!-- termina header -->
	<section class="feature margin-bottom--xl margin-top--xxl ">
    <div class="containerLog" id="containerLog">
      <div class="form-containerLog sign-up-containerLog">

        <form id="formSignUp">
          <h1>Crear Cuenta</h1>
          <div class="social-containerLog">
            <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
            <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
          </div>
          <span class="dark">O use su email para registrarse</span>
          <div class="margin-bottom--xs">
            <input  type="text" placeholder="Usuario" name="usuario" id="usuario1" required/>
            <input type="email" placeholder="Email" name="email" id="email1" required/>
            <input type="password" placeholder="Contraseña" name="contrasena" id="contrasena1" required/>
          </div>
          <button type="submit" name="action">Sign Up</button>
        </form>
        
      </div>
      <div class="form-containerLog sign-in-containerLog" style>

        <form id="formLogin">
          <h1>Ingresar</h1>
          <div class="social-containerLog">
            <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
            <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
          </div>
          <span class="dark">o use su cuenta</span>
          <input type="text" placeholder="Usuario"  name="usuario" id="usuario" required/>
          <input type="password" placeholder="Contraseña" name="contrasena" id="contrasena" required/>
          <label>
            <input type="checkbox" checked="checked" id="recordar"/>
            <span>Recordarme</span>
          </label>
          <a href="#">Olvidaste tu contraseña?</a>
          <button id="btnLogin" type="submit">Log in</button>

        </form>
        
      </div>
      <div class="overlay-containerLog">
        <div class="overlay">
          <div class="overlay-panel overlay-left">
            <h1 class="ghost">Bienvenido!</h1>
            <p>Para mantenerse en contacto por favor ingrese con su informacion personal</p>
            <button class="ghost" id="signIn">Log in</button>
          </div>
          <div class="overlay-panel overlay-right">
            <h1 class="ghost">Registrate!</h1>
            <p>Entra tus datos personales para comenzar con nosotros</p>
            <button class="ghost" id="signUp" >Sign Up</button>
          </div>
        </div>
      </div>
    </div>

    <footer>
    <p>
    Contactese con
    <a target="_blank" href="https://florin-pop.com">Emmanuel</a> y
    <a target="_blank" href="https://florin-pop.com">Alejandro</a>
    Por cualquier inconveniente
    <a target="_blank" href="">Aquí</a>.
    </p>
    </footer>
  </section>
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="assets/js/tilt.jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/header.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script type="text/javascript">

  $(document).on('ready', function() {
    $('.dropdown-trigger').dropdown();

    $('#formLogin').submit(function(e) {

      $("#loadingImg").show()
      $('body').css('overflow', 'hidden');
      
      e.preventDefault();
      $.ajax({
        type: "POST",
        url: 'assets/php/iniciar_sesion.php',
        data: {
          usuario: $("#usuario").val(),
          contrasena : $("#contrasena").val(),
          recordar: $("#recordar").prop('checked')
        },
          success: function(response){
            //console.log(response);
            var jsonData = JSON.parse(response);
            if (jsonData.status.code == "1"){
              
              //alert('LogIn OK');
              location.reload();
              //window.history.back();
            }else{
              alert(jsonData.status.description);
              $("#loadingImg").hide();
              $('body').css('overflow', 'auto');
            }
          },
          error: function() {
            alert('Servidor no disponible');
            $("#loadingImg").hide();
            $('body').css('overflow', 'auto');
          },
      });
    });

    $('#formSignUp').submit(function(e) {
      e.preventDefault();

      $("#loadingImg").show()
      $('body').css('overflow', 'hidden');

      $.ajax({
        type: "POST",
        url: 'assets/php/registrar_usuario.php',
        data: {
          usuario: $("#usuario1").val(),
          contrasena : $("#contrasena1").val(),
          email: $("#email1").val()
        },
          success: function(response){
            //console.log(response);
            var jsonData = JSON.parse(response);
            if (jsonData.status.code == "1"){

              alert('LogIn OK');
              location.reload();
              //window.history.back();
            }else{
              
              alert(jsonData.status.description)
              $("#loadingImg").hide();
              $('body').css('overflow', 'auto');

            }
            
          },
          error: function() {
            alert('Servidor no disponible');
            $("#loadingImg").hide();
            $('body').css('overflow', 'auto');
          }
      });
    });

  });

	const signUpButton = document.getElementById('signUp');
	const signInButton = document.getElementById('signIn');
	const containerLog = document.getElementById('containerLog');

	signUpButton.addEventListener('click', () => {
		containerLog.classList.add("right-panel-active");
	});

	signInButton.addEventListener('click', () => {
		containerLog.classList.remove("right-panel-active");
	});

  $("#formLogin").validate();
	$("#formSignUp").validate();

  jQuery.extend(jQuery.validator.messages, {
  required: "Campo obligatorio.",
  email: "Por favor ingrese un email valido.",
  });

  $('.js-tilt').tilt({
    scale: 1.1
  })

  document.getElementsByTagName("html")[0].className += " js";

</script>

</body>
</html>
