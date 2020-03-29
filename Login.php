
<?php

session_start();

if(isset($_SESSION["usuario"])){

	header("Location: index.php");

  exit();

}

?>

<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Roboto:300,400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/materialize.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Log In</title>
 
</head><body>
  <header class="main-header js-main-header margin-bottom--lg">
    <div class="container container--lg">
      <div class="main-header__layout">
        <div class="main-header__logo">
          <a href="index.php">
            <svg width="130" height="32" viewBox="0 0 130 32"><title>Inicio</title><circle  fill="var(--color-contrast-lower)" cx="16" cy="16" r="16"/></svg>
          </a>
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
            <li class="main-header__nav-item" style="margin:0;padding-top: 9px;padding-left: 6px;"> 
                <div class="switch" >
                  <input class="switch__input" type="checkbox" id="themeSwitch">
                  <label aria-hidden="true" class="switch__label" for="themeSwitch">On</label>
                  <div aria-hidden="true" class="switch__marker"></div>
                </div>
              </li>
           <li><a href="#!">FAQ</a></li>
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
  <div class="card2 margin-top--xxl">

    <form action="assets/php/iniciar_sesion.php" method="post" class="form">

      <div class="login-pic js-tilt" data-tilt>
        <img src="img/img-01.png" alt="IMG">
      </div>
          <div class="margin-top--lg"> Usuario:<br></div>
          <input class="input1 margin-bottom--xs margin-top--xs " type="text" name="usuario" value="" required/>
          <br>
          <div class="pass"> Contraseña:<br> </div>
          <input class= " input1 margin-bottom--xs  margin-top--xs " type="password" name="contrasena" value="" required/>

          <?php 
          
          if(isset($_SESSION['error'])){

            echo ($_SESSION['error']);
            
            unset($_SESSION["error"]);

          }

          if(isset($_REQUEST['paginaAnterior'])){

            $paginaAnterior = $_REQUEST['paginaAnterior'];
            
          }else{
      
            $paginaAnterior = 'index.php';
      
          }

          echo "<input type='hidden' name='paginaAnterior' value='".$paginaAnterior."'/>";

          ?>

      <input type="submit" value="Ingresar" class="submit-btn margin-top--lg boton btn--primario" style="" />

    </form>

  </div>
</section>
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script>
$(document).on('ready', function() {
  $('.dropdown-trigger').dropdown();
});
</script>
<script>document.getElementsByTagName("html")[0].className += " js";</script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/header.js"></script>
<script src="assets/js/tilt.jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script>
  $("form").validate();
</script>

<script>
jQuery.extend(jQuery.validator.messages, {
required: "Campo obligatorio.",
email: "Por favor ingrese un e-mail valido",
});

</script>

 <script >
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>
  <script>
   
  </script>
</body></html>