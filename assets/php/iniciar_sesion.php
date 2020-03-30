<?php 

session_start();

include 'conexion.php';

if(isset($_SESSION["usuario"]) || !isset($_SESSION["paginaAnterior"])){

	header("Location: ../../index.php");

	exit();

}

$usuario = $_REQUEST['usuario'];
$contrasena = md5($_REQUEST['contrasena']);
$paginaAnterior = $_SESSION['paginaAnterior'];

$consulta="SELECT id_usuario, usuario FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
$resultado = $conexion -> query($consulta);

//echo mysqli_fetch_array($resultado);

if ($resultado -> num_rows == 0) {
	
	$_SESSION['error'] = "El nombre o contraseña son incorrectos";

	header("Location: ../../login.php");

}else{

	$extraido= mysqli_fetch_array($resultado);

	$cookie= md5($extraido['usuario'].$extraido['id_usuario'].date('d-m-Y H:i:s'));

	$id_usuario=$extraido['id_usuario'];

	setcookie("cookie", $cookie, time()+(60*60*24*365), '/', NULL, 0);

	$consulta="UPDATE usuarios SET cookie='$cookie' WHERE id_usuario='$id_usuario'";
	
	mysqli_query($conexion, $consulta) or die ("Problemas: ".mysqli_error($conexion));

	header("Location: ../../".$paginaAnterior."");

}

?>