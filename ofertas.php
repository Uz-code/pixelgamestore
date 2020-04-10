<?php

session_start();

require_once "assets/php/validar_sesion.php";

$_SESSION["paginaAnterior"]='ofertas.php';

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="img/favicon.png">
  <link rel="stylesheet" type="text/css" href="./slick/slick.css">
  <link rel="stylesheet" type="text/css" href="./slick/slick-theme.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Roboto:300,400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/materialize.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Ofertas</title>
</head>

<body>
  <header class="main-header js-main-header margin-bottom--lg">
    <div class="container container--lg">
      <div class="main-header__layout">
        <div class="main-header__logo">
        <?php
          
          if(isset($_SESSION["usuario"])){  

          echo 'Hola&nbsp;'.$_SESSION["usuario"];

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
            <li class="main-header__nav-item"><a href="index.php" class="main-header__nav-link">INICIO</li>
            <li class="main-header__nav-item"><a href="noticias.php" class="main-header__nav-link">NOTICIAS</a></li>
            <li class="main-header__nav-item"><a href="#0" class="main-header__nav-link">STREAMING</a></li>
            <li class="main-header__nav-item"><a href="ofertas.php" class="main-header__nav-link"
                aria-current="page">OFERTAS</a></li>
            <li class="main-header__nav-item main-header__nav-divider" aria-hidden="true"></li>
            <li class="main-header__nav-item"><a href="#0" class="main-header__nav-link  dropdown-trigger"
                data-target='dropdown1'>PERFIL</a></li>
            <li class="main-header__nav-item"><a href="#0" class="main-header__nav-link  dropdown-trigger"
                data-target='dropdown2'>IDIOMA</a></li>
            <ul id='dropdown1' class='dropdown-content'>
            <?php if(isset($_SESSION["usuario"])) { ?>
                        
              <li><a href='assets/php/cerrar_sesion.php'>LogOut</a></li>
                      
            <?php } else { ?>
                      
              <li><a href='login2.php'>LogIn</a></li>
              <li><a href='#!''>SignUp</a></li>
                      
            <?php }
              //Se guarda la pagina para recuperarla al iniciar o cerrar sesion
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
  <section class="feature margin-bottom--xl l margin-top--xl">
    <div class="   container container--adaptive  ">
      <div style="text-align: left;color:var(--color-contrast-medium);" class="margin-bottom--xs">
        <h6>Destacado</h6>
      </div>
      <div class="slider-for">
        <div class="item">
          <a>
            <div class="StoreCard-image">
              <div>
                <img alt="Spellbreak" class="Picture-image" src="img/SpellBreak.jpg">
              </div>
              <div class="StoreCard-logo">
                <div class="DynamicLogo-small">
                  <a href="Spellbreak/spellbreak.html"><img class="DynamicLogo-logo" src="img/SpellBreak-Logo.png"
                      alt="Spellbreak"></a>
                </div>
              </div>
            </div>
            <div class="StoreCard-detailContainer">
              <span class="StoreCard-details">
                <h3>Spellbreak</h3>
                <span class="StoreCard-secondary">
                  <a href="Spellbreak/spellbreak.html"><span class="StoreCard-publisher">Oferta De</span>
                    <span class="StoreCard-price"><wbr><span class="">
                        <s class="Price-discount"> 20,00&nbsp;US$</s><span> a 11,99&nbsp;US$</span></span></span></a>
            </div>
          </a>
        </div>
        <div class="item">
          <a class="StoreCard-image">
            <div class="StoreCard">
              <div>
                <img alt="RiME" class="Picture-image" src="img/Rime.jpg">
              </div>
              <div class="StoreCard-logo">
                <div class="DynamicLogo-small">
                  <img class="DynamicLogo" src="img/Rime-Logo.png" alt="RiME"></div>
              </div>
            </div>
            <div class="StoreCard-detailContainer">
              <span class="StoreCard-details">
                <h3>Rime</h3>
                <span class="StoreCard-secondary">
                  <span class="StoreCard-publisher">Oferta De</span>
                  <span class="StoreCard-price"><wbr><span class="">
                      <s class="Price-discount" style="cursor: pointer;"> 15,00&nbsp;US$</s><span> a 5,49&nbsp;US$</span></span></span>
            </div>
          </a>
        </div>
        <div class="item">
          <a class="StoreCard-image">
            <div class="StoreCard">
              <div>
                <img alt="Journey" class="Picture-image" src="img/Journey.jpg">
              </div>
              <div class="StoreCard-logo">
                <div class="DynamicLogo-small">
                  <img class="" src="img/Journey-logo.png" alt="Journey">
                </div>
              </div>
            </div>
            <div class="StoreCard-detailContainer">
              <span class="StoreCard-details">
                <h3>Journey</h3>
                <span class="StoreCard-secondary">
                  <span class="StoreCard-publisher">Oferta De</span>
                  <span class="StoreCard-price"><wbr><span class="">
                      <s class="Price-discount" style="cursor: pointer;"> 23,00&nbsp;US$</s><span> a
                        12,00&nbsp;US$</span></span></span>
            </div>
          </a>
        </div>
        <div class="item">
          <a class="StoreCard-image">
            <div class="StoreCard">
              <div>
                <img alt="Dauntless" class="Picture-image" src="img/Dauntless.jpg" />
              </div>
              <div class="StoreCard-logo">
                <div class=" DynamicLogo-small">
                  <img class="DynamicLogo-logo_f5443fce" src="img/Dauntless-logo.png" alt="Dauntless">
                </div>
              </div>
            </div>
            <div class="StoreCard-detailContainer">
              <span class="StoreCard-details">
                <h3>Dauntless</h3>
                <span class="StoreCard-secondary">
                  <span class="StoreCard-publisher"></span>
                  <span class="StoreCard-price"><span class="">
                      <span class="Price-discount">FREE</span><span> </span></span></span>
            </div>
          </a>
        </div>
        <div class="item">
          <a class="StoreCard-image">
            <div class="StoreCard">
              <div>
                <img alt="Spellbreak" class="Picture-image" src="img/SpellBreak.jpg">
              </div>
              <div class="StoreCard-logo">
                <div class="DynamicLogo-small">
                  <a href="Spellbreak/spellbreak.html"><img class="DynamicLogo-logo" src="img/SpellBreak-Logo.png"
                      alt="Spellbreak"></a>
                </div>
              </div>
            </div>
            <div class="StoreCard-detailContainer">
              <span class="StoreCard-details">
                <h3>Spellbreak</h3>
                <span class="StoreCard-secondary">
                  <span class="StoreCard-publisher">Oferta De</span>
                  <span class="StoreCard-price"><wbr><span class="">
                      <s class="Price-discount"> 20,00&nbsp;US$</s><span> a 11,99&nbsp;US$</span></span></span>
            </div>
          </a>
        </div>
        <div class="item">
          <a class="StoreCard-image">
            <div class="StoreCard">
              <div>
                <img alt="RiME" class="Picture-image" src="img/Rime.jpg">
              </div>
              <div class="StoreCard-logo">
                <div class="DynamicLogo-small">
                  <img class="DynamicLogo" src="img/Rime-Logo.png" alt="RiME"></div>
              </div>
            </div>
            <div class="StoreCard-detailContainer">
              <span class="StoreCard-details">
                <h3>Rime</h3>
                <span class="StoreCard-secondary">
                  <span class="StoreCard-publisher">Oferta De</span>
                  <span class="StoreCard-price"><wbr><span class="">
                      <s class="Price-discount" style="cursor: pointer;"> 15,00&nbsp;US$</s><span> a 5,49&nbsp;US$</span></span></span>
            </div>
          </a>
        </div>
        <div class="item">
          <a class="StoreCard-image">
            <div class="StoreCard">
              <div>
                <img alt="Journey" class="Picture-image" src="img/Journey.jpg">
              </div>
              <div class="StoreCard-logo">
                <div class="DynamicLogo-small">
                  <img class="DynamicLogo-logo_f5443fce" src="img/Journey-logo.png" alt="Journey">
                </div>
              </div>
            </div>
            <div class="StoreCard-detailContainer">
              <span class="StoreCard-details">
                <h3>Journey</h3>
                <span class="StoreCard-secondary">
                  <span class="StoreCard-publisher">Oferta De</span>
                  <span class="StoreCard-price"><wbr><span class="">
                      <s class="Price-discount" style="cursor: pointer;"> 23,00&nbsp;US$</s><span> a
                        12,00&nbsp;US$</span></span></span>
            </div>
          </a>
        </div>
        <div class="item">
          <a class="StoreCard-image">
            <div class="StoreCard">
              <div>
                <img alt="Dauntless" class="Picture-image" src="img/Ashen.jpg" />
              </div>
              <div class="StoreCard-logo">
                <div class="DynamicLogo-small">
                  <img class="" src="img/Ashen-Logo.png" alt="Dauntless">
                </div>
              </div>
            </div>
            <div class="StoreCard-detailContainer">
              <span class="StoreCard-details">
                <h3>Ashen</h3>
                <span class="StoreCard-secondary">
                  <span class="StoreCard-publisher"></span>
                  <span class="StoreCard-price"><span class="">
                      <span class="Price-discount">FREE</span><span> </span></span></span>
            </div>
          </a>
        </div>
      </div>
      <div class="slider-nav">
        <div class="item">
          <img alt="Spellbreak" src="img/SpellBreak.jpg" />
        </div>
        <div class="item">
          <img alt="RiME" class="Picture-image" src="img/Rime.jpg" />
        </div>
        <div class="item">
          <img alt="Journey" class="Picture-image" src="img/Journey.jpg" />
        </div>
        <div class="item">
          <img alt="Dauntless" src="img/Dauntless.jpg" />
        </div>
        <div class="item">
          <img alt="Spellbreak" src="img/SpellBreak.jpg" />
        </div>
        <div class="item">
          <img alt="RiME" class="Picture-image" src="img/Rime.jpg" />
        </div>
        <div class="item">
          <img alt="Journey" class="Picture-image" src="img/Journey.jpg" />
        </div>
        <div class="item">
          <img alt="Dauntless" src="img/Ashen.jpg" />
        </div>

      </div>
    </div>
  </section>
  <section class="feature margin-bottom--xl">

    <div class="container container--adaptive">
      <div style="text-align: left;color:var(--color-contrast-medium);" class="margin-bottom--xs">
        <h6>Nuevo</h6>
      </div>
    </div>
    <div class="contenido">
      <div class="container">
        <div class="row">
          <div class="col s12 cards-container">
            <div class="card">
              <img src="img/Fortnite.jpg" style="max-height: 700px;">
              <div class="card-content">
                <p>Fortnite</p>
              </div>
            </div>
            <div class="card">
              <img src="img/Ashen.jpg" style="max-height: 700px;">
              <div class="card-content">
                <p>Ashen</p>
              </div>
            </div>
            <div class="card">
              <img src="img/1.png" style="max-height: 700px;">
              <div class="card-content">
                <p>Enter the gungeon</p>
              </div>
            </div>
            <div class="card">
              <img src="img/SpellBreak.jpg" style="max-height: 700px;">
              <div class="card-content">
                <p>SpellBreak</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
  <script>
    $(document).on('ready', function () {
      $('.dropdown-trigger').dropdown();
    });
  </script>
  <script src="./slick/slick.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">
    $(document).on('ready', function () {
      M.AutoInit();
      $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav',
        autoplay: true
      });
      $('.slider-nav').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        dots: false,
        centerMode: true,
        focusOnSelect: true
      });
    });
  </script>
  <script>
    document.getElementsByTagName("html")[0].className += " js";
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="assets/js/util.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/header.js"></script>
</body>

</html>