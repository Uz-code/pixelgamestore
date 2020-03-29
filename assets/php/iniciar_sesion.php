<?php 

session_start();

if(isset($_SESSION["usuario"]) || !isset($_SESSION["paginaAnterior"])){

	header("Location: ../../ index.php");

	exit();

}

include 'conexion.php';

$usuario = $_REQUEST['usuario'];
$contrasena = md5($_REQUEST['contrasena']);
$paginaAnterior = $_SESSION['paginaAnterior'];

$consulta="SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
$resultado = $conexion -> query($consulta);

//echo mysqli_fetch_array($resultado);

if ($resultado -> num_rows == 0) {
	
	$_SESSION['error'] = "El nombre o contraseña son incorrectos";

	header("Location: ../../login.php?paginaAnterior=".$paginaAnterior."");

}else{

	$extraido= mysqli_fetch_array($resultado);

	$_SESSION['usuario'] = $extraido['usuario'];

	$_SESSION['id_usuario'] = $extraido['id_usuario'];

	header("Location: ../../".$paginaAnterior."");

}

?>