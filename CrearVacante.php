<?php

@include 'config.php'; // Base de datos

session_start();

//Verificamos usuario reclutador 
 
if(!isset($_SESSION['CorreoElectronico'])){
  header('location:IniciarSesion.php');
}

$correoValida = $_SESSION['CorreoElectronico'];

// Verificar en base de datos
$buscaUsuario = " SELECT * FROM reclutador WHERE correo = '$correoValida'"; //Prueba para ver si me valida 
$validaUsuario = mysqli_query($conn, $buscaUsuario);
if(mysqli_num_rows($validaUsuario) == 0){
  $error[] = 'No existe usuario';
  header('location:Cuenta.php');
}

// Terminamos de verificar

if (isset($_POST['submit'])){ // Hacemos POST a base de datos
  // Datos vacante
  $NombreVacante = mysqli_real_escape_string($conn,$_POST['NombreVacante']);
  $IntroResumen = mysqli_real_escape_string($conn,$_POST['IntroResumen']);
  $Sueldo = mysqli_real_escape_string($conn, $_POST['Sueldo']);
  $Ubicacion = mysqli_real_escape_string($conn, $_POST['Ubicacion']);
  $NivelProf = mysqli_real_escape_string($conn, $_POST['NivelProf']);
  $CampoProf = mysqli_real_escape_string($conn, $_POST['CampoProf']);
  $Descripcion = mysqli_real_escape_string($conn, $_POST['Descripcion']);
  $ObjPuesto = mysqli_real_escape_string($conn, $_POST['ObjPuesto']);
  $PerfDeseado = mysqli_real_escape_string($conn, $_POST['PerfDeseado']);
  $Horario = mysqli_real_escape_string($conn, $_POST['Horario']);
  $Conocimientos = mysqli_real_escape_string($conn, $_POST['Conocimientos']);
  $Funciones = mysqli_real_escape_string($conn, $_POST['Funciones']);


  $consigueCIFNIF = "SELECT * from reclutador WHERE correo = '$CorreoElectronico'";
  $query = mysqli_query($conn, $consigueCIFNIF);
  $row = mysqli_fetch_array($query);

  $CIFNIF = $row['CIF_NIF'];

  $consigueEmpresa = "SELECT * from empresarial WHERE CIF_NIF = '$CIFNIF'";
  $query1 = mysqli_query($conn, $consigueEmpresa);
  $row1 = mysqli_fetch_array($query1);

  $empresa = $row1['nombre_empresa'];

  //Falta post de Empresa y CIFNIF
  $insertvacante = "INSERT INTO vacantes(nombre_vac, intro, empresa, sueldo, ubicacion, nivel_prof, campo_prof, descripcion, obj_puesto, perf_deseado, horario, conocimientos, funciones, CIF_NIF) VALUES ('$NombreVacante', '$IntroResumen', '$empresa', '$Sueldo', '$Ubicacion' ,'$NivelProf', '$CampoProf', '$Descripcion','$ObjPuesto', '$PerfDeseado', '$Horario', '$Conocimientos', '$Funciones', '$CIFNIF')";
    mysqli_query($conn, $insertvacante);

  // Regresa a página principal empresa
  header('location:IntEmpCrear.php');
  //}
};

?>

<!DOCTYPE html>
<html>
<!--  This source code is exported from pxCode, you can get more document from https://www.pxcode.io  -->

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
  <link rel="stylesheet" type="text/css" href="css/common.css" />
  <link rel="stylesheet" type="text/css" href="css/fonts.css" />
  <link rel="stylesheet" type="text/css" href="css/CrearVacante.css" />

  <script type="text/javascript" src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script type="text/javascript" src="https://unpkg.com/headroom.js@0.12.0/dist/headroom.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/px2code/posize/build/v1.00.5.js"></script>
</head>

<body style="display: flex; flex-direction: column">
  <div class="crear-cv crear-cv-block layout">
    <div class="crear-cv-flex layout">
      <div class="crear-cv-flex1 layout">
        <h1 class="crear-cv-big-title layout">Creacion de vacantes <?php echo $_SESSION['CorreoElectronico'] ?></h1>
        <div class="crear-cv-flex1-spacer">
        </div>
        <div class="crear-cv-flex1-item">
          <div class="crear-cv-block14 layout">
            <div style="--src:url(/assets/e1b8c76181004a3e9e95a1151056a5c1.png)" class="crear-cv-icon1 layout">
            </div>
          </div>
        </div>
        <div class="crear-cv-flex1-spacer1">
        </div>
        <div class="crear-cv-flex1-item">
          <div class="crear-cv-block15 layout">
            <div style="--src:url(/assets/601449fdf3b988c9624f92ad1efe381a.png)" class="crear-cv-image4 layout">
            </div>
          </div>
        </div>
        <div class="crear-cv-flex1-spacer2">
        </div>
        <div class="crear-cv-flex1-item">
          <div style="--src:url(/assets/6db786cae790c9b78f84af356252d24b.png)" class="crear-cv-icon2 layout">
          </div>
        </div>
      </div>
      <div class="crear-cv-flex7 layout">
        <form action="" method="post" class="form1">
        <?php
          if (isset($error)) {
            foreach ($error as $error) {
              echo '<span class ="msgerror" 
                style = "font: 16px/2.18 Abel, Helvetica, Arial, serif;
                letter-spacing: 1.28px; 
                color: red;
                padding-left: 35%;">' . $error . '</span>';
            }
          }
        ?>
        <h5 class="crear-cv-highlights layout">Datos vacante</h5>
        <div class="crear-cv-block3 layout">
          <input class="crear-cv-small-text-body1 layout" type = "text" placeholder="Nombre Vacante" name="NombreVacante" pattern="{40}" maxlength="40" required>
          <hr class="cuenta-line1 layout" />
        </div>
        <div class="crear-cv-block3 layout">
          <textarea class="crear-cv-small-text-body1 layout" type = "text" rows="10" cols="45" placeholder="Resumen: Maximo 500 Caracteres" name="IntroResumen" maxlength = "500" required></textarea>
          <hr class="cuenta-line1 layout" />
        </div>
        <div class="crear-cv-block3 layout">
          <input class="crear-cv-small-text-body1 layout" type = "text" placeholder="Sueldo" name="Sueldo" pattern="{20}" maxlength="20" required>
          <hr class="cuenta-line1 layout" />
        </div>
         <div class="crear-cv-block3 layout">
          <input class="crear-cv-small-text-body1 layout" type = "text" placeholder="Ubicacion" name="Ubicacion" pattern="{30}" maxlength="30" required>
          <hr class="cuenta-line1 layout" />
         </div>
        <div class="crear-cv-block3 layout">
          <select name="NivelProf" id="NivelProf" required>
            <optgroup label="Nivel Profesional">
            <option value="Licenciatura">Licenciatura</option>
            <option value="Maestria">Maestria</option>
            <option value="Doctorado">Doctorado</option>
            </select>           
          <hr class="cuenta-line1 layout" />
        </div>
        <div class="crear-cv-block3 layout">
          <input class="crear-cv-small-text-body1 layout" type = "text" placeholder="Campo Profesional" name="CampoProf" pattern="{30}" maxlength="30" required>            
          <hr class="cuenta-line1 layout" />
        </div>
        <div class="crear-cv-block3 layout">
          <textarea class="crear-cv-small-text-body1 layout" type = "text" rows="10" cols="45" placeholder="Descripcion: Maximo 500 Caracteres" name="Descripcion" maxlength = "500" required></textarea>
          <hr class="cuenta-line1 layout" />
        </div>
        <div class="crear-cv-block3 layout">
          <input class="crear-cv-small-text-body1 layout" type = "text" placeholder="Objetivo del Puesto" name="ObjPuesto" pattern="{30}" maxlength="30" required>            
          <hr class="cuenta-line1 layout" />
        </div>
        <div class="crear-cv-block3 layout">
          <textarea class="crear-cv-small-text-body1 layout" type = "text" rows="10" cols="45" placeholder="Perfil deseado" name="PerfDeseado" maxlength = "500" required></textarea>
          <hr class="cuenta-line1 layout" />
        </div>
        <div class="crear-cv-block3 layout">
          <textarea class="crear-cv-small-text-body1 layout" type = "text" rows="10" cols="45" placeholder="Horarios" name="Horario" maxlength = "100" required></textarea>
          <hr class="cuenta-line1 layout" />
        </div>
        <!-- <div class="crear-cv-block3 layout">
          Hora Inicio <input class="crear-cv-small-text-body1 layout" type = "time"  name="HorarioI" value ="09:00"required>            
          <hr class="cuenta-line1 layout" />
        </div>
        <div class="crear-cv-block3 layout">
          Hora Final <input class="crear-cv-small-text-body1 layout" type = "time"  name="HorarioF" value ="17:00"required>            
          <hr class="cuenta-line1 layout" />
        </div>
        -->
        <div class="crear-cv-block3 layout">
          <input class="crear-cv-small-text-body1 layout" type = "text" placeholder="Conocimientos" name="Conocimientos" pattern="{50}" maxlength="50" required>            
          <hr class="cuenta-line1 layout" />
        </div>
        <div class="crear-cv-block3 layout">
          <textarea class="crear-cv-small-text-body1 layout" type = "text" rows="10" cols="45" placeholder="Funciones: Maximo 500 Caracteres" name="Funciones" maxlength = "500" required></textarea>
          <hr class="cuenta-line1 layout" />
        </div>
        <input type = "submit" name ="submit" value="Publicar" class="crear-cv-cover-block layout">
        </form>
    </div> 
  </div>
</body>

</html>