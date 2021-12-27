<?php

session_start();

//echo $_COOKIE['cookie'];

if(!isset($_SESSION["usuario"])){

	header("Location: ".$_SESSION["paginaAnterior"]);

  //exit();

}

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
  <!-- Remueve el banner en 000wehost -->
  <script type="text/javascript">
    window.onload = () => {
      let el = document.querySelector('[alt="www.000webhost.com"]');
      if (el){
        el = el.parentNode.parentNode
        el.parentNode.removeChild(el);
      }
    }
  </script>
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
            <li class="main-header__nav-item"><a href="noticias.php" class="main-header__nav-link">NOTICIAS</a></li>
            <li class="main-header__nav-item"><a href="#0" class="main-header__nav-link">STREAMING</a></li>
            <li class="main-header__nav-item"><a href="ofertas.php" class="main-header__nav-link">OFERTAS</a></li>
            <li class="main-header__nav-item main-header__nav-divider" aria-hidden="true"></li>
            <li class="main-header__nav-item"><a href="#0" class="main-header__nav-link  dropdown-trigger" data-target='dropdown1'>PERFIL</a></li>
            <li class="main-header__nav-item"><a href="#0" class="main-header__nav-link  dropdown-trigger" data-target='dropdown2'>IDIOMA</a></li>
            <ul id='dropdown1' class='dropdown-content'>

            <?php if(isset($_SESSION["usuario"])) : ?>
                        
              <li><a href='assets/php/cerrar_sesion.php'>Cerrar Sesion</a></li>
                      
            <?php else :?>
                      
              <li><a href='Ingresar.php'>Iniciar Sesion</a></li>
              <li><a href='Ingresar.php?Registrar=true'>Registrate</a></li>
                      
            <?php endif;?>

              <li class="divider" tabindex="-1"></li>
              <li class="main-header__nav-item" id="switch">
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
  if(!str_contains($_SESSION["paginaAnterior"],'pagina')){
    $_SESSION["paginaAnterior"].='?pagina='.$pagina;
  }

  $cantidad = 3;

  $consultaNoticias="SELECT * FROM noticias WHERE id_usuario=".$_SESSION['id_usuario']." ORDER BY fecha DESC LIMIT $cantidad OFFSET ".($pagina*$cantidad-$cantidad)."";

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
            <div>
              <a href="" onclick="deleteFunction(<?=$noticia['id_noticia']?>)" class="boton btn--delete">Eliminar</a>
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
          <a href="borrar.php?pagina=<?= ($pagina-1) ?>">&laquo;</a>
  <?php    

    $numero = ($pagina % 6 == 0 ? $pagina - (6 - 1) : 1 + (6*intdiv($pagina, 6)));

    for($i=$numero; $i< ($numero+6); $i++){ 

      echo'<a href="borrar.php?pagina='.$i.'"'.( $i==$pagina ? 'class="active"': null).'>'.$i.'</a>';
  
    }

  ?>
          <a href="borrar.php?pagina=<?= ($pagina+1) ?>">&raquo;</a>
        </div>
      </div>
    </section>
  </div>

  <div class="fixed-action-btn">
    <a class="btn-floating btn-large" href="noticias.php"><i class="large material-icons btn--cancel">add</i></a>
  </div>
  
  <script src="assets/js/jquery-2.2.0.min.js" type="text/javascript"></script>
  
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

  function deleteFunction(idNoticia) {

    $("#loadingImg").show()

    $.ajax({
      type: "POST",
      url: 'assets/php/eliminar_noticia.php',
      data: {
        idNoticia: idNoticia
      },
      success: function(response){
      //console.log(response);
        var jsonData = JSON.parse(response);
          if (jsonData.status.code == "1"){
            alert('Noticia Eliminada correctamente');
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
  }
  </script>

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->

</body>

</html>