<?php 

try{

  session_start();

  include 'conexion.php';

  if(!isset($_SESSION["usuario"]) || !isset($_POST["idNoticia"])){

    header("Location: ../../".$_SESSION["paginaAnterior"]);
    return;
    
  }

	$idNoticia = $_POST["idNoticia"];
	$idUsuario = $_SESSION["id_usuario"];

	$consulta="SELECT id_usuario FROM noticias WHERE id_noticia = '$idNoticia' AND id_usuario = '$idUsuario'";
	$resultado = $conexion -> query($consulta);

	if ($resultado -> num_rows == 0) {

		throw new Exception("La noticia no fue encontrada o no te pertenece");

	}

  $consulta="DELETE FROM noticias WHERE id_noticia='$idNoticia' AND id_usuario='$idUsuario'";

  $conexion -> query($consulta);

  echo json_encode(array('status' => array('code' =>1 , 'description' => 'OK')));

}catch(mysqli_sql_exception $e){
	
	echo json_encode(array('status' => array('code' =>0 , 'description' => $e->getMessage())));

}catch(Exception $e){

	echo json_encode(array('status' => array('code' =>0 , 'description' => $e->getMessage())));

}finally{

	if(isset($conexion)){

		$conexion->close();

	}

}

?>