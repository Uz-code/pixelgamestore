<?php

//session_start();

include 'conexion.php';

if(!isset($_COOKIE["cookie"])){

	//header("Location: ../../".$_SESSION["paginaAnterior"]);

  //exit(0);
  
  return;

}else{

  $cookie = $_COOKIE["cookie"];

  $consulta="SELECT id_usuario, usuario FROM usuarios WHERE cookie = '$cookie'";
  $resultado = $conexion -> query($consulta);

  if ($resultado -> num_rows == 0) {
  
    session_unset(); 

    return;
  
  }else{

    $extraido= mysqli_fetch_array($resultado);
  
    $_SESSION['usuario'] = $extraido['usuario'];
  
    $_SESSION['id_usuario'] = $extraido['id_usuario'];
  
  }
  
}

?>