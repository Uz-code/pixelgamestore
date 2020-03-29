<?php 

session_start();

if(!isset($_SESSION["usuario"]) || !isset($_SESSION["paginaAnterior"])){

	header("Location: index.php");

  exit();

}else{

  $paginaAnterior= $_SESSION['paginaAnterior'];

  session_unset(); 

  session_destroy();

  header("Location: ../../".$paginaAnterior."");

}

?>