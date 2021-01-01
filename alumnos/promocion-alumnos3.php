<?php
  require_once "../core/modelo-usuarios.php";
  require_once "modelo-alumnos.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Alumnos( );
  $obj2->id_alumno = $_POST["id_alumno"];
  $obj2->id_ciclo = $_POST["id_ciclo"];
  $obj2->fecha = $_POST["fecha"];
  $obj2->promocionarAlumno( );
  
  header( "Location: promocion-alumnos4.php?id_alumno=$obj2->id_alumno" );
  exit( );
?>