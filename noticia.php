<?php 

session_start();

//include 'assets/php/conexion.php';

require_once "assets/php/validar_sesion.php";

$_SESSION["paginaAnterior"]='noticia.php';

?>
<!DOCTYPE html>
<html class="js" lang="es">
<head>
  <title></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="img/favicon.png">
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
          <?= isset($_SESSION["usuario"]) ? 'Hola '.$_SESSION["usuario"] : 'Invitado' ?>
        </div>
        <button class="btn--subtle main-header__nav-trigger js-main-header__nav-trigger" aria-label="Toggle menu" aria-expanded="false" aria-controls="main-header-nav">
          <i class="main-header__nav-trigger-icon" aria-hidden="true"></i>
          <span></span>
        </button>
        <nav class="main-header__nav js-main-header__nav" id="main-header-nav" aria-labelledby="main-header-nav-label" role="navigation">
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

            <?php if(isset($_SESSION["usuario"])) : ?>
                        
            <li><a href='assets/php/cerrar_sesion.php'>Cerrar Sesion</a></li>
          
            <?php else :?>
          
            <li><a href='Ingresar.php'>Iniciar Sesion</a></li>
            <li><a href='Ingresar.php?Registrar=true'>Registrarme</a></li>
          
            <?php endif;?>
         
            <li class="divider" tabindex="-1"></li>
            <li class="main-header__nav-item" style="margin:0; padding: 14px 16px;">
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
      <div class="col s12 m12 l12 xl9" style="background-color:var(--color-contrast-lowerest);margin-top: 4rem; padding:0%;">
        <div class="container container--adaptive">
        <?php

        if(isset($_REQUEST['idNoticia'])){

          $idNoticia= $_REQUEST['idNoticia'];
            
        }else{
      
          $idNoticia=0;
      
        }  

        $_SESSION["paginaAnterior"].='?idNoticia='.$idNoticia;

        include 'assets/php/conexion.php';

        $consultaNoticia="SELECT N.*, U.usuario FROM noticias AS N INNER JOIN usuarios AS U ON N.id_usuario=U.id_usuario WHERE id_noticia='$idNoticia'";
      
        $resultado = $conexion -> query($consultaNoticia); 

        if ($resultado -> num_rows == 0) : ?>
      
          <h1 class="center-align">No&nbsp;se&nbsp;encontr&oacute;&nbsp;la&nbsp;noticia</h1>
          
        <?php else:
          
          $noticia = $resultado -> fetch_array();

        ?> 

          <h1><?= $noticia['titulo'] ?> </h1>
          <h4><?= $noticia['subtitulo'] ?></h4>
          <small class="feature__label margin-bottom--xs">Por&nbsp;<?= $noticia['usuario']?>&nbsp;-&nbsp;<?=(new DateTime($noticia['fecha']))->format('d/m/Y H:i') ?></small>
          <div><img src="data:image/jpg;base64,<?= $noticia['imagen']?>"></div>
          <p><?= $noticia['cuerpo'] ?></p>
          <small class="feature__label margin-bottom--xs">Etiquetas:&nbsp;<?= $noticia['etiquetas'] ?></small>

        <?php endif;

        $resultado -> close();

        ?>
        </div>      
      </div>
      <div class="col s12 m12 l12 xl3" style="margin-top: 3rem;">
        <div class="row">
      <?php

      $consultaNoticiasLaterales="SELECT imagen, cuerpo, id_noticia FROM noticias WHERE id_noticia!='$idNoticia' ORDER BY Rand() LIMIT 2";
   
      $resultado = $conexion -> query($consultaNoticiasLaterales); 

      if ($resultado-> num_rows == 0) : ?>
  
        <div class="card blue-grey darken-2">
          <div class="card-content">
            <p class="center-align">No&nbsp;se&nbsp;encontraron&nbsp;noticias</p>
          </div>
        </div>
      
      <?php else:

        while ($noticiaLateral = $resultado -> fetch_array()) : ?> 

          <div class="col s12 m6 l16 xl12">
            <a href="noticia.php?idNoticia=<?= $noticiaLateral['id_noticia'] ?>">
              <div class="card blue-grey darken-2">
                <div class="card-image">
                  <img src="data:image/jpg;base64,<?= $noticiaLateral['imagen'] ?>">
                </div>
                <div class="card-content">
                  <p><?= mb_substr($noticiaLateral['cuerpo'],0,200,'HTML-ENTITIES'); ?>...</p>
                </div>
              </div>
            </a>
          </div>

        <?php
        
        endwhile;

      endif;

      $resultado -> close();

      ?>
        </div>
      </div>
    </div>
  </div>
  <script src="assets/js/jquery-2.2.0.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="assets/js/util.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/header.js"></script>
  <script>
    $(document).on('ready', function() {
      $('.dropdown-trigger').dropdown();
      this.title = "<?= html_entity_decode($noticia['titulo']) ?>";
    });
  </script>
  
</body>
</html>