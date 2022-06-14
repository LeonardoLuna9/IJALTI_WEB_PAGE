<?php

@include 'config.php'; // Base de datos

if (isset($_POST['submit'])) {
  $telefono = mysqli_real_escape_string($conn, $_POST['telefono']);
  $correo = mysqli_real_escape_string($conn, $_POST['CorreoElectronico']);
  $nombre = mysqli_real_escape_string($conn, $_POST['Nombre']);
  $apellidoP = mysqli_real_escape_string($conn, $_POST['ApellidoP']);
  $apellidoM = mysqli_real_escape_string($conn, $_POST['ApellidoM']);
  $contraseña = md5($_POST['Contraseña']);
  $RepContraseña = md5($_POST['RepetirContraseña']);
  $SeleccionCuenta = $_POST['SeleccionaCuenta'];

  $select = " SELECT * FROM usuarios WHERE correo = '$correo' && contraseña = '$contraseña'";

  $result = mysqli_query($conn, $select);

  if (mysqli_num_rows($result) > 0) {

    $error[] = 'Usuario ya existe';
  } else {
    if ($contraseña != $RepContraseña) {
      $error[] = "Contraseña no coincide";
    } else {
      $insert = "INSERT INTO usuarios(correo, nombre, apellidoP, apellidoM, contraseña) VALUES ('$correo', '$nombre','$apellidoP' ,'$apellidoM', '$contraseña')";
      mysqli_query($conn, $insert);

      $insert2 = "INSERT INTO usuario_prof(correo) VALUES ('$correo')"; // usuario_prof
      mysqli_query($conn, $insert2);

      // aplicantes - Restriccion porque solo sirve si ya hay una vacante a aplicar

      // Otros usuarios:
      // reclutador -- CIF NIF ???

      $insert3 = "INSERT INTO telefono(num_tel, correo) VALUES ($telefono, '$correo')"; // telefono
      mysqli_query($conn, $insert3);

      // Usuario Profesinales
      $insert4 = "INSERT INTO titulo(correo) VALUES ('$correo')"; // titulo
      mysqli_query($conn, $insert4);

      $insert5 = "INSERT INTO habilidades(correo) VALUES ('$correo')"; // habilidades
      mysqli_query($conn, $insert5);

      $insert6 = "INSERT INTO informacion_laboral(correo) VALUES ('$correo')"; // informacion_laboral
      mysqli_query($conn, $insert6);

      $insert7 = "INSERT INTO educacion(correo) VALUES ('$correo')"; // educacion
      mysqli_query($conn, $insert7);

      header('location:IniciarSesion.php');
    }
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
        <input type="submit" name="submit" value="Crear Cuenta" class="cuenta-cover-block3 layout">
      </form>
    </div>
  </div>
</body>

</html>