<?php 

try{

  session_start();

  //require_once "validar_sesion.php";

  include 'conexion.php';

  if(!isset($_POST['titulo'],$_POST['subtitulo'],$_POST['etiquetas'],$_POST['cuerpo'],$_SESSION['id_usuario'])){

    header("Location: ../../noticias.php");
    return;

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
  unlink($target_file);

  $consulta="INSERT INTO noticias(titulo,subtitulo,etiquetas,imagen,cuerpo,fecha,id_usuario) VALUES ('$titulo','$subtitulo','$etiquetas','$imagen_final','$cuerpo',CURRENT_TIMESTAMP,'$id_usuario')";

  if(!$conexion->query($consulta)){

    throw new mysqli_sql_exception($conexion->error);

  }

  echo json_encode(array('status' => array('code' =>1 , 'description' => 'OK')));

}catch(mysqli_sql_exception $e){
	
	echo json_encode(array('status' => array('code' =>0 , 'description' => $e->getMessage())));

}catch (Exception $e) {

  echo json_encode(array('status' => array('code' =>0 , 'description' => $e->getMessage())));

}finally{ 

  if(isset($conexion)){

		$conexion->close();

	} 

}

?>