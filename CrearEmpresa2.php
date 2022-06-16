<?php

@include 'config.php'; // Base de datos
session_start();

$reclutador = $_SESSION['Reclutador'];

if (isset($_POST['submit'])) {
  $cif_nif = mysqli_real_escape_string($conn, $_POST['CIF']);
  $nombreEmpresa = mysqli_real_escape_string($conn, $_POST['NombreEmpresa']); 
  $correoEmpr = mysqli_real_escape_string($conn, $_POST['CorreoElectronicoEmpresarial']);
  $descripcion = mysqli_real_escape_string($conn, $_POST['DescEmpresa']);
  $telefonoEmpr = mysqli_real_escape_string($conn, $_POST['TelEmp']);

  $select = " SELECT * FROM empresarial WHERE CIF_NIF = '$cif_nif'";

  $result = mysqli_query($conn, $select);

  // $insert = "INSERT INTO empresa(correo, nombre, apellidoP, apellidoM, contraseña) VALUES ('$correo', '$nombre','$apellidoP' ,'$apellidoM', '$contraseña')";
  //     mysqli_query($conn, $insert);

  if (mysqli_num_rows($result) > 0) {

    $error[] = 'Empresa ya existe';
  } else {
    /*if ($contraseña != $RepContraseña) {
      $error[] = "Contraseña no coincide";
    } else {*/
      $insert = "INSERT INTO empresarial(CIF_NIF, correoEmpresa, descripcion, telefonoEmpr, nombre_empresa) VALUES ('$cif_nif', '$correoEmpr','$descripcion' ,'$telefonoEmpr', '$nombreEmpresa')";
      mysqli_query($conn, $insert);

      $insert2 = "INSERT INTO reclutador(correo, CIF_NIF) VALUES ('$reclutador', '$cif_nif')";
      mysqli_query($conn, $insert2);

      header('location:IniciarSesion.php');
  }
};

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
  <link rel="stylesheet" href="css/common.css" />
  <link rel="stylesheet" href="css/fonts.css" />
  <link rel="stylesheet" href="css/Cuenta.css" />
  <script type="text/javascript" src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script type="text/javascript" src="https://unpkg.com/headroom.js@0.12.0/dist/headroom.min.js"></script>

</head>

<body style="display: flex; flex-direction: column">
  <div class="cuenta cuenta-block layout">
    <div class="cuenta-flex layout">
      <h2 class="cuenta-medium-title layout">Detalles de la Empresa</h2>
      <div class="cuenta-flex1 layout">
        <!--<div class="cuenta-flex1-item">
          <div class="cuenta-cover-block1 layout">
            <div class="cuenta-cover-block1-item">
              <div style="--src:url(http://192.168.64.2/PaginaWebFinal/assets/571ef6a80d41f9dfd53a10e217d57ad9.png)" class="cuenta-image2 layout"></div>
            </div>
            <div class="cuenta-cover-block1-spacer"></div>
            <div class="cuenta-small-text-body layout">Ingresar con Google</div>
          </div>
        </div>
        <div class="cuenta-flex1-item1">
          <div class="cuenta-flex2 layout">
            <div class="cuenta-cover-block1 layout1">
              <div class="cuenta-cover-block1-item1">
                <div style="--src:url(http://192.168.64.2/PaginaWebFinal/assets/08eca4a24ed703acded7cfce2a48dab4.png)" class="cuenta-image2 layout1"></div>
              </div>
              <div class="cuenta-cover-block1-spacer1"></div>
              <div class="cuenta-small-text-body layout1">Ingresar con Facebook</div>
            </div>
            <h4 class="cuenta-highlights2 layout">- O -</h4>
          </div>
        </div>
        <div class="cuenta-flex1-item2">
          <div class="cuenta-cover-block layout">
            <div class="cuenta-cover-block-item">
              <div style="--src:url(http://192.168.64.2/PaginaWebFinal/assets/47448dd426ca9db3d5c1834b897a6a45.png)" class="cuenta-image3 layout"></div>
            </div>
            <div class="cuenta-cover-block-spacer"></div>
            <div class="cuenta-small-text-body layout2">Ingresar con LinkedIn</div>
          </div>
        </div>-->
      </div>
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
        <div class="cuenta-flex3 layout">
          <!--<h5 class="cuenta-highlights layout">¿Cómo planeas usar tu cuenta?</h5>-->
          <div class="cuenta-flex3-spacer">
             <!--<select name="SeleccionaCuenta" id="SelectCuenta">
            <option value="http://192.168.64.2/PaginaWebFinal/CrearEmpresa.php">Empresarial</option>  
            <option value="http://192.168.64.2/PaginaWebFinal/Cuenta.php">Usuario Profesional</option>    
            </select>-->
          </div>
          <div class="cuenta-flex3-item">
          </div>
        </div>
        <!--<hr class="cuenta-line layout"> -->
        <input class="cuenta-highlights layout1" type="text" placeholder="CIF" name="CIF" pattern="{9}" required>
        <hr class="cuenta-line1 layout" />
        <input class="cuenta-highlights layout1" type="text" placeholder="Nombre De La Empresa" name="NombreEmpresa" required>
        <hr class="cuenta-line1 layout" />
        <input class="cuenta-highlights layout1" type="email" placeholder="Correo Electrónico De La Empresa" name="CorreoElectronicoEmpresarial" required>
        <hr class="cuenta-line layout" />
        <input class="cuenta-highlights layout1" type="text" placeholder="Descripción De La Empresa" name="DescEmpresa" required>
        <hr class="cuenta-line1 layout" />
        <input class="cuenta-highlights layout1" type="text" placeholder="Telefono de la Empresa" name="TelEmp" required>
        <hr class="cuenta-line layout" />
        <input type="submit" name="submit" value="Registrar Empresa" class="cuenta-cover-block3 layout">
      </form>
    </div>
  </div>
</body>

</html>