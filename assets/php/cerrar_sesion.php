<?php 

session_start();

include 'conexion.php';

if(!isset($_SESSION["usuario"]) || !isset($_SESSION["paginaAnterior"])){

	header("Location: ".$_SESSION["paginaAnterior"]);

}else{

  $paginaAnterior= $_SESSION['paginaAnterior'];

  $id_usuario=$_SESSION['id_usuario'];

  $consulta="UPDATE usuarios SET cookie=null WHERE id_usuario='$id_usuario'";

  mysqli_query($conexion, $consulta) or die ("Problemas: ".mysqli_error($conexion));

  session_unset(); 

  session_destroy();

  setcookie("cookie", null, time() - 3600, "/");

  header("Location: ../../".$paginaAnterior."");

  mysqli_close($conexion); 

}

?>