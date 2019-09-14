<?php 

include 'conexion.php';
$usuario = $_POST['usuario'];
$contrasena = md5($_POST['contrasena']);


$consulta="select * from usuarios where usuario = '$usuario' and pass = '$contrasena'";
$resultado = $conexion -> query($consulta);

if ($resultado -> num_rows == 0) {
	
	header("Location: Login.php?resultado=Usuario o contraseña Incorreca");

	die();

}else{

	$extraido= mysqli_fetch_array($resultado);

	header("Location: index.php?usuario=".$extraido['usuario']."");

	die();

}

$extraido= mysqli_fetch_array($resultado);

echo $extraido['usuario'];
$resultado -> close();


 ?>