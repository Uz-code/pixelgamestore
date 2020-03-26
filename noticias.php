<?php 

session_start();

?>
<!DOCTYPE html>
<html class="js" lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Roboto:300,400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/materialize.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="assets/css/modal.css">
  <title>Noticias</title>

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
        <button class="btn--subtle main-header__nav-trigger js-main-header__nav-trigger" aria-label="Toggle menu"
          aria-expanded="false" aria-controls="main-header-nav">
          <i class="main-header__nav-trigger-icon" aria-hidden="true"></i>
          <span></span>
        </button>
        <nav class="main-header__nav js-main-header__nav" id="main-header-nav" aria-labelledby="main-header-nav-label"
          role="navigation">
          <div id="main-header-nav-label" class="main-header__nav-label">Main menu</div>
          <ul class="main-header__nav-list">
            <li>
              <div class="buscar-caja">
                <input type="text" name="" class="buscar-txt" placeholder="Buscar..." />
                <a class="buscar-btn">
                  <i class="large material-icons">search</i>
                </a>
              </div>
            </li>
            <li class="main-header__nav-item"><a href="index.php" class="main-header__nav-link">INICIO</a></li>
            <li class="main-header__nav-item"><a href="noticias.php" class="main-header__nav-link"
                aria-current="page">NOTICIAS</a></li>
            <li class="main-header__nav-item"><a href="#0" class="main-header__nav-link">STREAMING</a></li>
            <li class="main-header__nav-item"><a href="ofertas.php" class="main-header__nav-link">OFERTAS</a></li>
            <li class="main-header__nav-item main-header__nav-divider" aria-hidden="true"></li>
            <li class="main-header__nav-item"><a href="#0" class="main-header__nav-link  dropdown-trigger"
                data-target='dropdown1'>PERFIL</a></li>
            <li class="main-header__nav-item"><a href="#0" class="main-header__nav-link  dropdown-trigger"
                data-target='dropdown2'>IDIOMA</a></li>
            <ul id='dropdown1' class='dropdown-content'>

            <?php 

            if(isset($_SESSION["usuario"])){
                        
              echo "<li><a href='assets/php/cerrar_sesion.php?paginaAnterior=noticias.php'>LogOut</a></li>";

            }else{

              echo "<li><a href='login.php?paginaAnterior=noticias.php'>LogIn</a></li>";
              echo "<li><a href='#!''>Sign up</a></li>";

            }

            ?>

              <li class="divider" tabindex="-1"></li>
              <li class="main-header__nav-item" style="margin:0;padding-top: 9px;padding-left: 6px;">
                <div class="switch">
                  <input class="switch__input" type="checkbox" id="themeSwitch">
                  <label aria-hidden="true" class="switch__label" for="themeSwitch">On</label>
                  <div aria-hidden="true" class="switch__marker"></div>
                </div>
              </li>
              <li><a href="#!">FAQ</a></li>
            </ul>
            <ul id='dropdown2' class='dropdown-content'>
              <li class="" data-lang="ar"><a href="" data-index="0">
                  <span>العربية</span></a>
              </li>
              <li class="" data-lang="de"><a href="" data-index="1">
                  <span>Deutsch</span></a>
              </li>
              <li class="" data-lang="en-US"><a href="" data-index="2">
                  <span>English</span></a>
              </li>
              <li class="" data-lang="es-MX"><a href="" data-index="4">
                  <span>Español (LA)</span></a>
              </li>
              <li class="" data-lang="fr"><a href="" data-index="5">
                  <span>Français</span></a>
              </li>
              <li class="" data-lang="it"><a href="" data-index="6">
                  <span>Italiano</span></a>
              </li>
              <li class="" data-lang="ja"><a href="" data-index="7">
                  <span>日本語</span></a>
              </li>
              <li class="" data-lang="ko"><a href="" data-index="8">
                  <span>한국어</span></a>
              </li>
              <li class="" data-lang="pl"><a href="" data-index="9">
                  <span>Polski</span></a>
              </li>
              <li class="" data-lang="pt-BR"><a href="" data-index="10">
                  <span>Português (Brasil)</span></a>
              </li>
              <li class="" data-lang="ru"><a href="" data-index="11">
                  <span>Русский</span></a>
              </li>
              <li class="" data-lang="tr"><a href="" data-index="12">
                  <span>Türkçe</span></a>
              </li>
              <li class="" data-lang="zh-CN"><a href="" data-index="13">
                  <span>简体中文</span></a>
              </li>
            </ul>
          </ul>
        </nav>
      </div>
    </div>
  </header> <!-- termina header -->
  <div class="container2 margin-top--xl">
    
    <?php

    include 'assets/php/conexion.php';

    if(!isset($_REQUEST['pagina']) || $_REQUEST['pagina'] < 1 ){

      $pagina = 1;
      
    }else{

      $pagina = $_REQUEST['pagina'];

    }

    $cantidad = 3;

    $consultaNoticias="SELECT * FROM noticias ORDER BY fecha DESC LIMIT $cantidad OFFSET ".($pagina*$cantidad-$cantidad)."";

    $noticias = $conexion -> query($consultaNoticias); 
    
    if ($noticias -> num_rows == 0) {
      
      echo'<div class="container container--adaptive">';
      echo'<h1 class="center-align"> No se encontraron noticias </h1>';
      echo'</div>';

    }else{

      while ($noticia = $noticias -> fetch_array()){

        echo'<div class="container container--adaptive">';
          echo'<div style="text-align: left;color:var(--color-contrast-medium);" class="margin-bottom--xs">';
            echo'<h6>'.(new DateTime($noticia['fecha']))->format('d/m/Y H:m:s').'</h6>';
          echo'</div>';
        echo'</div>';
        echo '<section class="feature feature--invert margin-bottom--xl">';
          echo '<div class="feature__inner container container--adaptive">';
            echo '<div class="feature__text">';
              echo '<div class="feature__text-inner">';
                echo '<div class="text-component">';
                  
                  if(strlen($noticia['titulo'])>50){

                    echo '<h1 style="font-size: 200% !important;">'.$noticia['titulo'].'</h1>';

                  }else{

                    echo '<h1>'.$noticia['titulo'].'</h1>';

                  }

                  echo '<p>'.substr($noticia['cuerpo'],0,207).'...</p>';
                  echo '<small class="feature__label margin-bottom--xs">Etiquetas: '.$noticia['etiquetas'].'</small>';
                echo '</div>';
                echo '<div class="margin-top--sm">';
                  echo '<div class="">';
                    echo '<a href="noticias.php" class="boton btn--primario">Noticias</a>';
                    echo '<a href="noticia.php?idNoticia='.$noticia['id_noticia'].'" class="text--inherit">Ver mas</a>';
                  echo '</div>';
                echo '</div>';
              echo '</div>';
            echo '</div>';
            echo '<div class="feature__media">';
              echo '<div class="" style="position: relative;">';
                echo '<div class="StoreCard-image">';
                  echo '<div><img alt="portada" class="Picture-image" src="data:image/jpg;base64,'.$noticia['imagen'].'"></div>';
                echo '</div>';
              echo '</div>';
            echo '</div>';
          echo '</div>';
        echo '</section>';
  
      }

    }

    $noticias -> close();
    
    ?>

    <section class="feature feature--invert margin-bottom--xs">
      <div class="center">
        <div class="pagination2 ">
          <?php    

            echo'<a href="noticias.php?pagina='.($pagina-1).'">&laquo;</a>';

            if($pagina>5){

              for($i=$pagina-5; $i<$pagina+1; $i++){ 

                echo '<a href="noticias.php?pagina='.$i.'"'.( $i==$pagina ? ' class="active"': null).'>'.$i.'</a>';
  
              }

            }else{

              for($i=1; $i<7; $i++){ 

                echo '<a href="noticias.php?pagina='.$i.'"'.( $i==$pagina ? ' class="active"' : null).'>'.$i.'</a>';
  
              }

            }

            echo'<a href="noticias.php?pagina='.($pagina+1).'">&raquo;</a>';

          ?>
          
        </div>
      </div>
    </section>
  </div>

  <?php 

  if(isset($_SESSION["usuario"])){
              
    echo "<div class='fixed-action-btn'>";
    echo '<a class="btn-floating btn-large "><i class="large material-icons">mode_edit</i></a>';
    echo '<ul><li><a class="btn-floating  modal-trigger" href="#modal1"><i class="material-icons">publish</i></a></li></ul>';
    echo '</div>';

  }

?>
  <!-- Modal Trigger -->

  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-header">
      <h5 class="modal-title">Nueva noticia</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
    </div>
    <form action="assets/php/subir_noticia.php" method="post" enctype="multipart/form-data">
      <div class="modal-content row">
      
        <div class="col s12 m6 l4">
        
          <div class="form-group">
            <label for="exampleFormControlInput1">Titulo</label>
            <input id="inputTitulo" type="text" class="form-control" name="titulo" placeholder="Titulo"  maxlength="100" required>
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Subtitulo</label>
            <input id="inputSubitulo" type="text" class="form-control" name="subtitulo" placeholder="Subtitulo" maxlength="100" required>
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Portada</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="imagen" id="imagen" lang="es" accept="image/*" required>
              <label class="custom-file-label" id="select_file">Seleccione una imagen</label>
            </div>
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Etiquetas</label>
            <input type="text" class="form-control" name="etiquetas" placeholder="Ej:Gaming,Ps4,SmashBros" maxlength="50" required>
          </div>

        </div>

        <div class="col s12 m6 l8">
        
          <div class="form-group">

            <label for="exampleFormControlTextarea1">Cuerpo de la noticia</label>
            <textarea class="form-control s1 expand" name="cuerpo" style="resize: vertical; height: 290px;" placeholder="Ingrese texto.. " required></textarea>

          </div>
        
        </div>
      </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-secondary"></input>
        </div>
      
    </form> 

  </div>

  <script>
    //document.getElementsByTagName("html")[0].className += " js";
  </script>
  <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
  <script>

    $(document).on('change', function () {

      var filename = ($('#imagen').val()).substr(12); 

      $('#select_file').html(filename);

    })

    $('.close').on('click', function () {

      $('.modal').modal('close');
      $('#select_file').html('Seleccione una imagen');

    })

    $(document).on('ready', function () {
      $('.dropdown-trigger').dropdown();
      $('[data-toggle="tooltip"]').tooltip();
      $('.fixed-action-btn').floatingActionButton();
      $('.modal').modal();
    })

  </script>

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="assets/js/util.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/header.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>

  <script>

  //$("form").validate();

  //  $('.btn-secondary').on('click', function () {
  //   	 if($('form').valid()){
  //      	$("textarea").animate({height: "260px"}); 
  //   }else{
  //   	$("textarea").animate({height: "389px"}); 
  //   }
  //   })

    // jQuery.extend(jQuery.validator.messages, {
    // required: "Campo obligatorio.",
    // //email: "Por favor ingrese un e-mail valido",
    // });

  </script>

</body>

</html>