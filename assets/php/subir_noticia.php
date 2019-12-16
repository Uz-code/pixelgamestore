<?php 

session_start();

$titulo = $_POST['titulo'];
$subtitulo = $_POST['subtitulo'];
$etiquetas = $_POST['etiquetas'];
$cuerpo = nl2br($_POST['cuerpo']);

if(!isset($_SESSION['id_usuario']) || strlen($titulo) <= 0 || strlen($subtitulo) <= 0 || strlen($etiquetas) <= 0 || strlen($cuerpo) <= 0){

  header("Location: ../../noticias.php");

  exit();

}

$id_usuario = $_SESSION['id_usuario'];

include 'conexion.php';

$target_file = basename($_FILES["imagen"]["name"]);
//$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);
//// codifico el archivo a 64 bits #
$contenidoImagen = file_get_contents($target_file);
$imagen_final = base64_encode($contenidoImagen);
//echo "<img width='450' border='0' src='data:image/jpg;base64,".$imagen_final."'>";

$consulta="INSERT INTO noticias(titulo,subtitulo,etiquetas,imagen,cuerpo,fecha,id_usuario) VALUES ('$titulo','$subtitulo','$etiquetas','$imagen_final','$cuerpo',CURRENT_TIMESTAMP,'$id_usuario')";

mysqli_query($conexion, $consulta) or die ("Problemas al subir noticia".mysqli_error($conexion));
mysqli_close ($conexion);
header("Location: ../../noticias.php");

unlink($target_file);

?>