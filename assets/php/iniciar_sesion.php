<?php 

try{

	session_start();

	require 'conexion.php';

	if( isset($_SESSION["usuario"]) || !isset($_REQUEST['usuario'],$_REQUEST['contrasena'],$_REQUEST['recordar'])){

		header("Location: ../../".$_SESSION["paginaAnterior"]);
		return;

	}

	$usuario = $_REQUEST['usuario'];
	$contrasena = md5($_REQUEST['contrasena']);
	$recordar = filter_var($_REQUEST['recordar'], FILTER_VALIDATE_BOOLEAN);
	$paginaAnterior = $_SESSION['paginaAnterior'];

	$consulta="SELECT id_usuario, usuario FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
	$resultado = $conexion -> query($consulta);

	if ($resultado -> num_rows == 0) {

		throw new Exception("Usuario o contraseña incorrectos");

	}

	$extraido= mysqli_fetch_array($resultado);

	$id_usuario=$extraido['id_usuario'];

	if($recordar == true){

		$accessToken= md5($extraido['usuario'].$id_usuario.date('d-m-Y H:i:s'));	

		setcookie("ACCESS_TOKEN", $accessToken, time()+(60*60*24*365), '/', NULL, 0);

		$consulta="UPDATE usuarios SET access_token='$accessToken' WHERE id_usuario='$id_usuario'";
			
		mysqli_query($conexion, $consulta) or die ("Problemas: ".mysqli_error($conexion));

	}else{

		$_SESSION['usuario'] = $extraido['usuario'];
  
		$_SESSION['id_usuario'] = $extraido['id_usuario'];

		setcookie("ACCESS_TOKEN", null, time() - 3600, "/");

	}

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