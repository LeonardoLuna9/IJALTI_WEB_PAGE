<?php

@include 'config.php';

session_start();

//Verificamos usuario

if(!isset($_SESSION['CorreoElectronico'])){
  header('location:IniciarSesion.php');
}

$correoValida = $_SESSION['CorreoElectronico'];

// Verificar en base de datos
$buscaUsuario = " SELECT * FROM usuario_prof WHERE correo = '$correoValida'"; //Prueba para ver si me valida 
$validaUsuario = mysqli_query($conn, $buscaUsuario);
if(mysqli_num_rows($validaUsuario) == 0){
  $error[] = 'No existe usuario';
  header('location:Cuenta.php');
}

// Terminamos de verificar


$CorreoElectronico = $_SESSION['CorreoElectronico'];

// Verificar en base de datos
$buscaUsuario = " SELECT * FROM usuario_prof WHERE correo = '$CorreoElectronico'"; //Prueba para ver si me valida 
$validaUsuario = mysqli_query($conn, $buscaUsuario);
if(mysqli_num_rows($validaUsuario) == 0){
  $error[] = 'No existe usuario';
  header('location:Cuenta.php');
}

if (isset($_POST['submit'])){
  $presentacion = mysqli_real_escape_string($conn, $_POST['presentacion']);
  $_SESSION['Presentacion'] = $presentacion;

  //echo $_SESSION['Presentacion']; 

  header('location:UsuProf3.php');
}

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
    <link rel="stylesheet" type="text/css" href="css/UsuProf2.css" />

    <script type="text/javascript" src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script type="text/javascript" src="https://unpkg.com/headroom.js@0.12.0/dist/headroom.min.js"></script>
  </head>

  <body style="display: flex; flex-direction: column">
    <div class="usu-prof2 usu-prof2-block layout">
      <div class="usu-prof2-block-item">
        <div class="usu-prof2-cover-block3 layout">
          <div class="usu-prof2-flex layout">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/7323574fa6f9b67892c5c58f273263e8.png)" class="usu-prof2-icon3 layout"></div>
            <div class="usu-prof2-cover-block2 layout">
              <div class="usu-prof2-flex1 layout">
                <div class="usu-prof2-flex1-item">
                  <div class="usu-prof2-flex2 layout">
                    <div class="usu-prof2-box11 layout"></div>
                    <div class="usu-prof2-box11 layout1"></div>
                  </div>
                </div>
                <div class="usu-prof2-flex1-spacer"></div>
                <div class="usu-prof2-flex1-item">
                  <div class="usu-prof2-flex2 layout">
                    <div class="usu-prof2-box11 layout"></div>
                    <div class="usu-prof2-box11 layout2"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="usu-prof2-cover-group1 layout">
              <div class="usu-prof2-box14 layout"></div>
              <div class="usu-prof2-box15 layout"></div>
              <div class="usu-prof2-box17 layout"></div>
              <div
                style="--src:url(http://localhost/PaginaWebFinal/assets/2ae38ea5632235754bd78aa2f650374d.png)"
                class="usu-prof2-image2 layout"
              ></div>
              <div class="usu-prof2-cover-group layout">
                <div class="usu-prof2-box16 layout"></div>
                <div
                  style="--src:url(http://localhost/PaginaWebFinal/assets/b86e71291d200049b9abc11f40792139.png)"
                  class="usu-prof2-image3 layout"
                ></div>
              </div>
            </div>
            <div class="usu-prof2-group layout">
              <div class="usu-prof2-flex4 layout">
                <div class="usu-prof2-flex4-item"><div class="usu-prof2-box9 layout"></div></div>
                <div class="usu-prof2-flex4-spacer"></div>
                <div class="usu-prof2-flex4-item"><div class="usu-prof2-box7 layout"></div></div>
                <div class="usu-prof2-flex4-spacer"></div>
                <div class="usu-prof2-flex4-item"><div class="usu-prof2-box8 layout"></div></div>
              </div>
              <div style="--src:url(http://localhost/PaginaWebFinal/assets/83dbd43dce1484d5547515d54439abf1.png)" class="usu-prof2-icon1 layout"></div>
            </div>
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/9e6587d9d71ed6665bd6b5030de72a0a.png)" class="usu-prof2-image layout"></div>
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/046d996939a083c067ab06faeb93e597.png)" class="usu-prof2-cover-block1 layout">
              <div style="--src:url(http://localhost/PaginaWebFinal/assets/ec63e319edd52afa23d013c040b56139.png)" class="usu-prof2-icon2 layout"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="usu-prof2-block-spacer"></div>
      <div class="usu-prof2-block-item1">
        
        <div class="usu-prof2-flex5 layout">
        <form action="" method="post">

          <h1 class="usu-prof2-hero-title layout">Confirma la información</h1>
          <h4 class="usu-prof2-highlights3 layout">Revisa que la información proporcionada sea la correcta</h4>
          <div class="usu-prof2-cover-block9 layout">
            <div class="usu-prof2-flex6 layout">
              <div class="usu-prof2-flex7 layout">
                <div class="usu-prof2-flex7-item">
                  <div
                    style="--src:url(http://localhost/PaginaWebFinal/assets/beec82d6453cc2811bc255eec03cf954.png)"
                    class="usu-prof2-cover-block7 layout"
                  >
                    <h5 class="usu-prof2-highlights layout">1</h5>
                  </div>
                </div>
                <div class="usu-prof2-flex7-spacer"></div>
                <!--<div class="usu-prof2-flex7-item1"><div class="usu-prof2-box1 layout"></div></div>
                <div class="usu-prof2-cover-block8 layout"><div class="usu-prof2-box4 layout"></div></div>-->
                <div class="usu-prof2-flex7-item3">
                  <div class="usu-prof2-cover-block8 layout"><div class="usu-prof2-box4 layout"></div></div>
                </div>
                <div class="usu-prof2-flex7-spacer"></div>
                <div class="usu-prof2-flex7-item">
                  <div
                    style="--src:url(http://localhost/PaginaWebFinal/assets/beec82d6453cc2811bc255eec03cf954.png)"
                    class="usu-prof2-cover-block5 layout"
                  >
                    <h5 class="usu-prof2-highlights1 layout">2</h5>
                  </div>
                </div>
                <div class="usu-prof2-flex7-spacer"></div>
                <!--<div class="usu-prof2-flex7-item2"><div class="usu-prof2-box2 layout"></div></div>-->
                <div class="usu-prof2-flex7-spacer"></div>
                <div class="usu-prof2-flex7-item">
                  <div
                    style="--src:url(http://localhost/PaginaWebFinal/assets/beec82d6453cc2811bc255eec03cf954.png)"
                    class="usu-prof2-cover-block5 layout"
                  >
                    <!--<h5 class="usu-prof2-highlights1 layout1">3</h5>
                  </div>
                </div>
                <div class="usu-prof2-flex7-spacer"></div>
                <div class="usu-prof2-flex7-item3">
                  <div class="usu-prof2-cover-block8 layout"><div class="usu-prof2-box4 layout"></div></div>
                </div>
                <div class="usu-prof2-flex7-spacer"></div>
                <div class="usu-prof2-flex7-item">
                  <div
                    style="--src:url(http://localhost/PaginaWebFinal/assets/2c1f110e2a334862edcc342ddd980d4b.png)"
                    class="usu-prof2-cover-block4 layout"
                  >
                    <h5 class="usu-prof2-highlights2 layout">4</h5>-->
                  </div>
                </div>
              </div>
              <hr class="usu-prof2-line layout" />
              <h2 class="usu-prof2-medium-title layout">Presentate</h2>
              <h4 class="usu-prof2-highlights31 layout">Puedes escribir un breve texto de presentación aquí</h4>
              <div class="usu-prof2-cover-block layout">
                
                <textarea class="usu-prof2-highlights5" name="presentacion" rows="10" cols="45" placeholder = "Máximo 100 palabras "> </textarea>
                <!--<input class="usu-prof2-highlights5" type = "text" placeholder="Máximo 100 palabras" name="presentacion" pattern="{100}" maxlength="100" required>  -->             
                
              </div>
            </div>
          </div>
          <div class="usu-prof2-flex8 layout">
            <div class="usu-prof2-flex8-item">
              <a href="IntUsuProf.php" style="text-decoration: none;"><div class="usu-prof2-block4 layout"><h4 class="usu-prof2-highlights6 layout">Regresar</h4></div></a>
            </div>
            <div class="usu-prof2-flex8-spacer"></div>
            <div class="usu-prof2-flex8-item1">
<!--
              <a href="UsuProf3.php" style="text-decoration: none;"><div class="usu-prof2-block1 layout"><h4 class="usu-prof2-highlights4 layout">Siguiente</h4></div></a>
-->

              <input type = "submit" name ="submit" value="Siguiente" class="usu-prof2-block1 layout usu-prof2-highlights4 layout">
    
            </div>
          </div>
        </div>
        </form>
      </div>
      <div class="usu-prof2-block-spacer1"></div>
      <div class="usu-prof2-block-item2">
        <div class="usu-prof2-block2 layout">
          <div style="--src:url(http://localhost/PaginaWebFinal/assets/e1b8c76181004a3e9e95a1151056a5c1.png)" class="usu-prof2-icon4 layout"></div>
        </div>
      </div>
      <div class="usu-prof2-block-spacer2"></div>
      <div class="usu-prof2-block-item3">
        <div class="usu-prof2-block3 layout">
          <div style="--src:url(http://localhost/PaginaWebFinal/assets/601449fdf3b988c9624f92ad1efe381a.png)" class="usu-prof2-image4 layout"></div>
        </div>
      </div>
      <div class="usu-prof2-block-spacer3"></div>
      <div class="usu-prof2-block-item4">
        <div style="--src:url(http://localhost/PaginaWebFinal/assets/6db786cae790c9b78f84af356252d24b.png)" class="usu-prof2-icon5 layout"></div>
      </div>
    </div>
    <script type="text/javascript">
      AOS.init();
    </script>
  </body>
</html>
