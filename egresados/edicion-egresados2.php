<?php
  require_once "../core/modelo-usuarios.php";
  require_once "modelo-egresados.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Egresados( );
  $obj2->id_egresado = $_POST["id_egresado"];
  $obj2->id_ciclo = $_POST["id_ciclo"];
  $obj2->fecha = $_POST["fecha"];
  $obj2->modificarEgresado( );
  
  header( "Location: edicion-egresados3.php?id_alumno=".$_POST["id_alumno"] );
  exit( );
?>