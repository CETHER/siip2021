<?php
  header( "Content-Type: application/vnd.ms-excel" );
  header( "Content-Disposition: attachment; filename=reporte-revalidaciones-alumnos.xls" );
  
  require_once "../core/modelo-usuarios.php";
  require_once "modelo-alumnos.php";
  require_once "modelo-revalidaciones-alumnos.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Alumnos( );
  $obj2->id_alumno = $_GET["id_alumno"];
  $obj2->obtenerAlumno( );
  
  $obj3 = new Revalidaciones_Alumnos( );
  $obj3->id_alumno = $obj2->id_alumno;
  $obj3->listaRevalidacionesAlumno( );
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sistema Integral de Informaci&oacute;n de Posgrados</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
  <table>
    <tr>
      <td colspan="4">M&oacute;dulo Alumnos</td>
    </tr>
    <tr>
      <td colspan="4">Revalidaci&oacute;n de estudios</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">Nombre:</td>
    </tr>
    <tr>
      <td colspan="4"><?php echo $obj2->apellido_paterno." ".$obj2->apellido_materno." ".$obj2->nombre; ?></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td>ID</td>
      <td>ASIGNATURAS CURSADAS</td>
      <td>INSTITUCI&Oacute;N EDUCATIVA</td>
      <td>DEPARTAMENTO O FACULTAD</td>
      <td>TUTOR EXTERNO</td>
      <td>PA&Iacute;S</td>
      <td>CIUDAD</td>
      <td>FECHA DE INICIO</td>
      <td>FECHA DE T&Eacute;RMINO</td>
      <td>APOYO FINANCIERO</td>
      <td>MONTO FINANCIERO</td>
      <td>FUENTE DE FINANCIAMIENTO</td>
      <td>REVALIDACI&Oacute;N</td>
    </tr>
    <?php
      $max = count( $obj3->id_revalidacion_alumno );
      
      for( $i=0; $i<$max; $i++ )
      {
    ?>
    <tr>
      <td><?php echo $obj3->id_revalidacion_alumno[$i]; ?></td>
      <td><?php echo $obj3->asignaturas[$i]; ?></td>
      <td><?php echo $obj3->institucion[$i]; ?></td>
      <td><?php echo $obj3->departamento[$i]; ?></td>
      <td><?php echo $obj3->tutor[$i]; ?></td>
      <td><?php echo $obj3->pais[$i]; ?></td>
      <td><?php echo $obj3->ciudad[$i]; ?></td>
      <td><?php echo $obj3->fecha_inicio[$i]; ?></td>
      <td><?php echo $obj3->fecha_termino[$i]; ?></td>
      <td><?php echo $obj3->apoyo_financiero_txt[$i]; ?></td>
      <td><?php echo $obj3->monto_financiero[$i]; ?></td>
      <td><?php echo $obj3->fuente_financiamiento[$i]; ?></td>
      <td><?php echo $obj3->revalidacion[$i]; ?></td>
    </tr>
    <?php
      }
    ?>
  </table>
</body>
</html>