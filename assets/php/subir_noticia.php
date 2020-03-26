<?php 

try{

  session_start();

  include 'conexion.php';

  if(isset($_POST['titulo']) || isset($_POST['subtitulo']) || isset($_POST['etiquetas']) || isset($_POST['cuerpo']) || isset($_POST['id_usuario'])){

    $titulo = $_POST['titulo'];
    $subtitulo = $_POST['subtitulo'];
    $etiquetas = $_POST['etiquetas'];
    $cuerpo = nl2br($_POST['cuerpo']);
    $id_usuario = $_SESSION['id_usuario'];

    if(strlen($titulo) <= 0 || strlen($subtitulo) <= 0 || strlen($etiquetas) <= 0 || strlen($cuerpo) <= 0){

      throw new Exception();
      
    }

    $target_file = basename($_FILES["imagen"]["name"]);
    //$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);
    //// codifico el archivo a 64 bits #
    $contenidoImagen = file_get_contents($target_file);
    $imagen_final = base64_encode($contenidoImagen);
    //echo "<img width='450' border='0' src='data:image/jpg;base64,".$imagen_final."'>";

    $consulta="INSERT INTO noticias(titulo,subtitulo,etiquetas,imagen,cuerpo,fecha,id_usuario) VALUES ('$titulo','$subtitulo','$etiquetas','$imagen_final','$cuerpo',CURRENT_TIMESTAMP,'$id_usuario')";

    mysqli_query($conexion, $consulta) or die ("Problemas al subir noticia: ".mysqli_error($conexion));

    unlink($target_file);

    header("Location: ../../noticias.php");
    
  }else{

    throw new Exception();

  }

}catch (Exception $e) {

  header("Location: ../../noticias.php");

}finally{ 

  mysqli_close($conexion); 

}

?>