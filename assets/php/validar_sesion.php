<?php

//session_start();

include 'conexion.php';

if(!isset($_COOKIE["ACCESS_TOKEN"])){
	//header("Location: ../../".$_SESSION["paginaAnterior"]);
  //exit(0);
  return;

}else{

  $accessToken = $_COOKIE["ACCESS_TOKEN"];

  $consulta="SELECT id_usuario, usuario FROM usuarios WHERE access_token = '$accessToken'";
  $resultado = $conexion -> query($consulta);

  if ($resultado -> num_rows == 0) {
  
    session_unset(); 

    setcookie("ACCESS_TOKEN", null, time() - 3600, "/");

    //return;
  
  }else{

    $extraido= mysqli_fetch_array($resultado);
  
    $_SESSION['usuario'] = $extraido['usuario'];
  
    $_SESSION['id_usuario'] = $extraido['id_usuario'];
  
  }

  mysqli_close($conexion); 
  
}

?>