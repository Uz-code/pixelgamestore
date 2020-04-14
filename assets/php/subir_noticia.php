<?php 

try{

  session_start();

  //require_once "validar_sesion.php";

  include 'conexion.php';

  if(!isset($_POST['titulo'],$_POST['subtitulo'],$_POST['etiquetas'],$_POST['cuerpo'],$_SESSION['id_usuario'])){

    throw new Exception("No se recibieron datos");

  }

  $titulo = htmlentities($_POST['titulo'],ENT_QUOTES,'UTF-8');
  $subtitulo = htmlentities($_POST['subtitulo'],ENT_QUOTES,'UTF-8');
  $etiquetas = htmlentities($_POST['etiquetas'],ENT_QUOTES,'UTF-8');
  $cuerpo = nl2br(htmlentities($_POST['cuerpo'],ENT_QUOTES,'UTF-8'));
  $id_usuario = $_SESSION['id_usuario'];

  if(empty($_POST['titulo'] || empty($_POST['subtitulo']) || empty($_POST['etiquetas']) || empty($_POST['cuerpo']))){

    throw new Exception("Campos vacios");
      
  }

  if($_FILES["imagen"]["size"]>500000){

    throw new Exception("Imagen demasiado pesada");

  }
  //$image = new Imagick('./carpeta/subcarpeta/sub-subcarpeta/imagen.png');
  $target_file = basename($_FILES["imagen"]["name"]);
  //$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);
  // codifico el archivo a 64 bits #
  $contenidoImagen = file_get_contents($target_file);
  $imagen_final = base64_encode($contenidoImagen);
  //echo "<img width='450' border='0' src='data:image/jpg;base64,".$imagen_final."'>";
  $consulta="INSERT INTO noticias(titulo,subtitulo,etiquetas,imagen,cuerpo,fecha,id_usuario) VALUES ('$titulo','$subtitulo','$etiquetas','$imagen_final','$cuerpo',CURRENT_TIMESTAMP,'$id_usuario')";

  mysqli_query($conexion, $consulta) or die ("Problemas al subir noticia: ".mysqli_error($conexion));

  unlink($target_file);

  header("Location: ../../noticias.php");

}catch (Exception $e) {

  echo($e->getMessage());

}finally{ 

  mysqli_close($conexion); 

}

?>