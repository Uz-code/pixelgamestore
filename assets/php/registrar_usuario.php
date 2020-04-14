<?php 

try{

	session_start();

	require 'conexion.php';

	if( isset($_SESSION["usuario"]) || !isset($_REQUEST['usuario'],$_REQUEST['contrasena'],$_REQUEST['email'])){

		header("Location: ../../noticias.php");

	}

	$usuario = $_REQUEST['usuario'];
  $email = $_REQUEST['email'];
	$contrasena = md5($_REQUEST['contrasena']);
	$recordar = true;
	$paginaAnterior = $_SESSION['paginaAnterior'];

	if( empty($usuario) || empty($contrasena) || empty($email)){

		throw new Exception("Campos vacios");

	}

	if (!preg_match("/^[a-zA-Z0-9\-_]{3,20}$/", $usuario)){

		throw new Exception("Nombre de usuario no valido");

	}

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)){

		throw new Exception("Email no valido");

	}

	$consulta="SELECT usuario FROM usuarios WHERE usuario = '$usuario'";
	$resultado = $conexion -> query($consulta);

	if ($resultado -> num_rows != 0) {

		throw new Exception("Nombre ya utilizado");

	}

	$consulta="SELECT usuario FROM usuarios WHERE email = '$email'";
	$resultado = $conexion -> query($consulta);

	if ($resultado -> num_rows != 0) {

		throw new Exception("Email ya utilizado");

	}

	$consulta="INSERT INTO usuarios (usuario,email,contrasena) VALUES ('$usuario','$email','$contrasena')";
	
	mysqli_query($conexion, $consulta) or die ("Problemas Creando Usuario: ".mysqli_error($conexion));
	
	$consulta="SELECT id_usuario, usuario FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
	
	$extraido= mysqli_fetch_array($conexion -> query($consulta));
	
	$id_usuario=$extraido['id_usuario'];
	
	if($recordar == true){
	
		$accessToken= md5($extraido['usuario'].$id_usuario.date('d-m-Y H:i:s'));	
	
		setcookie("cookie", $accessToken, time()+(60*60*24*365), '/', NULL, 0);
	
		$consulta="UPDATE usuarios SET access_token='$accessToken' WHERE id_usuario='$id_usuario'";
				
		mysqli_query($conexion, $consulta) or die ("Problemas: ".mysqli_error($conexion));
	
	}else{
	
		$_SESSION['usuario'] = $extraido['usuario'];
		
		$_SESSION['id_usuario'] = $extraido['id_usuario'];
	
		setcookie("cookie", null, time() - 3600, "/");
	
	}

	echo json_encode(array('status' => array('code' =>1 , 'description' => 'OK')));

}catch (Exception $e){

	echo json_encode(array('status' => array('code' =>0 , 'description' => $e->getMessage())));

}finally{

	mysqli_close($conexion);

}

?>