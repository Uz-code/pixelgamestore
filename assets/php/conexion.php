<?php

$hostname='localhost';
$database='game_store';
$username='root';
$password='';

$conexion=new mysqli($hostname,$username,$password,$database);
if ($conexion->connect_errno){
	echo "lo sentimos, el sitio web esta experimentando problemas";
} else {
	//echo "conexion ok";
}
?>