﻿<?php
  require_once "../core/modelo-usuarios.php";
  require_once "../core/modelo-programas.php";
  require_once "../core/modelo-orientaciones.php";
  require_once "../core/modelo-ciclos.php";
  require_once "modelo-asignaturas.php";
  require_once "modelo-docentes.php";
  require_once "modelo-aulas.php";
  require_once "modelo-calificaciones.php";
  require_once "modelo-alumnos.php";
  require_once "modelo-clases.php";
    
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Clases( );
  $obj2->id_clase = $_GET["id_clase"];
  $obj2->obtenerClase( );
  
  $obj3 = new Programas( );
  $obj3->id_programa = $obj2->id_programa;
  $obj3->obtenerPrograma( );
  
  $obj4 = new Ciclos( );
  $obj4->id_ciclo = $obj2->id_ciclo;
  $obj4->obtenerCiclo( );
  
  $obj5 = new Asignaturas( );
  $obj5->id_asignatura = $obj2->id_asignatura;
  $obj5->obtenerAsignatura( );
  
  $obj6 = new Docentes( );
  $obj6->id_docente = $obj2->id_docente;
  $obj6->obtenerDocente( );
  
  $obj7 = new Aulas( );
  $obj7->id_aula = $obj2->id_aula;
  $obj7->obtenerAula( );
  
  $obj8 = new Calificaciones( );
  $obj8->id_clase = $obj2->id_clase;
  $obj8->listaCalificacionesClase( );
  
  if( isset( $_GET["error"] ) ) 
  {
    $error = $_GET["error"];
    
    switch( $error )
    {
      case 1: $msg_error = "C&oacute;digo de alumno no v&aacute;lido."; break;
      case 2: $msg_error = "El c&oacute;digo ya se encuentra registrado."; break;
      case 3: $msg_error = "Se alcanz&oacute; el cupo m&aacute;ximo de la clase."; break;
    }
  }
  else
  {
    $error = 0;
  }
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sistema Integral de Informaci&oacute;n de Posgrados</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/general.css" rel="stylesheet" type="text/css">
<link href="../css/menu.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
function confirmarBaja( )
{
  if( confirm( "¿Desea eliminar el registro seleccionado?" ) )
  {
    return true;
  }
  else
  {
    return false;
  }
}
</script>
</head>

<body>
<table class="tablaExterior" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td>
      <?php require_once "../core/header.php"; ?>
    </td>
  </tr>
  <tr>
    <td>
      <?php require_once "../core/menu.php"; ?>
    </td>
  </tr>
  <tr height="100%" valign="top">
    <td>
      <table class="tablaInterior" border="0" cellspacing="4" cellpadding="0" align="center">
        <tr>
          <td width="10%">&nbsp;</td>
          <td width="40%">&nbsp;</td>
          <td width="40%">&nbsp;</td>
          <td width="10%">&nbsp;</td>
        </tr>
        <tr class="textoTitulos1">
          <td colspan="4">M&oacute;dulo Alumnos</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos2">
          <td colspan="4">Inscripci&oacute;n de alumnos</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <?php if( $error!=0 ) { ?>
        <tr>
          <td colspan="4" class="textoRojo"><?php echo $msg_error; ?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <?php } ?>
        <tr class="textoTablas1">
          <td colspan="4">DATOS DE LA CLASE</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td colspan="2">Programa:</td>
          <td colspan="2">Ciclo escolar:</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="2"><?php echo $obj3->nombre; ?>&nbsp;</td>
          <td colspan="2"><?php echo $obj4->nombre; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td colspan="2">Asignatura:</td>
          <td colspan="2">Docente:</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="2"><?php echo $obj5->nombre; ?>&nbsp;</td>
          <td colspan="2"><?php echo $obj6->apellido_paterno." ".$obj6->apellido_materno." ".$obj6->nombre; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td colspan="2">Aula:</td>
          <td colspan="2">NRC:</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="2"><?php echo $obj7->edificio."-".$obj7->aula; ?>&nbsp;</td>
          <td colspan="2"><?php echo $obj2->nrc; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td colspan="2">Cupo:</td>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="2"><?php echo $obj2->cupo; ?>&nbsp;</td>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <form id="form1" name="form1" method="post" action="inscripcion-alumnos3.php">
        <tr class="textoTablas1">
          <td colspan="4">DATOS DE INSCRIPCI&Oacute;N</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td colspan="4">C&oacute;digo &bull;</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="4">
          <input type="text" name="codigo" size="25" maxlength="50" required="required" />
          <input type="submit" name="submit" value="   Enviar   " />
          <input type="hidden" name="id_clase" value="<?php echo $obj2->id_clase; ?>" />
          </td>
        </tr>
        </form>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTablas1">
          <td>C&Oacute;DIGO</td>
          <td>NOMBRE</td>
          <td>ORIENTACI&Oacute;N</td>
          <td>ACCIONES</td>
        </tr>
        <?php
	  $max = count( $obj8->id_calificacion );
          
          for( $i=0; $i<$max; $i++ )
          {
	    $obj9 = new Alumnos( );
            $obj9->id_alumno = $obj8->id_alumno[$i];
            $obj9->obtenerAlumno( );
	    
	    $obj10 = new Orientaciones( );
            $obj10->id_orientacion = $obj9->id_orientacion;
            $obj10->obtenerOrientacion( );
	?>
        <tr class="textoTablas2">
          <td><?php echo $obj9->codigo; ?>&nbsp;</td>
          <td><?php echo $obj9->apellido_paterno." ".$obj9->apellido_materno." ".$obj9->nombre; ?>&nbsp;</td>
          <td><?php echo $obj10->nombre; ?>&nbsp;</td>
          <td>
            <table border="0" cellspacing="0" cellpadding="0" align="center">
              <tr>
                <td>
                <form id="form2" name="form2" method="post" action="inscripcion-alumnos4.php" onclick="return confirmarBaja( )">
                <input type="image" name="submit" src="../images/icon-delete.png" />
                <input type="hidden" name="id_clase" value="<?php echo $obj2->id_clase; ?>" />
                <input type="hidden" name="id_calificacion" value="<?php echo $obj8->id_calificacion[$i]; ?>" />
                </form>
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <?php
	  }
	?>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td>
      <?php require_once "../core/footer.php"; ?>
    </td>
  </tr>
</table>
</body>
</html>