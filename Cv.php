<?php
@include 'config.php'; // Base de datos

session_start();

//Verificamos usuario 
 
if(!isset($_SESSION['CorreoElectronico'])){
  header('location:index.php');
}

$correoValida = $_SESSION['CorreoElectronico'];

// Verificar en base de datos
$buscaUsuario = " SELECT * FROM usuarios WHERE correo = '$correoValida'"; //Prueba para ver si me valida 
$validaUsuario = mysqli_query($conn, $buscaUsuario);
if(mysqli_num_rows($validaUsuario) == 0){
  $error[] = 'No existe usuario';
  header('location:index.php');
}

// Terminamos de verificar

$correoUsuario = $_SESSION['CorreoAplicantePerfil'];

// usuarios
$usuarioNombre = "SELECT * FROM usuarios WHERE correo = '$correoUsuario'"; 
$queryUsuarioNombre = mysqli_query($conn, $usuarioNombre);
$rowNombre = mysqli_fetch_array($queryUsuarioNombre);

// usuario_prof
$usuario = "SELECT * FROM usuario_prof WHERE correo = '$correoUsuario'"; 
$queryUsuario = mysqli_query($conn, $usuario);
$row = mysqli_fetch_array($queryUsuario);

// informacion_laboral
$usuarioInfoLab = "SELECT * FROM informacion_laboral WHERE correo = '$correoUsuario'"; 
$queryUsuarioInfoLab = mysqli_query($conn, $usuarioInfoLab);
$rowInfoLab = mysqli_fetch_array($queryUsuarioInfoLab);

// educacion
$usuarioEdu = "SELECT * FROM educacion WHERE correo = '$correoUsuario'"; 
$queryEdu = mysqli_query($conn, $usuarioEdu);
$rowEdu = mysqli_fetch_array($queryEdu);

// certificaciones
$usuarioCert = "SELECT * FROM certificaciones WHERE correo = '$correoUsuario'"; 
$queryCert = mysqli_query($conn, $usuarioCert);
$rowCert = mysqli_fetch_array($queryCert);

// cursos
$usuarioCursos = "SELECT * FROM cursos WHERE correo = '$correoUsuario'"; 
$queryCursos = mysqli_query($conn, $usuarioCursos);
$rowCursos = mysqli_fetch_array($queryCursos);

// cursos
$usuarioHab = "SELECT * FROM habilidades WHERE correo = '$correoUsuario'"; 
$queryHab = mysqli_query($conn, $usuarioHab);
$rowHab = mysqli_fetch_array($queryHab);

?>

<!DOCTYPE html>
<html>
<!--  This source code is exported from pxCode, you can get more document from https://www.pxcode.io  -->

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <link rel="stylesheet" type="text/css" href="css/cv.css" />
  <link rel="stylesheet" type="text/css" href="css/fonts.css" />

</head>

<div>
  <br><br>
  <div id="header"></div>
  <div class="left"></div>
  <div class="stuff"> 
  <h1 id="google_translate_element" class=""title >CV</h1>
  <br><br>
  <h2 class="head"> Nombre</h2><br>
  <h4><?php echo $rowNombre['nombre']. '&nbsp'. $rowNombre['apellidoP']. '&nbsp'. $rowNombre['apellidoM']; ?> </h4>
  <br>
  <h2 class="head"> Datos personales </h2><br>
    <h4>Fecha de Nacimiento: <?php echo $row['fechaNac']; ?> </h4>
    <h4>RFC: <?php echo $row['RFC']; ?> </h4>
    <h4>Ciudad: <?php echo $row['ciudad']; ?> </h4>
    <h4>Código Postal: <?php echo $row['codigo_postal']; ?> </h4>
    <h4>Calle: <?php echo $row['calle']; ?></h4>
    <h4>Número de Calle: <?php echo $row['num_calle']; ?></h4>

  <br>
  <h2 class="head"> Situación Laboral </h2> <br>
   <h4>Situación Laboral: <?php echo $row['sitLab']; ?> </h4>
  <br>
  <h2 class="head"> Experiencia Laboral</h2> <br>
    <h4>Empresa: <?php echo $rowInfoLab['empresa']; ?> </h4>
    <h4>Descripción: <?php echo $rowInfoLab['descripcion']; ?> </h4>
    <h4>Fecha Inicial: <?php echo $rowInfoLab['fechaInicial']; ?> </h4>
    <h4>Fecha Final: <?php echo $rowInfoLab['fechaFinal']; ?> </h4>
  <br>
  <h2 class="head"> Formación acádemica</h2> <br>
  <h4>Escuela: <?php echo $rowEdu['escuela']; ?> </h4>
  <h4> Carrera: <?php echo $rowEdu['carrera']; ?> </h4>
  <h4>Grado de educación: <?php echo $rowEdu['gradoEducacion']; ?> </h4>
  <h4>Fecha de graduación: <?php echo $rowEdu['fechaGrad']; ?></h4>
  <br>
  <h2 class="head"> Descripción </h2> <br>
  <h4>Certificaciones: <?php echo $rowCert['certificacion']; ?> </h4>
  <h4>Cursos: <?php echo $rowCursos['curso']; ?> </h4>
  <h4>Habilidades: <?php echo $rowHab['experiencia_habil']; ?> </h4>
  <br>
</div>
<script type="text/javascript">
function googleTranslateElementInit() {
	new google.translate.TranslateElement({pageLanguage: 'es', includedLanguages: 'ca,eu,gl,en,fr,it,pt,de', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, gaTrack: true}, 'google_translate_element');
        }
</script>

<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</html>