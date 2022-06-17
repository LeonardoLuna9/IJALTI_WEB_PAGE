<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['CorreoElectronico'])){
  header('location:IniciarSesion.php');
}


$CorreoElectronico = $_SESSION['CorreoElectronico'];
$vacante = $_SESSION['Vacante'];
$presentacion = $_SESSION['Presentacion'];

// Verificar en base de datos
$buscaUsuario = " SELECT * FROM usuario_prof WHERE correo = '$CorreoElectronico'"; //Prueba para ver si me valida 
$validaUsuario = mysqli_query($conn, $buscaUsuario);
if(mysqli_num_rows($validaUsuario) == 0){
  $error[] = 'No existe usuario';
  header('location:Cuenta.php');
}


//echo $vacante;
echo $_SESSION['Presentacion'];
if (isset($_POST['submit'])){
  $definirAplica = "  INSERT INTO aplicantes(ID_vacante, correo, presentacion, fecha_apl) VALUES ($vacante, '$CorreoElectronico', '$presentacion', CURDATE()) ";
  mysqli_query($conn, $definirAplica);
  header('location:IntUsuProf.php');
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
    <link rel="stylesheet" type="text/css" href="css/UsuProf3.css" />

    <script type="text/javascript" src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script type="text/javascript" src="https://unpkg.com/headroom.js@0.12.0/dist/headroom.min.js"></script>
  </head>

  <body style="display: flex; flex-direction: column">
    <div class="usu-prof3 usu-prof3-block layout">
      <div class="usu-prof3-block-item">
        <div class="usu-prof3-cover-block2 layout">
          <div class="usu-prof3-flex layout">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/7323574fa6f9b67892c5c58f273263e8.png)" class="usu-prof3-icon4 layout"></div>
            <div class="usu-prof3-cover-block1 layout">
              <div class="usu-prof3-flex1 layout">
                <div class="usu-prof3-flex1-item">
                  <div class="usu-prof3-flex2 layout">
                    <div class="usu-prof3-box13 layout"></div>
                    <div class="usu-prof3-box13 layout1"></div>
                  </div>
                </div>
                <div class="usu-prof3-flex1-spacer"></div>
                <div class="usu-prof3-flex1-item">
                  <div class="usu-prof3-flex3 layout">
                    <div class="usu-prof3-box14 layout"></div>
                    <div class="usu-prof3-box14 layout1"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="usu-prof3-cover-group1 layout">
              <div class="usu-prof3-box17 layout"></div>
              <div class="usu-prof3-box18 layout"></div>
              <div class="usu-prof3-box20 layout"></div>
              <div
                style="--src:url(http://localhost/PaginaWebFinal/assets/2ae38ea5632235754bd78aa2f650374d.png)"
                class="usu-prof3-image2 layout"
              ></div>
              <div class="usu-prof3-cover-group layout">
                <div class="usu-prof3-box19 layout"></div>
                <div
                  style="--src:url(http://localhost/PaginaWebFinal/assets/b86e71291d200049b9abc11f40792139.png)"
                  class="usu-prof3-image3 layout"
                ></div>
              </div>
            </div>
            <div class="usu-prof3-group layout">
              <div class="usu-prof3-flex4 layout">
                <div class="usu-prof3-flex4-item"><div class="usu-prof3-box11 layout"></div></div>
                <div class="usu-prof3-flex4-spacer"></div>
                <div class="usu-prof3-flex4-item"><div class="usu-prof3-box9 layout"></div></div>
                <div class="usu-prof3-flex4-spacer"></div>
                <div class="usu-prof3-flex4-item"><div class="usu-prof3-box10 layout"></div></div>
              </div>
              <div style="--src:url(http://localhost/PaginaWebFinal/assets/83dbd43dce1484d5547515d54439abf1.png)" class="usu-prof3-icon2 layout"></div>
            </div>
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/9e6587d9d71ed6665bd6b5030de72a0a.png)" class="usu-prof3-image layout"></div>
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/046d996939a083c067ab06faeb93e597.png)" class="usu-prof3-cover-block layout">
              <div style="--src:url(http://localhost/PaginaWebFinal/assets/ec63e319edd52afa23d013c040b56139.png)" class="usu-prof3-icon3 layout"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="usu-prof3-block-spacer"></div>
      <div class="usu-prof3-block-item1">
        <div class="usu-prof3-flex5 layout">
          <h1 class="usu-prof3-hero-title layout">Confirma la información</h1>
          <h4 class="usu-prof3-highlights2 layout">Revisa que la información proporcionada sea la correcta</h4>
          <div class="usu-prof3-cover-block7 layout">
            <div class="usu-prof3-flex6 layout">
              <div class="usu-prof3-flex7 layout">
                <div class="usu-prof3-flex7-item">
                  <div
                    style="--src:url(http://localhost/PaginaWebFinal/assets/beec82d6453cc2811bc255eec03cf954.png)"
                    class="usu-prof3-cover-block6 layout"
                  >
                    <h5 class="usu-prof3-highlights layout">1</h5>
                  </div>
                </div>
                <div class="usu-prof3-flex7-spacer"></div>
                <div class="usu-prof3-flex7-item1"><div class="usu-prof3-box1 layout"></div></div>
                <div class="usu-prof3-flex7-spacer"></div>
                <div class="usu-prof3-flex7-item">
                  <div
                    style="--src:url(http://localhost/PaginaWebFinal/assets/beec82d6453cc2811bc255eec03cf954.png)"
                    class="usu-prof3-cover-block3 layout"
                  >
                    <h5 class="usu-prof3-highlights1 layout">2</h5>
                  </div>
                </div>
                <div class="usu-prof3-flex7-spacer"></div>
                <!--<div class="usu-prof3-flex7-item2"><div class="usu-prof3-box2 layout"></div></div>-->
                <div class="usu-prof3-flex7-spacer"></div>
                <div class="usu-prof3-flex7-item">
                  <div
                    style="--src:url(http://localhost/PaginaWebFinal/assets/beec82d6453cc2811bc255eec03cf954.png)"
                    class="usu-prof3-cover-block3 layout"
                  >
                    <!--<h5 class="usu-prof3-highlights1 layout1">3</h5>
                  </div>
                </div>
                <div class="usu-prof3-flex7-spacer"></div>
                <div class="usu-prof3-flex7-item3"><div class="usu-prof3-box2 layout"></div></div>
                <div class="usu-prof3-flex7-spacer"></div>
                <div class="usu-prof3-flex7-item">
                  <div
                    style="--src:url(http://localhost/PaginaWebFinal/assets/beec82d6453cc2811bc255eec03cf954.png)"
                    class="usu-prof3-cover-block3 layout"
                  >
                    <h5 class="usu-prof3-highlights1 layout2">4</h5>-->
                  </div>
                </div>
              </div>
              <hr class="usu-prof3-line layout" />
              <div class="usu-prof3-group layout1">
                <div class="usu-prof3-flex8 layout">
                  <div class="usu-prof3-flex8-item"><div class="usu-prof3-box3 layout"></div></div>
                  <div class="usu-prof3-flex8-spacer"></div>
                  <div class="usu-prof3-flex8-item1"><div class="usu-prof3-box4 layout"></div></div>
                </div>
                <div
                  style="--src:url(http://localhost/PaginaWebFinal/assets/015f9569e126d7fdbd2e6f0205a87664.png)"
                  class="usu-prof3-icon1 layout"
                ></div>
              </div>
              <div class="usu-prof3-box5 layout"></div>
              <div class="usu-prof3-box6 layout"></div>
              <h2 class="usu-prof3-medium-title layout">Aplica para la vacante</h2>
              <h4 class="usu-prof3-highlights2 layout1">
                Por favor revisa la información de los pasos anteriores, and si todo esta bien, presiona el botón de
                aplicar para que te consideren como candidato a la vacante.
              </h4>
              <!-- <a href="IntUsuProf.php" style="text-decoration: none;"><div class="usu-prof3-block1 layout"><h4 class="usu-prof3-highlights3 layout">Aplicar</h4></div></a> -->
              <form action="" method="post">
              <input type = "submit" name ="submit" value="Aplicar" class="usu-prof3-block1 layout usu-prof3-highlights3 layout">
              </form>
            </div>
          </div>
          <a href="UsuProf2.php" style="text-decoration: none;"><div class="usu-prof3-block4 layout"><h4 class="usu-prof3-highlights4 layout">Regresar</h4></div></a>
        </div>
      </div>
      <div class="usu-prof3-block-spacer1"></div>
      <div class="usu-prof3-block-item2">
        <div class="usu-prof3-block2 layout">
          <div style="--src:url(http://localhost/PaginaWebFinal/assets/e1b8c76181004a3e9e95a1151056a5c1.png)" class="usu-prof3-icon5 layout"></div>
        </div>
      </div>
      <div class="usu-prof3-block-spacer2"></div>
      <div class="usu-prof3-block-item3">
        <div class="usu-prof3-block3 layout">
          <div style="--src:url(http://localhost/PaginaWebFinal/assets/601449fdf3b988c9624f92ad1efe381a.png)" class="usu-prof3-image4 layout"></div>
        </div>
      </div>
      <div class="usu-prof3-block-spacer3"></div>
      <div class="usu-prof3-block-item4">
        <div style="--src:url(http://localhost/PaginaWebFinal/assets/6db786cae790c9b78f84af356252d24b.png)" class="usu-prof3-icon6 layout"></div>
      </div>
    </div>
    <script type="text/javascript">
      AOS.init();
    </script>
  </body>
</html>
