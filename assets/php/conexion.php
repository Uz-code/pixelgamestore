<?php

mysqli_report(MYSQLI_REPORT_STRICT);

$hostname='localhost';
$database='game_store';
$username='root';
$password='';

$conexion=new mysqli($hostname,$username,$password,$database);

?>