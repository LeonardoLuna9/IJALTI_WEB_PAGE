<?php

@include 'config.php'; // Base de datos

session_start();

// $vacante1 = "SELECT * FROM vacantes WHERE ID_vacante = 1";
// $query = mysqli_query($conn, $vacante1);

// $row = mysqli_fetch_array($query);

$vacantedetalles =  $_SESSION['Vervacante'];
$detalles = "SELECT * FROM vacantes WHERE empresa = '$vacantedetalles'";
$querydetalles =  mysqli_query($conn, $detalles);
$rowdetalles = mysqli_fetch_array($querydetalles);

if (isset($_POST['Aplicate1'])){ 
  $_SESSION['Vacante'] = $rowdetalles['ID_vacante'];
  header('location:UsuProf2.php');
}

// if(!isset($_SESSION['CorreoElectronico'])){
//   header('location:IniciarSesion.php');
// }

// $CorreoElectronico = $_SESSION['CorreoElectronico'];

// $buscaUsuario = " SELECT * FROM usuario_prof WHERE correo = '$CorreoElectronico'"; //Prueba para ver si me valida 
// $validaUsuario = mysqli_query($conn, $buscaUsuario);
// if(mysqli_num_rows($validaUsuario) == 0){
//   $error[] = 'No existe usuario';
//   header('location:Cuenta.php');
// }

/* Validación para ver si ya tiene CV 
$select = " SELECT * FROM informacion_laboral WHERE correo = '$CorreoElectronico' AND empresa != NULL"; //Prueba para ver si me valida 

$result = mysqli_query($conn, $select);

if(mysqli_num_rows($result) > 0){

  $error[] = 'CV ya existe para usuario, vuleve a publicar si desea actualizar los datos';
}*/
// $verificar = "";

// if (isset($_POST['submit'])){ // Hacemos POST a base de datos
//   // Datos personales
//   $fechNac = strtotime($_POST['FechaNacimiento']);
//   $fechNac = date('Y-m-d H:i:s', $fechNac);
//   $rfc = mysqli_real_escape_string($conn, $_POST['RFC']);
//   $ciudad = mysqli_real_escape_string($conn, $_POST['Ciudad']);
//   $cp = mysqli_real_escape_string($conn, $_POST['CP']);
//   $calle = mysqli_real_escape_string($conn, $_POST['Calle']);
//   $numCalle = mysqli_real_escape_string($conn, $_POST['NumCalle']);

//   //Información laboral
//   $empresa = mysqli_real_escape_string($conn, $_POST['Empresa']);
//   $desc = mysqli_real_escape_string($conn, $_POST['Descripcion']);
//   $fechaInicial = strtotime($_POST["FechaInicial"]);
//   $fechaInicial = date('Y-m-d H:i:s', $fechaInicial);
//   $fechaFinal = strtotime($_POST["FechaFinal"]);
//   $fechaFinal = date('Y-m-d H:i:s', $fechaFinal);

//   // Educación
//   $escuela = mysqli_real_escape_string($conn, $_POST['Escuela']);
//   $carrera = mysqli_real_escape_string($conn, $_POST['Carrera']);
//   $gradEd =mysqli_real_escape_string($conn,$_POST['GradoEducacion']);
//   $fechaGrad =strtotime($_POST['FechaGrad']); 
//   $fechaGrad =date('Y-m-d H:i:s', $fechaGrad);

//   // Habilidades 
//   $habilidades = mysqli_real_escape_string($conn, $_POST['Habilidades']);
//   /*
//   $buscaUsuario = " SELECT * FROM usuario_prof WHERE correo = '$CorreoElectronico'"; //Prueba para ver si me valida 
//   $validaUsuario = mysqli_query($conn, $buscaUsuario);
//   if(mysqli_num_rows($validaUsuario) == 0){
//     $error[] = 'No existe usuario';
//     header('location:Cuenta.php');
//   }
//   else { */
    
//   // Update en usuario_prof
//   $insert1 = "UPDATE usuario_prof SET fechaNac = '$fechNac', codigo_postal = '$cp', ciudad = '$ciudad', num_calle = '$numCalle', calle = '$calle', RFC = '$rfc' WHERE correo = '$CorreoElectronico'";
//   mysqli_query($conn, $insert1);

//   // Update en informacion_laboral
//   $insert2 = "UPDATE informacion_laboral SET empresa = '$empresa', descripcion = '$desc', fechaInicial = '$fechaInicial', fechaFinal = '$fechaFinal' WHERE correo = '$CorreoElectronico'";
//   mysqli_query($conn, $insert2);

//   // Update en informacion_laboral
//   $insert3 = "UPDATE educacion SET escuela = '$escuela', carrera = '$carrera', gradoEducacion = '$gradEd', fechaGrad = '$fechaGrad' WHERE correo = '$CorreoElectronico'";
//   mysqli_query($conn, $insert3);

//   // Update en habilidades
//   $insert4 = "UPDATE habilidades SET experiencia_habil = '$habilidades' WHERE correo = '$CorreoElectronico'";
//   mysqli_query($conn, $insert4);

//   // Regresa a página principal
//   header('location:IntUsuProf.php');
//   //}

// };

?>

<!DOCTYPE html>
<html>
  <!--  This source code is exported from pxCode, you can get more document from https://www.pxcode.io  -->
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link
      rel="stylesheet"
      type="text/css"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
    <link rel="stylesheet" type="text/css" href="css/common.css" />
    <link rel="stylesheet" type="text/css" href="css/fonts.css" />
    <link rel="stylesheet" type="text/css" href="css/Vacanteprof.css" />

    <script type="text/javascript" src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script type="text/javascript" src="https://unpkg.com/headroom.js@0.12.0/dist/headroom.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/px2code/posize/build/v1.00.5.js"></script>
  </head>

  <body style="display: flex; flex-direction: column">
    <div class="vacanteprof vacanteprof-block layout">
      <div class="vacanteprof-cover-group2 layout">
        <div class="vacanteprof-cover-group1 layout" >
          <img class="Oracle" src="<?php echo $rowdetalles['LINK']; ?>">
    
         
        </div>

      </div>
  
      <div class="vacanteprof-group1 layout">
        <h5 class="vacanteprof-highlights4-box layout">

          <pre class="vacanteprof-highlights4"><span class="vacanteprof-highlights4-span0">
            
          
          
Descripción
</span><span class="vacanteprof-highlights4-span1"> <?php echo $rowdetalles['descripcion']; ?>


</span><span class="vacanteprof-highlights4-span2">Objetivo del puesto:
  
</span><span class="vacanteprof-highlights4-span3"> <?php echo $rowdetalles['obj_puesto']; ?>


</span><span class="vacanteprof-highlights4-span4">Perfil Deseado:
</span><span class="vacanteprof-highlights4-span5">
<?php echo $rowdetalles['perf_deseado']; ?>


</span><span class="vacanteprof-highlights4-span6">Conocimientos:
</span><span class="vacanteprof-highlights4-span7">
<?php echo $rowdetalles['conocimientos']; ?>


</span><span class="vacanteprof-highlights4-span8">Funciones:
</span><span class="vacanteprof-highlights4-span9">
<?php echo $rowdetalles['funciones']; ?></span></pre>
        </h5>
      </div>
      <div class="vacanteprof-group layout3">
        <div class="vacanteprof-group layout2"><div class="vacanteprof-group layout1"></div></div>
        <div class="vacanteprof-group layout">
          <div class="vacanteprof-group layout">
            <div class="vacanteprof-group layout">
              <div class="vacanteprof-group layout">
                <h2 class="vacanteprof-medium-title1-box layout">
                  <pre class="vacanteprof-medium-title1">
Empresa: <?php echo $rowdetalles['empresa']; ?> 
Índice de referencia salarial: <?php echo $rowdetalles['sueldo']; ?> 
Ubicación: <?php echo $rowdetalles['ubicacion']; ?> 
Nivel profesional: <?php echo $rowdetalles['nivel_prof']; ?>

Campo Profesional: <?php echo $rowdetalles['campo_prof']; ?>

Horarios: <?php echo $rowdetalles['horario']; ?> </pre
                  >
                  <br>
                </h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <form action="" method="post">
      <!-- <div class="vacanteprof-cover-block layout"><a href = "UsuProf1.php" style="text-decoration: none;"><div class="vacanteprof-text-body1 layout1">Aplicar ahora</div></a></div> -->
      <div class="vacanteprof-cover-block layout"><input type = "submit" name ="Aplicate1" value="Aplicar ahora" 
      style=
      "text-decoration: none; 
      font: 14px/1.57 'Abel', Helvetica, Arial, serif; color: white;
      position: relative;
      height: -webkit-min-content;
      height: -moz-min-content;
      height: min-content;
      margin: 11px 20px 11px 15px; 
      border: 0px;
      background-color: #0e6dff;">
      </div>
      </form>
      <div class="vacanteprof-paragraph-body layout2">
      <?php echo $rowdetalles['intro']; ?>
      </div>
      <div class="vacanteprof-group layout4">
        <h3 class="vacanteprof-subtitle layout"><?php echo $rowdetalles['nombre_vac']; ?></h3>
      </div>
      <div class="vacanteprof-text-body2 layout6">#software</div>
      <div class="vacanteprof-text-body2 layout7">#trabajo</div>
      <div class="vacanteprof-text-body2 layout8">#intern</div>
      <div class="vacanteprof-small-text-body layout1">Publicado hoy 5:20 pm</div>
      <px-posize
        x="1664fr 48px 16fr"
        y="7px 46px 1064px"
        absolute="true"
        lg-x="1664fr 48px 16fr"
        lg-y="6px 46px 809px"
        md-x="1664fr 48px 16fr"
        md-y="5px 46px 533px"
        sm-x="1664fr 48px 16fr"
        sm-y="5px 46px 297px"
        xs-x="1664fr 48px 16fr"
        xs-y="5px 46px 179px"
        xxs-x="1664fr 48px 16fr"
        xxs-y="5px 46px 61px"
        tn-x="1664fr 48px 16fr"
        tn-y="5px 46px 5px"
        ><a href = "IntUsuProf.php" style="text-decoration: none;"><div class="vacanteprof-icon8" style="--src:url(/assets/c39743a94e40f92fbc033634223cd9fd.png)"></div
      ></a></px-posize>

      <px-posize
        x="476fr 17px 1235fr"
        y="52px 27px 1038px"
        absolute="true"
        lg-x="476fr 17px 1235fr"
        lg-y="44px 27px 790px"
        md-x="476fr 17px 1235fr"
        md-y="36px 27px 521px"
        sm-x="476fr 17px 1235fr"
        sm-y="29px 27px 290px"
        xs-x="476fr 17px 1235fr"
        xs-y="25px 27px 175px"
        xxs-x="476fr 17px 1235fr"
        xxs-y="22px 27px 60px"
        tn-x="476fr 17px 1235fr"
        tn-y="20px 27px 5px"
        ><div
          class="vacanteprof-image14"
          style="--src:url(/assets/a51c9108a4402e7c5140055632e9aec0.png)"
        ></div></px-posize
      ><px-posize
        x="475fr 48px 1205fr"
        y="271px 16px 830px"
        absolute="true"
        lg-x="475fr 48px 1205fr"
        lg-y="212px 16px 633px"
        md-x="475fr 48px 1205fr"
        md-y="147px 16px 420px"
        sm-x="475fr 48px 1205fr"
        sm-y="92px 16px 237px"
        xs-x="475fr 48px 1205fr"
        xs-y="65px 16px 145px"
        xxs-x="475fr 48px 1205fr"
        xxs-y="37px 16px 54px"
        tn-x="475fr 48px 1205fr"
        tn-y="19px 16px 5px"
        ><div class="vacanteprof-image16" style="--src:url(/assets/b142754cb9a6537f63126106030836fe.png)"></div
      ></px-posize>
    </div>
    <script type="text/javascript">
      AOS.init();
    </script>
  </body>
</html>
