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
  <h1 id="google_translate_element">CV</h1>
  <h2 class="subtitulo"> Datos personales </h2>
    <h4 class="texto">Fecha de Nacimiento: <?php echo $row['FechaNacimiento']; ?> </h4>
    <h4>RFC: <?php echo $row['RFC']; ?> </h4>
    <h4>Ciudad: <?php echo $row['Ciudad']; ?> </h4>
    <h4>Código Postal: <?php echo $row['CP']; ?> </h4>
    <h4>Calle: <?php echo $row['Calle']; ?></h4>
    <h4>Número de Calle: <?php echo $row['NumCalle']; ?></h4>

  <br>
  <h2> Situación Laboral
   <h4>Situación Laboral: <?php echo $row['SitLaboral']; ?> </h4>
  </h2>
  <br>
  <h2> Experiencia Laboral
    <h4>Empresa: <?php echo $row['Empresa']; ?> </h4>
    <h4>Descripción: <?php echo $row['Descripcion']; ?> </h4>
    <h4>Fecha Inicial: <?php echo $row['FechaInicial']; ?> </h4>
    <h4>Fecha Final: <?php echo $row['FechaFinal']; ?> </h4>
  </h2>
  <br>
  <h2> Formación acádemica
  <h4>Escuela: <?php echo $row['Escuela']; ?> </h4>
  <h4> Carrera: <?php echo $row['Carrera']; ?> </h4>
  <h4>Grado de educación: <?php echo $row['GradoEducacion']; ?> </h4>
  <h4>Fecha de graduación: <?php echo $row['FechaGrad']; ?></h4>
  </h2>
  <br>
  <h2> Descripción
  <h4>Certificaciones: <?php echo $row['Certificaciones']; ?> </h4>
  <h4>Cursos: <?php echo $row['Cursos']; ?> </h4>
  <h4>Habilidades: <?php echo $row['Habilidades']; ?> </h4>
  </h2>
  <br>
</div>
<script type="text/javascript">
function googleTranslateElementInit() {
	new google.translate.TranslateElement({pageLanguage: 'es', includedLanguages: 'ca,eu,gl,en,fr,it,pt,de', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, gaTrack: true}, 'google_translate_element');
        }
</script>

<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</html>