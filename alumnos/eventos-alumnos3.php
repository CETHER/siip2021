<?php
  require_once "../core/modelo-usuarios.php";
  require_once "modelo-eventos-alumnos.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Eventos_Alumnos( );
  $obj2->id_evento_alumno = $_POST["id_evento_alumno"];
  $obj2->id_alumno = $_POST["id_alumno"];
  $obj2->eliminarEvento( );
  
  header( "Location: eventos-alumnos.php?id_alumno=$obj2->id_alumno" );
  exit( );
?>