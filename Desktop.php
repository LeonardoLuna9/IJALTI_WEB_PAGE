<?php
@include 'config.php'; // Base de datos
//session_start();

$correoUsuario = $_GET['CorreoAplicantePerfil'];

$_SESSION['CorreoAplicantePerfil'] = $correoUsuario;

$correoPerfil = "SELECT * FROM usuarios WHERE correo = '$correoUsuario'";
$query = mysqli_query($conn, $correoPerfil);  
$row = mysqli_fetch_array($query);

$correoPerfil1 = "SELECT * FROM educacion WHERE correo = '$correoUsuario'";
$query1 = mysqli_query($conn, $correoPerfil1);  
$row1 = mysqli_fetch_array($query1);

$correoPerfil2 = "SELECT * FROM habilidades WHERE correo = '$correoUsuario'";
$query2 = mysqli_query($conn, $correoPerfil2);  
$row2 = mysqli_fetch_array($query2);

//  echo "el correo es".$_GET['CorreoAplicantePerfil'];
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
    <link rel="stylesheet" type="text/css" href="css/Desktop.css" />

    <script type="text/javascript" src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script type="text/javascript" src="https://unpkg.com/headroom.js@0.12.0/dist/headroom.min.js"></script>
  </head>

  <body style="display: flex; flex-direction: column">
    <div class="desktop desktop-block layout">
      <div class="desktop-box1 layout"></div>
      <div class="desktop-box4 layout"></div>
      <div class="desktop-box4 layout"></div>
      <div class="desktop-box3 layout"></div>
      <div class="desktop-box3 layout"></div>
      <div class="desktop-box3 layout"></div>
      <div class="desktop-flex layout">
        <div class="desktop-flex1 layout">
          <div class="desktop-flex1-item">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/7323574fa6f9b67892c5c58f273263e8.png)" class="desktop-icon layout"></div>
          </div>
          <div class="desktop-flex1-spacer"></div>
          <h1 class="desktop-big-title1 layout">Aplicantes</h1>
        </div>
        <div class="desktop-flex2 layout">
          <div class="desktop-flex2-item">
            <div class="desktop-cover-block2 layout">
              <div class="desktop-flex3 layout">
                <div class="desktop-flex4 layout">
                  <div class="desktop-flex4-item"><div class="desktop-box6 layout"></div></div>
                  <div class="desktop-flex4-spacer"></div>
                  <div class="desktop-flex4-item"><div class="desktop-box6 layout"></div></div>
                </div>
                <div class="desktop-flex4 layout1">
                  <div class="desktop-flex4-item"><div class="desktop-box6 layout"></div></div>
                  <div class="desktop-flex4-spacer"></div>
                  <div class="desktop-flex4-item"><div class="desktop-box6 layout"></div></div>
                </div>
              </div>
            </div>
          </div>
          <div class="desktop-flex2-spacer"></div>
          <div class="desktop-flex2-item1">
            <a href="IntEmp.php" style="text-decoration: none;"><div style="--src:url(http://localhost/PaginaWebFinal/assets/92895f952a3b0e1dbe9da3e6806941ae.png)" class="desktop-image4 layout"></div></a>
          </div>
        </div>
        <div class="desktop-cover-block1 layout">
          <div style="--src:url(http://localhost/PaginaWebFinal/assets/2805d49bbf7338977dcbdb48755c9baa.png)" class="desktop-icon1 layout"></div>
          <div style="--src:url(http://localhost/PaginaWebFinal/assets/cea2953d5f057da721482fde9542f499.png)" class="desktop-icon2 layout"></div>
        </div>
        <div class="desktop-flex6 layout">
          <div class="desktop-flex6-item">
            <div class="desktop-flex7 layout">
              <div class="desktop-flex8 layout">
                <div class="desktop-flex8-item"><div class="desktop-box11 layout"></div></div>
                <div class="desktop-flex8-spacer"></div>
                <div class="desktop-flex8-item"><div class="desktop-box9 layout"></div></div>
                <div class="desktop-flex8-spacer"></div>
                <div class="desktop-flex8-item"><div class="desktop-box10 layout"></div></div>
              </div>
              <div style="--src:url(http://localhost/PaginaWebFinal/assets/3b3ce0d989dcd5ddee6ba7e50aa7b4c6.png)" class="desktop-icon3 layout"></div>
              <div style="--src:url(http://localhost/PaginaWebFinal/assets/8f83a7d1f3e5bec5c47bfeba6a103133.png)" class="desktop-cover-block layout">
                <div
                  style="--src:url(http://localhost/PaginaWebFinal/assets/6b2a8b41bff1a2cfdc7f576557253bb8.png)"
                  class="desktop-image2 layout"
                ></div>
              </div>
            </div>
          </div>
          <div class="desktop-flex6-spacer"></div>
          <div class="desktop-flex6-item1">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/afb8a4f87d6d53a58b2b08f0dc052c78.png)" class="desktop-image layout"></div>
          </div>
        </div>
        <div class="desktop-group layout">
          <h1 class="desktop-hero-title layout"><?php echo $row['nombre']; ?> <?php echo $row['apellidoP']; ?> <?php echo $row['apellidoM']; ?></h1>
          <h2 class="desktop-medium-title layout">Guadalajara, Jalisco</h2>
        </div>
        <h3 class="desktop-subtitle-box layout">
          <pre class="desktop-subtitle">
              Graduado de <?php echo $row1['carrera']; ?> 
              en <?php echo $row1['escuela']; ?>. Experiencia en 
              <?php echo $row2['experiencia_habil']; ?></pre
          >
        </h3>
        <div class="desktop-block2 layout">
          <div style="--src:url(http://localhost/PaginaWebFinal/assets/51dd2e0f1587d970d5235aa79395cf49.png)" class="desktop-icon4 layout"></div>
          <h2 class="desktop-medium-title1 layout">Jalisco, Guadalajara</h2>
        </div>
        <div class="desktop-block3 layout">
          <div class="desktop-block4 layout">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/ad0d54d9af49f0157288f12fbe8bc089.png)" class="desktop-image3 layout"></div>
          </div>
          <h2 class="desktop-medium-title1 layout1"><?php echo $row['correo']; ?></h2>
        </div>
        <div class="desktop-block1 layout">
          <div style="--src:url(http://localhost/PaginaWebFinal/assets/2c8fc37648bf8a9d06c2922f3af32218.png)" class="desktop-icon4 layout"></div>
          <h2 class="desktop-medium-title1 layout2">Español, Ingles.</h2>
        </div>
        <div class="desktop-flex9 layout">
          <div class="desktop-flex9-item">
            <div class="desktop-cover-block3 layout">
              <!-- Boton Mostrar CV-->
              <a class="desktop-big-title layout" href="Cv.php">Mostrar CV</a>
            </div>
          </div>
          <div class="desktop-flex9-spacer"></div>
          <div class="desktop-flex9-item1">
            <div class="desktop-block5 layout">
              <div class="desktop-box2 layout"></div>
              <h1 class="desktop-big-title layout1">Enviar Mensaje</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      AOS.init();
    </script>
  </body>
</html>
