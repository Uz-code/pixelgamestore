<?php 

try{

  session_start();

  include 'conexion.php';

  if(!isset($_SESSION["usuario"]) || !isset($_SESSION["paginaAnterior"])){

    header("Location: ".$_SESSION["paginaAnterior"]);
    return;
    
  }

  $paginaAnterior= $_SESSION['paginaAnterior'];

  $id_usuario=$_SESSION['id_usuario'];

  $consulta="UPDATE usuarios SET access_token=null WHERE id_usuario='$id_usuario'";

  $conexion -> query($consulta);

  session_unset(); 

  session_destroy();

  setcookie("ACCESS_TOKEN", null, time() - 3600, "/");

  header("Location: ../../".$paginaAnterior."");

}catch(mysqli_sql_exception $e){
	
	echo json_encode(array('status' => array('code' =>0 , 'description' => $e->getMessage())));

}finally{

	if(isset($conexion)){

		$conexion->close();

	}

}

?>