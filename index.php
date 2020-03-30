<?php 

//session_start();
require_once "assets/php/validar_sesion.php";

$_SESSION["paginaAnterior"]='index.php';

?>
<!doctype html>
<html lang="es">
<head>
  <title>Noticias</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Roboto:300,400&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/materialize.css">
	<link rel="stylesheet" href="assets/css/style.css">
  <style>
  .margin-top--sm a{
  font-size: var(--text-xs);
  }
  .DynamicLogo-small {
  width: 55%;
  opacity: 0.95;
  animation:none;
  }
  .StoreCard-logo {
  top: 20px;
  }  
  .DynamicLogo-small:hover {
      width: 55%;
      opacity: 1;
  }
  </style>
</head>
<body>
  <header class="main-header js-main-header margin-bottom--lg">
    <div class="container container--lg">
      <div class="main-header__layout">
        <div class="main-header__logo">
          <?php
          
          if(isset($_SESSION["usuario"])){  

            echo 'Hola '.$_SESSION["usuario"];

          }else{

            echo'Invitado';

          }  
          ?>
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
            <li class="main-header__nav-item"><a href="index.php" class="main-header__nav-link" aria-current="page">INICIO</li>
            <li class="main-header__nav-item"><a href="noticias.php" class="main-header__nav-link" >NOTICIAS</a></li>
            <li class="main-header__nav-item"><a href="#0" class="main-header__nav-link">STREAMING</a></li>
            <li class="main-header__nav-item"><a href="ofertas.php" class="main-header__nav-link" >OFERTAS</a></li>
            <li class="main-header__nav-item main-header__nav-divider" aria-hidden="true"></li>     
            <li class="main-header__nav-item"><a href="#0" class="main-header__nav-link  dropdown-trigger" data-target='dropdown1'>PERFIL</a></li>
 			<li class="main-header__nav-item"><a href="#0" class="main-header__nav-link  dropdown-trigger" data-target='dropdown2'>IDIOMA</a></li>
	      	<ul id='dropdown1' class='dropdown-content'>

          <?php if(isset($_SESSION["usuario"])) { ?>
                        
            <li><a href='assets/php/cerrar_sesion.php'>LogOut</a></li>
                      
          <?php } else { ?>
                      
            <li><a href='login.php'>LogIn</a></li>
            <li><a href='#!''>Sign up</a></li>
                      
          <?php } ?>
         
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
  <section class="feature margin-bottom--xl margin-top--xxl">
    <div class="feature__inner container container--adaptive">
      <div class="feature__text">
        <div>
          <div class="text-component">
            <h1>Balas, armas y juegos de palabras.</h1>
            <p>Enter the Gungeon es un juego de mazmorras con tiroteos centrado en un grupo de marginados que buscan la redención a base de disparos, saqueos, volteretas y derribos de mesas para obtener el tesoro...</p>
          </div>
          <div class="feature__mobile">   
              <div style="position: relative;">
                  <div class="StoreCard-image">
                    <div>

                      <img alt="Fortnite" class="Picture-image" src="img/EnterTheGungeon.jpg">
                    </div>
                    <div class="StoreCard-logo">
                      <div class="DynamicLogo-small ">
                      <img class="DynamicLogo-logo" src="img/ETD-Logo.png" alt="Fortnite">
                    </div>
                    </div>
                  </div>           
              </div> 
          </div>
          <small class="feature__label margin-bottom--xs">Etiqueta: Gungeon, Gaming, Price</small>
          <div class="margin-top--sm">
            <div>
              <a href="#0" class="boton btn--primario">4,99USD</a>
              <a href="#0" class="text--inherit" >Ver Mas</a>
            </div>
          </div>
        </div>
      </div>
      <div class="feature__media">   
          <div class="" style="position: relative;">
              <div class="StoreCard-image">
                <div>
                  <img alt="Fortnite" class="Picture-image" src="img/EnterTheGungeon.jpg" >
                </div>
                <div class="StoreCard-logo">
                  <div class="DynamicLogo-small ">
                  <img class="DynamicLogo-logo" src="img/ETD-Logo.png" alt="ETG">
               		 cv</div>
                </div>
              </div>           
          </div> 
     	</div>
    </div>
  </section>
  <section class="feature feature--invert">
    <div class="feature__inner container container--adaptive">
      <div class="feature__text">
        <div class="feature__text-inner">
          <div class="text-component">
            <h1>La Batalla mas intensa.</h1>
            <p>Battle Royale de Fortnite es un modo JcJ con 100 jugadores GRATUITO. Un mapa enorme. Un autobús de batalla. La pericia de construcción y los entornos destructibles de Fortnite sumados a la intensidad de los combates JcJ. El último en pie gana. Disponible en PC, PlayStation 4, Xbox One, Nintendo Switch, Android, iOS y Mac..</p>
          </div>
          <div class="feature__mobile">
              <div style="position: relative;">
                  <div class="StoreCard-image">
                    <div>
                      <img alt="Fortnite" class="Picture-image" src="img/Fortnite.jpg">
                    </div>
                    <div class="StoreCard-logo">
                      <div class="DynamicLogo-small ">
                      <img class="DynamicLogo-logo" src="img/Fortnite-Logo.png" alt="Fortnite">
                    </div>
                    </div>
                  </div>           
              </div>  
          </div>
          <small class="feature__label margin-bottom--xs">Etiqueta: Gaming,Free,Fortnite,BattleRoyale</small>
          <div class="margin-top--sm">
            <div class="">
              <a href="#0" class="boton btn--primario">Gratis</a>
              <a href="#0" class="text--inherit">Ver mas</a>
            </div>
          </div>
        </div>
      </div>
      <div class="feature__media">
          <div class="" style="position:relative;">
              <div class="StoreCard-image">
                <div>
                  <img alt="Fortnite" class="Picture-image" src="img/Fortnite.jpg">
                </div>
                <div class="StoreCard-logo">
                  <div class="DynamicLogo-small ">
                  <img class="DynamicLogo-logo" src="img/Fortnite-Logo.png" 
                  alt="Fortnite">
                </div>
                </div>
              </div>           
          </div>  
      </div>
    </div>

     </section>
<script>document.getElementsByTagName("html")[0].className += " js";</script>
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script>
$(document).on('ready', function() {
  $('.dropdown-trigger').dropdown();
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/header.js"></script>
</body></html>