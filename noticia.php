<?php 

session_start();

include 'assets/php/conexion.php';

require_once "assets/php/validar_sesion.php";

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Noticia</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Roboto:300,400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/materialize.css">
  <link rel="stylesheet" href="assets/css/style.css">

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
          <li class="main-header__nav-item"><a href="index.php" class="main-header__nav-link" >INICIO</li>
          <li class="main-header__nav-item"><a href="noticias.php" class="main-header__nav-link">NOTICIAS</a></li>
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
  <div class="container" style="width: 90%; margin-top:3%">
    <div class="row">
      <div class="col s12 m8 l9" style="background-color:var(--color-contrast-lowerest);margin-top: 4rem; padding:35px; padding-top:0px;">
      <?php

        if(isset($_REQUEST['idNoticia'])){

          $idNoticia= $_REQUEST['idNoticia'];

          
        }else{
    
          $idNoticia=0;
    
        }  

      $_SESSION["paginaAnterior"]='noticia.php?idNoticia='.$idNoticia;

      $consultaNoticia="SELECT N.*, U.usuario FROM noticias AS N INNER JOIN usuarios AS U ON N.id_usuario=U.id_usuario WHERE id_noticia='$idNoticia'";
   
      $resultado = $conexion -> query($consultaNoticia); 

      if ($resultado -> num_rows == 0) {
	
        echo'<div class="container container--adaptive">';
        echo'<h1 class="center-align"> No se encontró la noticia </h1>';
        echo'</div>';
      
      }else{

        $noticia = $resultado -> fetch_array();

        echo'<h1>'.$noticia['titulo'].'</h1>';
        echo'<h4>'.$noticia['subtitulo'].'</h4>';
        echo'<h6>Por '.$noticia['usuario'].' - '.(new DateTime($noticia['fecha']))->format('d/m/Y H:m:s').'</h6>';
        echo'<div><img src="data:image/jpg;base64,'.$noticia['imagen'].'"></div>';
        echo'<p>'.$noticia['cuerpo'].'</p>';
        echo'<small class="feature__label margin-bottom--xs">Etiquetas: '.$noticia['etiquetas'].'</small>';
      }

      $resultado -> close();

      ?>
        
      </div>
      <div class="col s12 m4 l3" style="margin-top: 3rem;">

      <?php

       $consultaNoticiasLaterales="SELECT imagen, cuerpo, id_noticia FROM noticias WHERE id_noticia!='$idNoticia' ORDER BY Rand() LIMIT 2";
   
       $resultado = $conexion -> query($consultaNoticiasLaterales); 

       if ($resultado -> num_rows == 0) {
	
        echo 'No se encontró la noticia';
      
      }else{

        while ($noticiaLateral = $resultado -> fetch_array()){

          echo'<a href="noticia.php?idNoticia='.$noticiaLateral['id_noticia'].'">';
            echo'<div class="card blue-grey darken-2">';
              echo'<div class="card-image">';
                echo'<img src="data:image/jpg;base64,'.$noticiaLateral['imagen'].'">';
              echo'</div>';
              echo'<div class="card-content">';
                echo'<p>'.substr($noticiaLateral['cuerpo'],0,202).'...</p>';
              echo'</div>';
            echo'</div>';
          echo'</a>';
    
        }
      }

      $resultado -> close();

      ?>
      </div>
    </div>
  </div>
  <script>document.getElementsByTagName("html")[0].className += "js";</script>
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
</body>
</html>