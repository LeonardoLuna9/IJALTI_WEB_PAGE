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
  <link rel="stylesheet" type="text/css" href="css/IntEmp.css" />

  <script type="text/javascript" src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script type="text/javascript" src="https://unpkg.com/headroom.js@0.12.0/dist/headroom.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/px2code/posize/build/v1.00.5.js"></script>
</head>

<body style="display: flex; flex-direction: column">
  <div class="int-emp int-emp-group layout54">
    <div class="int-emp-cover-group13 layout">
      <div class="int-emp-group1 layout">
        <div style="--src:url(http://localhost/PaginaWebFinal/assets/e1b8c76181004a3e9e95a1151056a5c1.png)" class="int-emp-img layout"></div>
      </div>
      <div class="int-emp-group2 layout">
        <div style="--src:url(http://localhost/PaginaWebFinal/assets/601449fdf3b988c9624f92ad1efe381a.png)" class="int-emp-img layout1"></div>
      </div>
      <div class="int-emp-cover-group layout">
        <div style="--src:url(http://localhost/PaginaWebFinal/assets/6db786cae790c9b78f84af356252d24b.png)" class="int-emp-img layout2"></div>
        <div style="--src:url(http://localhost/PaginaWebFinal/assets/69d690ec87262e6d91c21699ac4a6b13.png)" class="int-emp-img layout3"></div>
      </div>
      <div class="int-emp-rect layout"></div>
      <div class="int-emp-txt layout">Aplicantes</div>
      <px-posize x="1586fr 69px 73fr" y="42px 25px 26px" absolute="true">
        <div class="int-emp-img1" style="--src:url(http://localhost/PaginaWebFinal/assets/55332f877608c9f1b3986fd0c46c1dcd.png)"></div>
      </px-posize>
      <div style="--src:url(http://localhost/PaginaWebFinal/assets/bedb9931d995fb69802dd678967770fc.png)" class="int-emp-cover-block layout">
        <div style="--src:url(http://localhost/PaginaWebFinal/assets/0247ef7e399fc3f1c444b97a9d2dece4.png)" class="int-emp-img layout4"></div>
      </div>
    </div>
    <div class="int-emp-group3 layout">
      <div class="int-emp-flex layout">
        <div class="int-emp-flex-item">
          <div class="int-emp-group4 layout">
            <label class="container">
              <input type="checkbox" checked="checked">
              <span class="checkmark"></span>
            </label>
          </div>
        </div>
        <div class="int-emp-flex-item1">
          <div class="int-emp-group6 layout">
            <div class="int-emp-flex1 layout">
              <div class="int-emp-group7 layout">
                <div class="int-emp-txt1 layout">Name</div>
              </div>
              <div class="int-emp-txt2 layout">Subhead</div>
            </div>
          </div>
        </div>
        <div class="int-emp-flex-item2">
          <div class="int-emp-group8 layout">
            <div class="int-emp-flex2 layout">
              <div class="int-emp-flex2-item">
                <div class="int-emp-group9 layout">
                  <div style="--src:url(http://localhost/PaginaWebFinal/assets/1d91f164f54fa23a599100e366665e0b.png)" class="int-emp-img layout5"></div>
                </div>
              </div>
              <div class="int-emp-flex2-spacer"></div>
              <div class="int-emp-txt3 layout">Carrera</div>
            </div>
          </div>
        </div>
        <div class="int-emp-flex-item3">
          <div class="int-emp-group10 layout">
            <div class="int-emp-flex3 layout">
              <div class="int-emp-txt4 layout">ESPECIALIDAD</div>
              <div class="int-emp-flex3-item">
                <div class="int-emp-group11 layout">
                  <div style="--src:url(http://localhost/PaginaWebFinal/assets/1d91f164f54fa23a599100e366665e0b.png)" class="int-emp-img layout6"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="int-emp-flex-item4">
          <div class="int-emp-group12 layout">
            <div class="int-emp-group13 layout">
              <div class="int-emp-txt5 layout">ESTUDIOS</div>
            </div>
          </div>
        </div>
        <div></div>
        <div class="int-emp-flex-item5">
          <div class="int-emp-group14 layout">
            <div class="int-emp-group15 layout">
              <div class="int-emp-txt6 layout">PRESENTACIÓN</div>
            </div>
          </div>
        </div>
        <div class="int-emp-flex-item6">
          <div class="int-emp-group16 layout">
            <div class="int-emp-group17 layout">
              <div class="int-emp-txt7 layout">Experiencia laboral</div>
            </div>
          </div>
        </div>
        <div class="int-emp-flex-item7">
          <div class="int-emp-group18 layout">
            <div class="int-emp-group19 layout">
              <div class="int-emp-txt8 layout">Actions</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="int-emp-group20 layout">
      <div class="int-emp-flex4 layout">
        <div class="int-emp-flex4-item">
          <div class="int-emp-group layout">
            <label class="container">
              <input type="checkbox" checked="checked">
              <span class="checkmark"></span>
            </label>
          </div>
        </div>
        <div class="int-emp-flex4-item1">
          <div class="int-emp-group layout">
            <div class="int-emp-flex5 layout">
              <a href="Desktop.php" style="text-decoration: none;">
                <div class="int-emp-txt9 layout">Luis Alberto Camarena</div>
              </a>
              <div class="int-emp-txt10 layout">Capitan assistant</div>
            </div>
          </div>
        </div>
        <div class="int-emp-flex4-item2">
          <div class="int-emp-group layout">
            <div class="int-emp-txt11 layout">Ing. Sistemas Computacionales</div>
          </div>
        </div>
        <div class="int-emp-flex4-item3">
          <div class="int-emp-group21 layout">
            <div class="int-emp-txt12 layout">Arquitectura de redes</div>
          </div>
        </div>
        <div class="int-emp-txt13 layout">Doctorado en Big Data</div>
        <div class="int-emp-flex4-item4">
          <div class="int-emp-group layout1"></div>
        </div>
        <div class="int-emp-flex4-item5">
          <div class="int-emp-group layout2">
            <div class="int-emp-txt14 layout">Aplicar mis conocimientos</div>
          </div>
        </div>
        <div class="int-emp-flex4-item6">
          <div class="int-emp-group layout3">
            <div class="int-emp-txt15 layout">Kiosko</div>
          </div>
        </div>
        <div class="int-emp-flex4-item7">
          <div class="int-emp-group layout">
            <div class="int-emp-group22 layout"></div>
          </div>
        </div>
      </div>
      <div class="int-emp-group layout4">
        <div class="int-emp-group23 layout">
          <div class="int-emp-group24 layout">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/7b6e79a7aba1ac0d643fff0c65e1e93a.png)" class="int-emp-img layout7"></div>
          </div>
          <div class="int-emp-group25 layout">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/a0a39c89bd8df0b5956aee4cb9d21818.png)" class="int-emp-img layout8"></div>
          </div>
          <div class="int-emp-group26 layout">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/d10978458d61fcac6b7ef9c01df88df6.png)" class="int-emp-img layout9"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="int-emp-group27 layout">
      <div class="int-emp-flex6 layout">
        <div class="int-emp-flex6-item">
          <div class="int-emp-group layout">

            <label class="container">
              <input type="checkbox" checked="checked">
              <span class="checkmark"></span>
            </label>

          </div>
        </div>
        <div class="int-emp-flex6-item1">
          <div class="int-emp-group layout">
            <div class="int-emp-flex5 layout">
              <div class="int-emp-txt16 layout">Don Draper</div>
              <div class="int-emp-txt17 layout">Creative Director</div>
            </div>
          </div>
        </div>
        <div class="int-emp-flex6-item2">
          <div class="int-emp-group layout">
            <div class="int-emp-txt18 layout">Electronica</div>
          </div>
        </div>
        <div class="int-emp-flex6-item3">
          <div class="int-emp-group29 layout">
            <div class="int-emp-txt19 layout">Desarrollo de chips</div>
          </div>
        </div>
        <div class="int-emp-txt20 layout">Doctorado en Big Data</div>
        <div class="int-emp-flex6-item4">
          <div class="int-emp-group layout5"></div>
        </div>
        <div class="int-emp-flex6-item5">
          <div class="int-emp-group layout6">
            <div class="int-emp-txt21 layout">Experiencia</div>
          </div>
        </div>
        <div class="int-emp-flex6-item6">
          <div class="int-emp-group layout7">
            <div class="int-emp-txt22 layout">Bimbo</div>
          </div>
        </div>
        <div class="int-emp-flex6-item7">
          <div class="int-emp-group layout">
            <div class="int-emp-group30 layout">
              <div class="int-emp-flex8 layout">
                <div class="int-emp-flex8-item">
                  <div class="int-emp-group31 layout">
                    <div style="--src:url(http://localhost/PaginaWebFinal/assets/e3c249304af00aceeedbd44befdb0c0a.png)" class="int-emp-img layout11"></div>
                  </div>
                </div>
                <div class="int-emp-flex8-spacer"></div>
                <div class="int-emp-txt23 layout">Pending</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="int-emp-group layout8">
        <div class="int-emp-group32 layout">
          <div class="int-emp-group33 layout">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/7b6e79a7aba1ac0d643fff0c65e1e93a.png)" class="int-emp-img layout12"></div>
          </div>
          <div class="int-emp-group34 layout">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/a0a39c89bd8df0b5956aee4cb9d21818.png)" class="int-emp-img layout13"></div>
          </div>
          <div class="int-emp-group35 layout">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/d10978458d61fcac6b7ef9c01df88df6.png)" class="int-emp-img layout14"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="int-emp-group36 layout">
      <div class="int-emp-flex9 layout">
        <div class="int-emp-flex9-item">
          <div class="int-emp-group layout">

            <label class="container">
              <input type="checkbox" checked="checked">
              <span class="checkmark"></span>
            </label>

          </div>
        </div>
        <div class="int-emp-flex9-item1">
          <div class="int-emp-group layout">
            <div class="int-emp-flex5 layout">
              <div class="int-emp-txt24 layout">Homer Simpson</div>
              <div class="int-emp-txt25 layout">Safety manager</div>
            </div>
          </div>
        </div>
        <div class="int-emp-flex9-item2">
          <div class="int-emp-group layout">
            <div class="int-emp-txt26 layout">Ing. Sistemas Computacionales</div>
          </div>
        </div>
        <div class="int-emp-flex9-item3">
          <div class="int-emp-group38 layout">
            <div class="int-emp-txt27 layout">Ciberseguridad</div>
          </div>
        </div>
        <div class="int-emp-txt28 layout">Doctorado en Big Data</div>
        <div class="int-emp-flex9-item4">
          <div class="int-emp-group layout9"></div>
        </div>
        <div class="int-emp-flex9-item5">
          <div class="int-emp-group layout10">
            <div class="int-emp-txt29 layout">Big Data</div>
          </div>
        </div>
        <div class="int-emp-flex9-item6">
          <div class="int-emp-group layout11">
            <div class="int-emp-txt30 layout">Cibercafé de Dandy</div>
          </div>
        </div>
        <div class="int-emp-flex9-item7">
          <div class="int-emp-group layout">
            <div class="int-emp-group39 layout">
              <div class="int-emp-flex11 layout">
                <div class="int-emp-flex11-item">
                  <div class="int-emp-group40 layout">
                    <div style="--src:url(http://localhost/PaginaWebFinal/assets/8cc8ecddf859ba9f36ddea87cc10138d.png)" class="int-emp-img layout16"></div>
                  </div>
                </div>
                <div class="int-emp-flex11-spacer"></div>
                <div class="int-emp-txt31 layout">Stopped</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="int-emp-group layout12">
        <div class="int-emp-group41 layout">
          <div class="int-emp-group42 layout">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/7b6e79a7aba1ac0d643fff0c65e1e93a.png)" class="int-emp-img layout17"></div>
          </div>
          <div class="int-emp-group43 layout">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/a0a39c89bd8df0b5956aee4cb9d21818.png)" class="int-emp-img layout18"></div>
          </div>
          <div class="int-emp-group44 layout">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/d10978458d61fcac6b7ef9c01df88df6.png)" class="int-emp-img layout19"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="int-emp-group45 layout">
      <div class="int-emp-flex12 layout">
        <div class="int-emp-flex12-item">
          <div class="int-emp-group layout">
            <label class="container">
              <input type="checkbox" checked="checked">
              <span class="checkmark"></span>
            </label>
          </div>
        </div>
        <div class="int-emp-flex12-item1">
          <div class="int-emp-group layout">
            <div class="int-emp-flex5 layout">
              <div class="int-emp-txt32 layout">Idris Elba</div>
              <div class="int-emp-txt33 layout">Actor</div>
            </div>
          </div>
        </div>
        <div class="int-emp-flex12-item2">
          <div class="int-emp-group layout">
            <div class="int-emp-txt34 layout">Ing. Sistemas Computacionales</div>
          </div>
        </div>
        <div class="int-emp-flex12-item3">
          <div class="int-emp-group46 layout">
            <div class="int-emp-txt35 layout">Inteligencia Artificial</div>
          </div>
        </div>
        <div class="int-emp-txt36 layout">Doctorado en Big Data</div>
        <div class="int-emp-flex12-item4">
          <div class="int-emp-group layout13"></div>
        </div>
        <div class="int-emp-flex12-item5">
          <div class="int-emp-group layout14">
            <div class="int-emp-txt37 layout">Nuevos conocimientos</div>
          </div>
        </div>
        <div class="int-emp-flex12-item6">
          <div class="int-emp-group layout15">
            <div class="int-emp-txt38 layout">Tuny</div>
          </div>
        </div>
        <div class="int-emp-flex12-item7">
          <div class="int-emp-group layout16"></div>
        </div>
      </div>
      <div class="int-emp-group layout17">
        <div class="int-emp-group47 layout">
          <div class="int-emp-group48 layout">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/7b6e79a7aba1ac0d643fff0c65e1e93a.png)" class="int-emp-img layout20"></div>
          </div>
          <div class="int-emp-group49 layout">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/a0a39c89bd8df0b5956aee4cb9d21818.png)" class="int-emp-img layout21"></div>
          </div>
          <div class="int-emp-group50 layout">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/d10978458d61fcac6b7ef9c01df88df6.png)" class="int-emp-img layout22"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="int-emp-group51 layout">
      <div class="int-emp-flex14 layout">
        <div class="int-emp-flex14-item">
          <label class="container">
            <input type="checkbox" checked="checked">
            <span class="checkmark"></span>
          </label>
        </div>
        <div class="int-emp-flex14-item1">
          <div class="int-emp-group layout">
            <div class="int-emp-flex5 layout">
              <div class="int-emp-txt39 layout">Luis Alberto Camarena</div>
              <div class="int-emp-txt40 layout">Capitan assistant</div>
            </div>
          </div>
        </div>
        <div class="int-emp-flex14-item2">
          <div class="int-emp-group layout">
            <div class="int-emp-txt41 layout">Ing. Sistemas Computacionales</div>
          </div>
        </div>
        <div class="int-emp-flex14-item3">
          <div class="int-emp-group52 layout">
            <div class="int-emp-txt42 layout">Arquitectura de redes</div>
          </div>
        </div>
        <div class="int-emp-txt43 layout">Doctorado en Big Data</div>
        <div class="int-emp-flex14-item4">
          <div class="int-emp-group layout18"></div>
        </div>
        <div class="int-emp-flex14-item5">
          <div class="int-emp-group layout19">
            <div class="int-emp-txt44 layout">Aplicar mis conocimientos</div>
          </div>
        </div>
        <div class="int-emp-flex14-item6">
          <div class="int-emp-group layout20">
            <div class="int-emp-txt45 layout">Kiosko</div>
          </div>
        </div>
        <div class="int-emp-flex14-item7">
          <div class="int-emp-group layout">
            <div class="int-emp-group53 layout"></div>
          </div>
        </div>
      </div>
      <div class="int-emp-group layout21">
        <div class="int-emp-group54 layout">
          <div class="int-emp-group55 layout">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/7b6e79a7aba1ac0d643fff0c65e1e93a.png)" class="int-emp-img layout23"></div>
          </div>
          <div class="int-emp-group56 layout">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/a0a39c89bd8df0b5956aee4cb9d21818.png)" class="int-emp-img layout24"></div>
          </div>
          <div class="int-emp-group57 layout">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/d10978458d61fcac6b7ef9c01df88df6.png)" class="int-emp-img layout25"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="int-emp-group58 layout">
      <div class="int-emp-flex16 layout">
        <div class="int-emp-flex16-item">
          <div class="int-emp-group layout">
            <label class="container">
              <input type="checkbox" checked="checked">
              <span class="checkmark"></span>
            </label>
          </div>
        </div>
        <div class="int-emp-flex16-item1">
          <div class="int-emp-group layout">
            <div class="int-emp-flex5 layout">
              <div class="int-emp-txt46 layout">Don Draper</div>
              <div class="int-emp-txt47 layout">Creative Director</div>
            </div>
          </div>
        </div>
        <div class="int-emp-flex16-item2">
          <div class="int-emp-group layout">
            <div class="int-emp-txt48 layout">Ing. Sistemas Computacionales</div>
          </div>
        </div>
        <div class="int-emp-flex16-item3">
          <div class="int-emp-group60 layout">
            <div class="int-emp-txt49 layout">Big Data</div>
          </div>
        </div>
        <div class="int-emp-txt50 layout">Doctorado en Big Data</div>
        <div class="int-emp-flex16-item4">
          <div class="int-emp-group layout22"></div>
        </div>
        <div class="int-emp-flex16-item5">
          <div class="int-emp-group layout23">
            <div class="int-emp-txt51 layout">Experiencia</div>
          </div>
        </div>
        <div class="int-emp-flex16-item6">
          <div class="int-emp-group layout24">
            <div class="int-emp-txt52 layout">Space X</div>
          </div>
        </div>
        <div class="int-emp-flex16-item7">
          <div class="int-emp-group layout">
            <div class="int-emp-group61 layout">
              <div class="int-emp-flex8 layout">
                <div class="int-emp-flex8-item">
                  <div class="int-emp-group62 layout">
                    <div style="--src:url(http://localhost/PaginaWebFinal/assets/e3c249304af00aceeedbd44befdb0c0a.png)" class="int-emp-img layout27"></div>
                  </div>
                </div>
                <div class="int-emp-flex8-spacer"></div>
                <div class="int-emp-txt53 layout">Pending</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="int-emp-group layout25">
        <div class="int-emp-group63 layout">
          <div class="int-emp-group64 layout">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/7b6e79a7aba1ac0d643fff0c65e1e93a.png)" class="int-emp-img layout28"></div>
          </div>
          <div class="int-emp-group65 layout">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/a0a39c89bd8df0b5956aee4cb9d21818.png)" class="int-emp-img layout29"></div>
          </div>
          <div class="int-emp-group66 layout">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/d10978458d61fcac6b7ef9c01df88df6.png)" class="int-emp-img layout30"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="int-emp-group67 layout">
      <div class="int-emp-flex19 layout">
        <div class="int-emp-flex19-item">
          <div class="int-emp-group layout">
            <label class="container">
              <input type="checkbox" checked="checked">
              <span class="checkmark"></span>
            </label>
          </div>
        </div>
        <div class="int-emp-flex19-item1">
          <div class="int-emp-group layout">
            <div class="int-emp-flex5 layout">
              <div class="int-emp-txt54 layout">Homer Simpson</div>
              <div class="int-emp-txt55 layout">Safety manager</div>
            </div>
          </div>
        </div>
        <div class="int-emp-flex19-item2">
          <div class="int-emp-group layout">
            <div class="int-emp-txt56 layout">Ing. Sistemas Computacionales</div>
          </div>
        </div>
        <div class="int-emp-flex19-item3">
          <div class="int-emp-group69 layout">
            <div class="int-emp-txt57 layout">Negocios Digitales</div>
          </div>
        </div>
        <div class="int-emp-txt58 layout">Doctorado en Big Data</div>
        <div class="int-emp-flex19-item4">
          <div class="int-emp-group layout26"></div>
        </div>
        <div class="int-emp-flex19-item5">
          <div class="int-emp-group layout27">
            <div class="int-emp-txt59 layout">Blockchain y criptomonedas</div>
          </div>
        </div>
        <div class="int-emp-flex19-item6">
          <div class="int-emp-group layout28">
            <div class="int-emp-txt60 layout">Oxxo</div>
          </div>
        </div>
        <div class="int-emp-flex19-item7">
          <div class="int-emp-group layout">
            <div class="int-emp-group70 layout">
              <div class="int-emp-flex11 layout">
                <div class="int-emp-flex11-item">
                  <div class="int-emp-group71 layout">
                    <div style="--src:url(http://localhost/PaginaWebFinal/assets/8cc8ecddf859ba9f36ddea87cc10138d.png)" class="int-emp-img layout32"></div>
                  </div>
                </div>
                <div class="int-emp-flex11-spacer"></div>
                <div class="int-emp-txt61 layout">Stopped</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="int-emp-group layout29">
        <div class="int-emp-group72 layout">
          <div class="int-emp-group73 layout">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/7b6e79a7aba1ac0d643fff0c65e1e93a.png)" class="int-emp-img layout33"></div>
          </div>
          <div class="int-emp-group74 layout">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/a0a39c89bd8df0b5956aee4cb9d21818.png)" class="int-emp-img layout34"></div>
          </div>
          <div class="int-emp-group75 layout">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/d10978458d61fcac6b7ef9c01df88df6.png)" class="int-emp-img layout35"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="int-emp-group76 layout">
      <div class="int-emp-flex22 layout">
        <div class="int-emp-flex22-item">
          <label class="container">
            <input type="checkbox" checked="checked">
            <span class="checkmark"></span>
          </label>
        </div>
        <div class="int-emp-flex22-item1">
          <div class="int-emp-group layout">
            <div class="int-emp-flex5 layout">
              <div class="int-emp-txt62 layout">Idris Elba</div>
              <div class="int-emp-txt63 layout">Actor</div>
            </div>
          </div>
        </div>
        <div class="int-emp-flex22-item2">
          <div class="int-emp-group layout">
            <div class="int-emp-txt64 layout">Ing. Sistemas Computacionales</div>
          </div>
        </div>
        <div class="int-emp-flex22-item3">
          <div class="int-emp-group77 layout">
            <div class="int-emp-txt65 layout">Videojuegos</div>
          </div>
        </div>
        <div class="int-emp-txt66 layout">Doctorado en Big Data</div>
        <div class="int-emp-flex22-item4">
          <div class="int-emp-group layout30"></div>
        </div>
        <div class="int-emp-flex22-item5">
          <div class="int-emp-group layout31">
            <div class="int-emp-txt67 layout">Interesado en el desarrollo de Unity</div>
          </div>
        </div>
        <div class="int-emp-flex22-item6">
          <div class="int-emp-group layout32">
            <div class="int-emp-txt68 layout">Banorte</div>
          </div>
        </div>
        <div class="int-emp-flex22-item7">
          <div class="int-emp-group layout33"></div>
        </div>
      </div>
      <div class="int-emp-group layout34">
        <div class="int-emp-group78 layout">
          <div class="int-emp-group79 layout">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/7b6e79a7aba1ac0d643fff0c65e1e93a.png)" class="int-emp-img layout36"></div>
          </div>
          <div class="int-emp-group80 layout">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/a0a39c89bd8df0b5956aee4cb9d21818.png)" class="int-emp-img layout37"></div>
          </div>
          <div class="int-emp-group81 layout">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/d10978458d61fcac6b7ef9c01df88df6.png)" class="int-emp-img layout38"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="int-emp-group82 layout">
      <div class="int-emp-flex24 layout">
        <div class="int-emp-flex24-item">
          <div class="int-emp-group layout">
            <label class="container">
              <input type="checkbox" checked="checked">
              <span class="checkmark"></span>
            </label>
          </div>
        </div>
        <div class="int-emp-flex24-item1">
          <div class="int-emp-group layout">
            <div class="int-emp-flex5 layout">
              <div class="int-emp-txt69 layout">Luis Alberto Camarena</div>
              <div class="int-emp-txt70 layout">Capitan assistant</div>
            </div>
          </div>
        </div>
        <div class="int-emp-flex24-item2">
          <div class="int-emp-group layout">
            <div class="int-emp-txt71 layout">Ing. Sistemas Computacionales</div>
          </div>
        </div>
        <div class="int-emp-flex24-item3">
          <div class="int-emp-group83 layout">
            <div class="int-emp-txt72 layout">Arquitectura de redes</div>
          </div>
        </div>
        <div class="int-emp-txt73 layout">Doctorado en Big Data</div>
        <div class="int-emp-flex24-item4">
          <div class="int-emp-group layout35"></div>
        </div>
        <div class="int-emp-flex24-item5">
          <div class="int-emp-group layout36">
            <div class="int-emp-txt74 layout">Nuevos retos</div>
          </div>
        </div>
        <div class="int-emp-flex24-item6">
          <div class="int-emp-group layout37">
            <div class="int-emp-txt75 layout">Kiosko</div>
          </div>
        </div>
        <div class="int-emp-flex24-item7">
          <div class="int-emp-group layout">
            <div class="int-emp-group84 layout"></div>
          </div>
        </div>
      </div>
      <div class="int-emp-group layout38">
        <div class="int-emp-group85 layout">
          <div class="int-emp-group86 layout">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/7b6e79a7aba1ac0d643fff0c65e1e93a.png)" class="int-emp-img layout39"></div>
          </div>
          <div class="int-emp-group87 layout">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/a0a39c89bd8df0b5956aee4cb9d21818.png)" class="int-emp-img layout40"></div>
          </div>
          <div class="int-emp-group88 layout">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/d10978458d61fcac6b7ef9c01df88df6.png)" class="int-emp-img layout41"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="int-emp-group89 layout">
      <div class="int-emp-flex26 layout">
        <div class="int-emp-flex26-item">
          <div class="int-emp-group layout">
            <label class="container">
              <input type="checkbox" checked="checked">
              <span class="checkmark"></span>
            </label>
          </div>
        </div>
        <div class="int-emp-flex26-item1">
          <div class="int-emp-group layout">
            <div class="int-emp-flex5 layout">
              <div class="int-emp-txt76 layout">Don Draper</div>
              <div class="int-emp-txt77 layout">Creative Director</div>
            </div>
          </div>
        </div>
        <div class="int-emp-flex26-item2">
          <div class="int-emp-group layout">
            <div class="int-emp-txt78 layout">Ing. Sistemas Computacionales</div>
          </div>
        </div>
        <div class="int-emp-flex26-item3">
          <div class="int-emp-group91 layout">
            <div class="int-emp-txt79 layout">Desarrollo web</div>
          </div>
        </div>
        <div class="int-emp-txt80 layout">Doctorado en Big Data</div>
        <div class="int-emp-flex26-item4">
          <div class="int-emp-group layout39"></div>
        </div>
        <div class="int-emp-flex26-item5">
          <div class="int-emp-group layout40">
            <div class="int-emp-txt81 layout">Dessarrollar nuevas habilidades</div>
          </div>
        </div>
        <div class="int-emp-flex26-item6">
          <div class="int-emp-group layout41">
            <div class="int-emp-txt82 layout">Cartoon Network</div>
          </div>
        </div>
        <div class="int-emp-flex26-item7">
          <div class="int-emp-group layout">
            <div class="int-emp-group92 layout">
              <div class="int-emp-flex8 layout">
                <div class="int-emp-flex8-item">
                  <div class="int-emp-group93 layout">
                    <div style="--src:url(http://localhost/PaginaWebFinal/assets/e3c249304af00aceeedbd44befdb0c0a.png)" class="int-emp-img layout43"></div>
                  </div>
                </div>
                <div class="int-emp-flex8-spacer"></div>
                <div class="int-emp-txt83 layout">Pending</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="int-emp-group layout42">
        <div class="int-emp-group94 layout">
          <div class="int-emp-group95 layout">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/7b6e79a7aba1ac0d643fff0c65e1e93a.png)" class="int-emp-img layout44"></div>
          </div>
          <div class="int-emp-group96 layout">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/a0a39c89bd8df0b5956aee4cb9d21818.png)" class="int-emp-img layout45"></div>
          </div>
          <div class="int-emp-group97 layout">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/d10978458d61fcac6b7ef9c01df88df6.png)" class="int-emp-img layout46"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="int-emp-group98 layout">
      <div class="int-emp-flex29 layout">
        <div class="int-emp-flex29-item">
          <div class="int-emp-group layout43">
            <label class="container">
              <input type="checkbox" checked="checked">
              <span class="checkmark"></span>
            </label>
          </div>
        </div>
        <div class="int-emp-flex29-item1">
          <div class="int-emp-group layout">
            <div class="int-emp-flex5 layout">
              <div class="int-emp-txt84 layout">Homer Simpson</div>
              <div class="int-emp-txt85 layout">Safety manager</div>
            </div>
          </div>
        </div>
        <div class="int-emp-flex29-item2">
          <div class="int-emp-group layout">
            <div class="int-emp-txt86 layout">Ing. Sistemas Computacionales</div>
          </div>
        </div>
        <div class="int-emp-flex29-item3">
          <div class="int-emp-group100 layout">
            <div class="int-emp-txt87 layout">Inteligencia Artificial</div>
          </div>
        </div>
        <div class="int-emp-txt88 layout">Doctorado en Big Data</div>
        <div class="int-emp-flex29-item4">
          <div class="int-emp-group layout44"></div>
        </div>
        <div class="int-emp-flex29-item5">
          <div class="int-emp-group layout45">
            <div class="int-emp-txt89 layout">Aprender</div>
          </div>
        </div>
        <div class="int-emp-flex29-item6">
          <div class="int-emp-group layout46">
            <div class="int-emp-txt90 layout">Google</div>
          </div>
        </div>
        <div class="int-emp-flex29-item7">
          <div class="int-emp-group layout">
            <div class="int-emp-group101 layout">
              <div class="int-emp-flex11 layout">
                <div class="int-emp-flex11-item">
                  <div class="int-emp-group102 layout">
                    <div style="--src:url(http://localhost/PaginaWebFinal/assets/8cc8ecddf859ba9f36ddea87cc10138d.png)" class="int-emp-img layout48"></div>
                  </div>
                </div>
                <div class="int-emp-flex11-spacer"></div>
                <div class="int-emp-txt91 layout">Stopped</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="int-emp-group layout47">
        <div class="int-emp-group103 layout">
          <div class="int-emp-group104 layout">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/7b6e79a7aba1ac0d643fff0c65e1e93a.png)" class="int-emp-img layout49"></div>
          </div>
          <div class="int-emp-group105 layout">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/a0a39c89bd8df0b5956aee4cb9d21818.png)" class="int-emp-img layout50"></div>
          </div>
          <div class="int-emp-group106 layout">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/d10978458d61fcac6b7ef9c01df88df6.png)" class="int-emp-img layout51"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="int-emp-group107 layout">
      <div class="int-emp-flex32 layout">
        <div class="int-emp-flex32-item">
          <label class="container">
            <input type="checkbox" checked="checked">
            <span class="checkmark"></span>
          </label>
        </div>
        <div class="int-emp-flex32-item1">
          <div class="int-emp-group layout">
            <div class="int-emp-flex5 layout">
              <div class="int-emp-txt92 layout">Idris Elba</div>
              <div class="int-emp-txt93 layout">Actor</div>
            </div>
          </div>
        </div>
        <div class="int-emp-flex32-item2">
          <div class="int-emp-group layout">
            <div class="int-emp-txt94 layout">Ing. Sistemas Computacionales</div>
          </div>
        </div>
        <div class="int-emp-flex32-item3">
          <div class="int-emp-group108 layout">
            <div class="int-emp-txt95 layout">Ciberseguridad</div>
          </div>
        </div>
        <div class="int-emp-txt96 layout">Doctorado en Big Data</div>
        <div class="int-emp-flex32-item4">
          <div class="int-emp-group layout48"></div>
        </div>
        <div class="int-emp-flex32-item5">
          <div class="int-emp-group layout49">
            <div class="int-emp-txt97 layout">Aportar</div>
          </div>
        </div>
        <div class="int-emp-flex32-item6">
          <div class="int-emp-group layout50">
            <div class="int-emp-txt98 layout">Tesla</div>
          </div>
        </div>
        <div class="int-emp-flex32-item7">
          <div class="int-emp-group layout51"></div>
        </div>
      </div>
      <div class="int-emp-group layout52">
        <div class="int-emp-group109 layout">
          <div class="int-emp-group110 layout">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/7b6e79a7aba1ac0d643fff0c65e1e93a.png)" class="int-emp-img layout52"></div>
          </div>
          <div class="int-emp-group111 layout">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/a0a39c89bd8df0b5956aee4cb9d21818.png)" class="int-emp-img layout53"></div>
          </div>
          <div class="int-emp-group112 layout">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/d10978458d61fcac6b7ef9c01df88df6.png)" class="int-emp-img layout54"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="int-emp-cover-group12 layout">
      <div class="int-emp-group layout53">
        <div class="int-emp-cover-group11 layout">
          <div class="int-emp-flex34 layout">
            <div class="int-emp-flex35 layout">
              <div class="int-emp-flex35-item">
                <div class="int-emp-cover-block1 layout"></div>
              </div>
              <div class="int-emp-flex35-spacer"></div>
              <div class="int-emp-flex35-item">
                <div class="int-emp-cover-block1 layout"></div>
              </div>
            </div>
            <div class="int-emp-flex36 layout">
              <div class="int-emp-flex36-item">
                <div class="int-emp-cover-block1 layout"></div>
              </div>
              <div class="int-emp-flex36-spacer"></div>
              <div class="int-emp-flex36-item">
                <div class="int-emp-cover-block1 layout"></div>
              </div>
            </div>
          </div>
        </div>
        <div style="--src:url(http://localhost/PaginaWebFinal/assets/3b3ce0d989dcd5ddee6ba7e50aa7b4c6.png)" class="int-emp-cover-group10 layout">
          <div style="--src:url(http://localhost/PaginaWebFinal/assets/3b3ce0d989dcd5ddee6ba7e50aa7b4c6.png)" class="int-emp-img layout55"></div>
        </div>
        <div style="--src:url(http://localhost/PaginaWebFinal/assets/8f83a7d1f3e5bec5c47bfeba6a103133.png)" class="int-emp-cover-group9 layout">
          <div style="--src:url(http://localhost/PaginaWebFinal/assets/6b2a8b41bff1a2cfdc7f576557253bb8.png)" class="int-emp-cover-group8 layout">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/6b2a8b41bff1a2cfdc7f576557253bb8.png)" class="int-emp-img layout56"></div>
          </div>
          <div style="--src:url(/assets/8f83a7d1f3e5bec5c47bfeba6a103133.png)" class="int-emp-img layout57"></div>
        </div>
        <div class="int-emp-cover-group7 layout"></div>
        <div class="int-emp-cover-group6 layout"></div>
        <div class="int-emp-cover-group5 layout"></div>
        <div class="int-emp-cover-group4 layout">
          <div style="--src:url(http://localhost/PaginaWebFinal/assets/2805d49bbf7338977dcbdb48755c9baa.png)" class="int-emp-cover-group3 layout">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/2805d49bbf7338977dcbdb48755c9baa.png)" class="int-emp-img layout58"></div>
          </div>
          <div style="--src:url(http://localhost/PaginaWebFinal/assets/cea2953d5f057da721482fde9542f499.png)" class="int-emp-cover-group2 layout">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/cea2953d5f057da721482fde9542f499.png)" class="int-emp-img layout59"></div>
          </div>
          <div class="int-emp-rect8 layout"></div>
        </div>
        <div style="--src:url(http://localhost/PaginaWebFinal/assets/7323574fa6f9b67892c5c58f273263e8.png)" class="int-emp-cover-group1 layout">
          <div style="--src:url(http://localhost/PaginaWebFinal/assets/7323574fa6f9b67892c5c58f273263e8.png)" class="int-emp-img layout60"></div>
        </div>

      </div>
    </div>
    <div class="int-emp-txt99 layout">Customer Support Assistant I</div>
    <px-posize x="561fr 66px 1101fr" y="139px 62px 916px" absolute="true"></px-posize>
    <px-posize x="559fr 69px 1100fr" y="157px 25px 935px" absolute="true">
  </div>
  </px-posize>
  <div class="int-emp-txt100 layout">No. de aplicantes (12)</div>
  <px-posize x="109fr 32px 1587fr" y="99px 37px 981px" absolute="true">
    <div class="int-emp-img4" style="--src:url(http://localhost/PaginaWebFinal/assets/92895f952a3b0e1dbe9da3e6806941ae.png)"></div>
  </px-posize>
  </div>
  <script type="text/javascript">
    AOS.init();
  </script>
</body>

</html>