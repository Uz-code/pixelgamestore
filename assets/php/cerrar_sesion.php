<?php 

$paginaAnterior= $_REQUEST['paginaAnterior'];

session_start();

session_unset(); 

session_destroy();

header("Location: ../../".$paginaAnterior."");

?>