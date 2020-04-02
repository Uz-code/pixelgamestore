<?php 

session_start();

if( isset($_SESSION["usuario"]) || !isset($_REQUEST['usuario'],$_REQUEST['contrasena'],$_REQUEST['email'])){

	header("Location: ../../".$_SESSION["paginaAnterior"]);

}else{

  $usuario = $_REQUEST['usuario'];
  $email = $_REQUEST['email'];
	$contrasena = md5($_REQUEST['contrasena']);
  $paginaAnterior = $_SESSION['paginaAnterior'];
  $recordar = true;

  require 'conexion.php';

	$consulta="SELECT usuario FROM usuarios WHERE usuario = '$usuario' OR email = '$email'";
  $resultado = $conexion -> query($consulta);

	if ($resultado -> num_rows == 0) {
    
    $consulta="INSERT INTO usuarios (usuario,email,contrasena) VALUES ('$usuario','$email','$contrasena')";

    mysqli_query($conexion, $consulta) or die ("Problemas Creando Usuario: ".mysqli_error($conexion));

    $consulta="SELECT id_usuario, usuario FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";

    $extraido= mysqli_fetch_array($conexion -> query($consulta));

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
    
    echo json_encode(array('success' => 1));

	}else{

		echo json_encode(array('success' => 3));

  }
  mysqli_close($conexion); 
}
?>