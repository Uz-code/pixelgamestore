<?php

session_start();

//echo $_COOKIE['cookie'];

require_once "assets/php/validar_sesion.php";

$_SESSION["paginaAnterior"]='noticias.php';

//include 'assets/php/conexion.php';

?>
<!DOCTYPE html>
<html class="js" lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="img/favicon.png">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Roboto:300,400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/materialize.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="assets/css/modal.css">
  <title>Noticias</title>
</head>

<body>
  <div id="loadingImg">
    <img  src="img/cargando.gif" alt="Funny image">
  </div>
  <header class="main-header js-main-header margin-bottom--lg">
    <div class="container container--lg">
      <div class="main-header__layout">
        <div class="main-header__logo">
          <?= isset($_SESSION["usuario"]) ? 'Hola '.$_SESSION["usuario"] : 'Invitado' ?>
        </div>
        <button class="btn--subtle main-header__nav-trigger js-main-header__nav-trigger" aria-label="Toggle menu"
          aria-expanded="false" aria-controls="main-header-nav">
          <i class="main-header__nav-trigger-icon" aria-hidden="true"></i>
          <span></span>
        </button>
        <nav class="main-header__nav js-main-header__nav" id="main-header-nav" aria-labelledby="main-header-nav-label"
          role="navigation">
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

            <?php if(isset($_SESSION["usuario"])) : ?>
                        
              <li><a href='assets/php/cerrar_sesion.php'>Cerrar Sesion</a></li>

            <?php else: ?>

              <li><a href='Ingresar.php'>Iniciar Sesion</a></li>
              <li><a href='Ingresar.php?Registrar=true'>Registrarme</a></li>

            <?php endif;?>

              <li class="divider" tabindex="-1"></li>
              <li class="main-header__nav-item" style="margin:0; padding: 14px 16px;">
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

  if(!isset($_REQUEST['pagina']) || $_REQUEST['pagina'] < 1 ){

    $pagina = 1;
      
  }else{

    $pagina = $_REQUEST['pagina'];
      
  }

  include 'assets/php/conexion.php';
  //Se guarda la pagina para recuperarla al iniciar o cerrar sesion  
  $_SESSION["paginaAnterior"].='?pagina='.$pagina;

  $cantidad = 3;

  $consultaNoticias="SELECT * FROM noticias ORDER BY fecha DESC LIMIT $cantidad OFFSET ".($pagina*$cantidad-$cantidad)."";

  $noticias = $conexion -> query($consultaNoticias); 
    
  if ($noticias -> num_rows == 0) : ?>
      
    <div class="container container--adaptive">
      <h1 class="center-align">No&nbsp;se&nbsp;encontraron&nbsp;noticias</h1>
    </div>

  <?php else : 

    while ($noticia = $noticias -> fetch_array()) : ?>
  
    <div class="container container--adaptive">
      <div style="text-align: left;color:var(--color-contrast-medium);" class="margin-bottom--xs">
        <h6><?= (new DateTime($noticia['fecha']))->format('d/m/Y H:i:s') ?></h6>
      </div>
    </div>
    
    <section class="feature feature--invert margin-bottom--xl">
      <div class="feature__inner container container--adaptive">
        <div class="feature__text">
          <div class="feature__text-inner">
            <div class="text-component"> 
              <a href="noticia.php?idNoticia=<?= $noticia['id_noticia'] ?>">        
                <h1 class="text--xl"><?=$noticia['titulo'] ?></h1>
                <p><?= mb_substr($noticia['cuerpo'],0,200,'HTML-ENTITIES'); ?>...</p>
                <small class="feature__label margin-bottom--xs">Etiquetas:&nbsp;<?= $noticia['etiquetas'] ?></small>
              </a>
            </div>
            <div class="margin-top--sm">
              <div class="">
                <a href="noticias.php" class="boton btn--primario">Noticias</a>
                <a href="noticia.php?idNoticia=<?= $noticia['id_noticia'] ?>" class="text--inherit">Ver&nbsp;m&aacute;s</a>
              </div>
            </div>
          </div>
        </div>
        <div class="feature__media">
          <div class="" style="position: relative;">
            <div class="StoreCard-image">
              <div>
                <a href="noticia.php?idNoticia=<?= $noticia['id_noticia'] ?>">
                  <img alt="portada" class="Picture-image" src="data:image/jpg;base64,<?= $noticia['imagen'] ?>">
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> 
  
  <?php 

    endwhile;

  endif;

  $noticias -> close();
    
  ?>

    <section class="feature feature--invert margin-bottom--xs">
      <div class="center">
        <div class="pagination2 ">
          <a href="noticias.php?pagina=<?= ($pagina-1) ?>">&laquo;</a>
  <?php    

    $numero = ($pagina % 6 == 0 ? $pagina - (6 - 1) : 1 + (6*intdiv($pagina, 6)));

    for($i=$numero; $i< ($numero+6); $i++){ 

      echo'<a href="noticias.php?pagina='.$i.'"'.( $i==$pagina ? 'class="active"': null).'>'.$i.'</a>';
  
    }

  ?>
          <a href="noticias.php?pagina=<?= ($pagina+1) ?>">&raquo;</a>
        </div>
      </div>
    </section>
  </div>

  <?php 

  if(isset($_SESSION["usuario"])) : ?>

    <!-- Modal Trigger -->          
    <div class="fixed-action-btn">
      <a class="btn-floating btn-large "><i class="large material-icons">edit</i></a>
      <ul>
        <li><a class="btn-floating  modal-trigger" href="#modal1"><i class="material-icons">publish</i></a></li>
        <li><a class="btn-floating  modal-trigger" href="borrar.php"><i class="material-icons">delete</i></a></li>
      </ul>
    </div>

    <!-- Modal Structure -->
    <div id="modal1" class="modal">
      <div class="modal-header">
        <h5 class="modal-title">Nueva noticia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
      </div>
      <form  enctype="multipart/form-data" id="formSubirNoticia">
        <div class="modal-content row">
          <div class="col s12 m6 l4">
            <div class="form-group">
              <label for="exampleFormControlInput1">Titulo</label>
              <input id="inputTitulo" type="text" class="form-control" name="titulo" placeholder="Titulo"  maxlength="100" required>
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Subtitulo</label>
              <input id="inputSubtitulo" type="text" class="form-control" name="subtitulo" placeholder="Subtitulo" maxlength="100" required>
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Portada</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="imagen" id="imagen" lang="es" accept="image/*" required>
                <label class="custom-file-label" id="select_file" placeholder="Seleccione una imagen"></label>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Etiquetas</label>
              <input id="inputEtiquetas" type="text" class="form-control" name="etiquetas" placeholder="Ej:Gaming,Ps4,SmashBros" maxlength="50" required>
            </div>
          </div>
          <div class="col s12 m6 l8">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Cuerpo de la noticia</label>
              <textarea id="inputCuerpo" class="form-control s1 expand" name="cuerpo" style="resize: vertical; height: 290px;" placeholder="Ingrese texto.. " required></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="submit" value="subir noticia" class="btn btn-secondary">
        </div>
      </form> 
    </div>

  <?php endif; ?>
  
  <script>
    //document.getElementsByTagName("html")[0].className += " js";
  </script>
  <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="assets/js/util.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/header.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>
  <script>

  $(document).on('ready', function () {
    $('.dropdown-trigger').dropdown();
  })

  </script>

  <?php 
  
  if(isset($_SESSION["usuario"])) : ?>

  <script type="text/javascript">

  $(document).on('ready', function () {

    $('[data-toggle="tooltip"]').tooltip();
    $('.fixed-action-btn').floatingActionButton();
    $('.modal').modal();
    $('#select_file').html('Seleccione una imagen');

    $('#formSubirNoticia').submit(function(e) {
      e.preventDefault();
      $("#loadingImg").show()

      var frmData = new FormData();
      frmData.append("titulo",$("#inputTitulo").val());
      frmData.append("subtitulo",$("#inputSubtitulo").val());
      frmData.append("cuerpo",$("#inputCuerpo").val());
      frmData.append("etiquetas",$("#inputEtiquetas").val());
      frmData.append("imagen",$('#imagen')[0].files[0]);
      let date = new Date();
      frmData.append("fecha",date.getFullYear()+"-"+(date.getMonth()+1)+"-"+date.getDate()+" "+date.getHours()+":"+date.getMinutes()+":"+date.getSeconds());   

      $.ajax({
        type: "POST",
        url: 'assets/php/subir_noticia.php',
        data: frmData,
        processData: false,
        contentType: false,
          success: function(response){
            //console.log(response);
            var jsonData = JSON.parse(response);
            if (jsonData.status.code == "1"){
              
              alert('Noticia Subida');
              location.reload();
              //window.history.back();
            }else{
              alert(jsonData.status.description);
              $("#loadingImg").hide();
            }
          },
          error: function() {
            alert('Servidor no disponible');
            $("#loadingImg").hide();
          },
      });
    });

    })

    $('.close').on('click', function () {
      $('.modal').modal('close');
      $("#formSubirNoticia")[0].reset();
      $('#select_file').html('Seleccione una imagen');
    })

    $('#imagen').on('change', function () {

      if(this.files[0].size > 500000){
       alert("Imagen demasiado pesada!");
       this.value = null;
      }else{
        var filename = ($('#imagen').val()).substr(12); 
        $('#select_file').html(filename);
      }

    })

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

  <?php endif; ?>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->

</body>

</html>