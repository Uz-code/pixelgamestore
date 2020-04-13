<?php 

session_start();

if( isset($_SESSION["usuario"]) || !isset($_REQUEST['usuario'],$_REQUEST['contrasena'],$_REQUEST['recordar'])){

	header("Location: ../../".$_SESSION["paginaAnterior"]);

	//exit();

}else{

	$usuario = $_REQUEST['usuario'];
	$contrasena = md5($_REQUEST['contrasena']);
	$recordar = filter_var($_REQUEST['recordar'], FILTER_VALIDATE_BOOLEAN);
	$paginaAnterior = $_SESSION['paginaAnterior'];
	
	echo iniciarSesion($usuario,$contrasena,$recordar);
	
}

function iniciarSesion($usuario,$contrasena,$recordar) {

	include 'conexion.php';

  $consulta="SELECT id_usuario, usuario FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
	$resultado = $conexion -> query($consulta);

	//echo mysqli_fetch_array($resultado);

	if ($resultado -> num_rows == 0) {

		return json_encode(array('response' => 0));

	}else{

		$extraido= mysqli_fetch_array($resultado);

		$id_usuario=$extraido['id_usuario'];

		if($recordar == true){

			$cookie= md5($extraido['usuario'].$id_usuario.date('d-m-Y H:i:s'));	

			setcookie("cookie", $cookie, time()+(60*60*24*365), '/', NULL, 0);

			$consulta="UPDATE usuarios SET cookie='$cookie' WHERE id_usuario='$id_usuario'";
			
			mysqli_query($conexion, $consulta) or die ("Problemas: ".mysqli_error($conexion));

		}else{

			$_SESSION['usuario'] = $extraido['usuario'];
  
			$_SESSION['id_usuario'] = $extraido['id_usuario'];

			setcookie("cookie", null, time() - 3600, "/");

		}

		return json_encode(array('response' => 1));

	}

	mysqli_close($conexion); 

}

?>