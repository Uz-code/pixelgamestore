<?php 

try{

	session_start();

	require 'conexion.php';

	if( isset($_SESSION["usuario"]) || !isset($_REQUEST['usuario'],$_REQUEST['contrasena'],$_REQUEST['email'])){

		header("Location: ../../noticias.php");
		return;

	}

	if( empty($_REQUEST['usuario']) || empty($_REQUEST['email']) || empty($_REQUEST['contrasena'])){

		throw new Exception("Completa todos los campos");

	}

	if (!preg_match("/^[a-zA-Z0-9\-_]{3,20}$/", $_REQUEST['usuario'])){

		throw new Exception("Nombre de usuario no valido");

	}

	if (!preg_match("/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/", $_REQUEST['contrasena'])){

		throw new Exception("La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.");

	}

	if (!filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)){

		throw new Exception("Email no valido");

	}

	$usuario = strtolower($_REQUEST['usuario']);
  $email = strtolower($_REQUEST['email']);
	$contrasena = md5($_REQUEST['contrasena']);
	$recordar = filter_var($_REQUEST['recordar'], FILTER_VALIDATE_BOOLEAN);
	$paginaAnterior = $_SESSION['paginaAnterior'];

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
	
	$conexion -> query($consulta);
	
	$consulta="SELECT id_usuario, usuario FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
	
	$extraido= mysqli_fetch_array($conexion -> query($consulta));
	
	$id_usuario=$extraido['id_usuario'];
	
	if($recordar == true){
	
		$accessToken= md5($extraido['usuario'].$id_usuario.date('d-m-Y H:i:s'));	
	
		setcookie("ACCESS_TOKEN", $accessToken, time()+(60*60*24*365), '/', NULL, 0);
	
		$consulta="UPDATE usuarios SET access_token='$accessToken' WHERE id_usuario='$id_usuario'";
				
		$conexion->query($consulta);
	
	}else{
	
		setcookie("ACCESS_TOKEN", null, time() - 3600, "/");
	
	}

	$_SESSION['usuario'] = $extraido['usuario'];
		
	$_SESSION['id_usuario'] = $extraido['id_usuario'];

	echo json_encode(array('status' => array('code' =>1 , 'description' => 'OK')));

}catch(mysqli_sql_exception $e){
	
	echo json_encode(array('status' => array('code' =>0 , 'description' => $e->getMessage())));

}catch (Exception $e){

	echo json_encode(array('status' => array('code' =>0 , 'description' => $e->getMessage())));

}finally{

	if(isset($conexion)){

		$conexion->close();

	}

}

?>