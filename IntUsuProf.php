<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['CorreoElectronico'])){
  header('location:IniciarSesion.php');
}

$correoValida = $_SESSION['CorreoElectronico'];

// Verificar en base de datos
$buscaUsuario = " SELECT * FROM usuarios WHERE correo = '$correoValida'"; //Prueba para ver si me valida 
$validaUsuario = mysqli_query($conn, $buscaUsuario);
if(mysqli_num_rows($validaUsuario) == 0){
  $error[] = 'No existe usuario';
  header('location:Cuenta.php');
}

if (isset($_POST['submit'])){ 
  $CorreoElectronico = $_SESSION['CorreoElectronico'];
  header('location:CrearCV.php');
}

$vacante1 = "SELECT * FROM vacantes WHERE ID_vacante = 1"; // Este es el dos (Toshiba)
$query1 = mysqli_query($conn, $vacante1);

$row1 = mysqli_fetch_array($query1);

$vacante2 = "SELECT * FROM vacantes WHERE ID_vacante = 2"; // Este es el uno (Oracle)
$query2 = mysqli_query($conn, $vacante2);

$row2 = mysqli_fetch_array($query2);

$vacante3 = "SELECT * FROM vacantes WHERE ID_vacante = 3"; // Este es el tres (GetinSoft)
$query3 = mysqli_query($conn, $vacante3);

$row3 = mysqli_fetch_array($query3);

if (isset($_POST['Aplicate1'])){ 
  $_SESSION['Vacante'] = $row2['ID_vacante'];
  $vacante = $row2['ID_vacante'];
  $referenceNumber = mysqli_real_escape_string($conn, $_POST[$vacante]);
  $referenceNumber = intval($referenceNumber);
  $_SESSION['Vacante'] = $referenceNumber ;
  
  header('location:UsuProf2.php');
}

if (isset($_POST['Aplicate2'])){ 
  $_SESSION['Vacante'] = $row1['ID_vacante'];
  header('location:UsuProf2.php');
}

if (isset($_POST['Aplicate3'])){ 
  $_SESSION['Vacante'] = $row3['ID_vacante'];
  header('location:UsuProf2.php');
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
    <link rel="stylesheet" type="text/css" href="css/IntUsuProf.css" />

    <script type="text/javascript" src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script type="text/javascript" src="https://unpkg.com/headroom.js@0.12.0/dist/headroom.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/px2code/posize/build/v1.00.5.js"></script>
  </head>

  <body style="display: flex; flex-direction: column">
    <div class="int-usu-prof int-usu-prof-block layout">
      <div class="int-usu-prof-flex layout">
        <div class="int-usu-prof-flex-item">
          <div class="int-usu-prof-cover-block16 layout">
            <div class="int-usu-prof-flex1 layout">
              <div
                style="--src:url(http://localhost/PaginaWebFinal/assets/7323574fa6f9b67892c5c58f273263e8.png)"
                class="int-usu-prof-icon6 layout"
              ></div>
              <div class="int-usu-prof-cover-block15 layout">
                <div class="int-usu-prof-flex2 layout">
                  <div class="int-usu-prof-flex2-item">
                    <div class="int-usu-prof-flex3 layout">
                      <div class="int-usu-prof-box2 layout"></div>
                      <div class="int-usu-prof-box5 layout"></div>
                    </div>
                  </div>
                  <div class="int-usu-prof-flex2-spacer"></div>
                  <div class="int-usu-prof-flex2-item">
                    <div class="int-usu-prof-flex4 layout">
                      <div class="int-usu-prof-box3 layout"></div>
                      <div class="int-usu-prof-box4 layout"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="int-usu-prof-cover-block13 layout">
                <div
                  style="--src:url(http://localhost/PaginaWebFinal/assets/2eae75f79ebf95c0ee4dbc57f6f284bf.png)"
                  class="int-usu-prof-image3 layout"
                ></div>
                <div
                  style="--src:url(http://localhost/PaginaWebFinal/assets/18e2e2dc8fe09cd974e7d2be3ea2adfd.png)"
                  class="int-usu-prof-image4 layout"
                ></div>
              </div>
              <div class="int-usu-prof-flex5 layout">
                <div class="int-usu-prof-flex5-item"><div class="int-usu-prof-box9 layout"></div></div>
                <div class="int-usu-prof-flex5-spacer"></div>
                <div class="int-usu-prof-flex5-item"><div class="int-usu-prof-box7 layout"></div></div>
                <div class="int-usu-prof-flex5-spacer"></div>
                <div class="int-usu-prof-flex5-item"><div class="int-usu-prof-box8 layout"></div></div>
              </div>
              <div
                style="--src:url(http://localhost/PaginaWebFinal/assets/1eea1a8715c573a5471bf7e21ba2dfb7.png)"
                class="int-usu-prof-image layout"
              ></div>
              <div
                style="--src:url(http://localhost/PaginaWebFinal/assets/5c02a89a277a49e5189745732f210d9b.png)"
                class="int-usu-prof-icon1 layout"
              ></div>
              <div
                style="--src:url(http://localhost/PaginaWebFinal/assets/8f83a7d1f3e5bec5c47bfeba6a103133.png)"
                class="int-usu-prof-cover-block14 layout"
              >
                <div
                  style="--src:url(http://localhost/PaginaWebFinal/assets/6b2a8b41bff1a2cfdc7f576557253bb8.png)"
                  class="int-usu-prof-image2 layout"
                ></div>
              </div>
            </div>
          </div>
        </div>
        <div class="int-usu-prof-flex-spacer"></div>
        <div class="int-usu-prof-flex-item1">
          <div class="int-usu-prof-flex6 layout">
            <div class="int-usu-prof-flex7 layout">
              <h1 class="int-usu-prof-big-title layout">Oportunidades de trabajo para <?php echo $_SESSION['CorreoElectronico']?></h1>
              <div class="int-usu-prof-flex7-spacer"></div>
              <div class="int-usu-prof-flex7-item">
                <div class="int-usu-prof-cover-block1 layout">
                  <form action="" method="post">
                  <input type = "submit" name ="submit" value="Crear CV" class="int-usu-prof-text-body5 layout">
                  </form>
                </div>
              </div>
              <div class="int-usu-prof-flex7-spacer1"></div>
              <div class="int-usu-prof-flex7-item1">
                <div
                  style="--src:url(http://localhost/PaginaWebFinal/assets/b0461e330ea3f041fd76eac055c61397.png)"
                  class="int-usu-prof-cover-block17 layout"
                >
                  <div
                    style="--src:url(http://localhost/PaginaWebFinal/assets/0247ef7e399fc3f1c444b97a9d2dece4.png)"
                    class="int-usu-prof-image18 layout"
                  ></div>
                </div>
              </div>
              <div class="int-usu-prof-flex7-spacer2"></div>
              <div class="int-usu-prof-flex7-item2">
                <div class="int-usu-prof-block1 layout">
                  <div
                    style="--src:url(http://localhost/PaginaWebFinal/assets/e1b8c76181004a3e9e95a1151056a5c1.png)"
                    class="int-usu-prof-icon2 layout"
                  ></div>
                </div>
              </div>
              <div class="int-usu-prof-flex7-spacer3"></div>
              <div class="int-usu-prof-flex7-item3">
                <div class="int-usu-prof-block2 layout">
                  <div
                    style="--src:url(http://localhost/PaginaWebFinal/assets/601449fdf3b988c9624f92ad1efe381a.png)"
                    class="int-usu-prof-image5 layout"
                  ></div>
                </div>
              </div>
              <div class="int-usu-prof-flex7-spacer4"></div>
              <div class="int-usu-prof-flex7-item4">
                <div
                  style="--src:url(http://localhost/PaginaWebFinal/assets/6db786cae790c9b78f84af356252d24b.png)"
                  class="int-usu-prof-icon3 layout"
                ></div>
              </div>
            </div>
            <div class="int-usu-prof-flex8 layout">
              <div class="int-usu-prof-flex8-item">
                <div class="int-usu-prof-cover-block10 layout">
                  <h5 class="int-usu-prof-highlights2 layout">Abiertas</h5>
                </div>
              </div>
              <div class="int-usu-prof-flex8-spacer"></div>
              <div class="int-usu-prof-flex8-item">
                <div class="int-usu-prof-cover-block11 layout">
                  <h5 class="int-usu-prof-highlights1 layout">Pendientes</h5>
                </div>
              </div>
              <div class="int-usu-prof-flex8-spacer"></div>
              <div class="int-usu-prof-flex8-item1">
                <div class="int-usu-prof-cover-block12 layout">
                  <h5 class="int-usu-prof-highlights1 layout">Aceptadas</h5>
                </div>
              </div>
              <div class="int-usu-prof-flex8-spacer1"></div>
              <h5 class="int-usu-prof-highlights layout">Definir Zona Horaria</h5>
              <div class="int-usu-prof-flex8-spacer2"></div>
              <div class="int-usu-prof-flex8-item2">
                <div class="int-usu-prof-content-box layout">
                  <div class="int-usu-prof-text-body layout">GMT+06:00 Astana, UK</div>
                  <div class="int-usu-prof-content-box-spacer"></div>
                  <div class="int-usu-prof-content-box-item">
                    <div
                      style="--src:url(http://localhost/PaginaWebFinal/assets/e1dd2116b0f75109122cb8810416a881.png)"
                      class="int-usu-prof-image6 layout"
                    ></div>
                  </div>
                </div>
              </div>
            </div>
            <h4 class="int-usu-prof-highlights3 layout">Hoy, 25 de abril</h4>
            <div class="int-usu-prof-group layout1">
              <div class="int-usu-prof-cover-block9 layout">
                <div class="int-usu-prof-flex9 layout">
                  <div class="int-usu-prof-flex10 layout">
                    <h3 class="int-usu-prof-subtitle layout">Software engineer intern - Oracle</h3>
                    <div class="int-usu-prof-flex10-spacer"></div>
                    <div class="int-usu-prof-flex10-item">
                      <div
                        style="--src:url(http://localhost/PaginaWebFinal/assets/80e7ac964c28c99f2c5d445d357fc5f4.png)"
                        class="int-usu-prof-image15 layout"
                      ></div>
                    </div>
                  </div>
                  <div class="int-usu-prof-paragraph-body layout">
                  <?php echo $row2['intro']; ?>
                  </div>
                  <div class="int-usu-prof-flex11 layout">
                    <div class="int-usu-prof-text-body2 layout">#software</div>
                    <div class="int-usu-prof-flex11-spacer"></div>
                    <div class="int-usu-prof-text-body2 layout">#trabajo</div>
                    <div class="int-usu-prof-flex11-spacer1"></div>
                    <div class="int-usu-prof-text-body2 layout">#intern</div>
                  </div>
                  <div class="int-usu-prof-flex12 layout">
                    <div class="int-usu-prof-flex12-item">
                      <div class="int-usu-prof-group layout">
                        <div class="int-usu-prof-cover-group layout">
                          <div
                            style="--src:url(http://localhost/PaginaWebFinal/assets/c06e8a1512a76b3c5454794cef531957.png)"
                            class="int-usu-prof-group1 layout"
                          >
                            <div
                              style="--src:url(http://localhost/PaginaWebFinal/assets/56e30d43634fe4b4eee9dbe4ebe9c1d9.png)"
                              class="int-usu-prof-image16 layout"
                            ></div>
                          </div>
                        </div>
                        <div
                          style="--src:url(http://localhost/PaginaWebFinal/assets/dfda6ca516cd214360dc79f008f28d25.png)"
                          class="int-usu-prof-block3 layout"
                        ></div>
                        <div
                          style="--src:url(http://localhost/PaginaWebFinal/assets/9d933c6a9c4cfbf110f1c80278b842ec.png)"
                          class="int-usu-prof-image17 layout"
                        ></div>
                      </div>
                    </div>
                    <div class="int-usu-prof-flex12-spacer"></div>
                    <div class="int-usu-prof-small-text-body layout">Publicado hoy 11:32pm</div>
                    <div class="int-usu-prof-flex12-spacer1"></div>
                    <div class="int-usu-prof-flex12-item1">
                      <div class="int-usu-prof-cover-block2 layout">
                        <a href="Vacanteprof.php" style="text-decoration:none;"><div class="int-usu-prof-text-body2 layout1">Ver</div></a>
                      </div>
                    </div>
                    <div class="int-usu-prof-flex12-spacer2"></div>
                    <div class="int-usu-prof-flex12-item2">
                      <div class="int-usu-prof-cover-block3 layout">
                      <form action="" method="post">
                        <!--<a href="UsuProf1.php" style="text-decoration:none;"><div class="int-usu-prof-text-body1 layout">Aplicar ahora</div></a> Aplicar ahora NO VACANTE-->
                        <input type = "submit" name ="Aplicate1" value="Aplicar ahora" class="int-usu-prof-text-body5 layout">
                      </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div
                style="--src:url(http://localhost/PaginaWebFinal/assets/9a5b7a06aad50440d2eb287187ec6dfc.png)"
                class="int-usu-prof-cover-block layout"
              >
                <div
                  style="--src:url(http://localhost/PaginaWebFinal/assets/36f3a87f9d158cecc4f21dfe83a80c31.png)"
                  class="int-usu-prof-image10 layout"
                ></div>
                <px-posize x="171fr 43px 16fr" y="134px 104px 0px" absolute="true"
                  ><div
                    class="int-usu-prof-image11"
                    style="--src:url(http://localhost/PaginaWebFinal/assets/7d4aaf8f47c94336c8e3c4892398c594.png)"
                  ></div
                ></px-posize>
                <div class="int-usu-prof-cover-group2 layout">
                  <div
                    style="--src:url(http://localhost/PaginaWebFinal/assets/b22b81424bec3cd1a3d38ebdea16dbb2.png)"
                    class="int-usu-prof-image12 layout"
                  ></div>
                  <div
                    style="--src:url(http://localhost/PaginaWebFinal/assets/8e4c8b1021a8561d15326ad427e1e8cc.png)"
                    class="int-usu-prof-cover1 layout"
                  ></div>
                </div>
                <px-posize x="18fr 43px 169fr" y="4px 104px 130px" absolute="true"
                  ><div
                    class="int-usu-prof-image11"
                    style="--src:url(http://localhost/PaginaWebFinal/assets/4bf7e3ae87eb183a1ac857109e897719.png)"
                  ></div
                ></px-posize>
              </div>
            </div>
            <div class="int-usu-prof-cover-block6 layout">
              <div class="int-usu-prof-flex13 layout">
                <div class="int-usu-prof-flex13-item">
                  <div
                    style="--src:url(http://localhost/PaginaWebFinal/assets/Toshibathird.png)"
                    class="int-usu-prof-image13 layout"
                  ></div>
                </div>
                <div class="int-usu-prof-flex13-spacer"></div>
                <div class="int-usu-prof-flex13-item1">
                  <div class="int-usu-prof-flex14 layout">
                    <div class="int-usu-prof-flex15 layout">
                      <h3 class="int-usu-prof-subtitle layout1">Software Test Engineer III</h3>
                      <div class="int-usu-prof-flex15-spacer"></div>
                      <div class="int-usu-prof-flex15-item">
                        <div
                          style="--src:url(http://localhost/PaginaWebFinal/assets/80e7ac964c28c99f2c5d445d357fc5f4.png)"
                          class="int-usu-prof-image15 layout1"
                        ></div>
                      </div>
                    </div>
                    <div class="int-usu-prof-paragraph-body layout1">
                    <?php echo $row1['intro']; ?>
                    </div>
                    <div class="int-usu-prof-flex16 layout">
                      <div class="int-usu-prof-text-body2 layout">#software</div>
                      <div class="int-usu-prof-flex16-spacer"></div>
                      <div class="int-usu-prof-text-body2 layout">#trabajo</div>
                      <div class="int-usu-prof-flex16-spacer1"></div>
                      <div class="int-usu-prof-text-body2 layout">#intern</div>
                    </div>
                    <div class="int-usu-prof-flex17 layout">
                      <div class="int-usu-prof-flex17-item">
                        <div class="int-usu-prof-cover-group1 layout">
                          <div
                            style="--src:url(http://localhost/PaginaWebFinal/assets/1fe75c22eb321d7b3988fb6a847533ba.png)"
                            class="int-usu-prof-icon4 layout"
                          ></div>
                          <div
                            style="--src:url(http://localhost/PaginaWebFinal/assets/de8823913ca2abfa33906fc19678e927.png)"
                            class="int-usu-prof-icon7 layout"
                          ></div>
                        </div>
                      </div>
                      <div class="int-usu-prof-flex17-spacer"></div>
                      <div class="int-usu-prof-small-text-body1-box layout">
                        <pre class="int-usu-prof-small-text-body1">Publicado hoy 5:20 pm </pre>
                      </div>
                      <div class="int-usu-prof-flex17-spacer1"></div>
                      <div class="int-usu-prof-flex17-item1">
                        <div class="int-usu-prof-cover-block2 layout">
                          <a href="Vacanteprof2.php" style="text-decoration:none;">
                            <div class="int-usu-prof-text-body2 layout2">Ver</div>
                          </a>
                        </div>
                      </div>
                      <div class="int-usu-prof-flex17-spacer2"></div>
                      <div class="int-usu-prof-flex17-item2">
                        <div class="int-usu-prof-cover-block3 layout">
                          <!--<a href="UsuProf1.php" style="text-decoration:none;">
                            <div class="int-usu-prof-text-body1 layout">Aplicar ahora</div>
                          </a>-->
                          <form action="" method="post">
                          <input type = "submit" name ="Aplicate2" value="Aplicar ahora" class="int-usu-prof-text-body5 layout">
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <h4 class="int-usu-prof-highlights3 layout">Ayer, 24 de abril</h4>
            <div class="int-usu-prof-flex6-item">
              <div class="int-usu-prof-cover-group4 layout">
                <px-posize x="488fr 11px 765fr" y="21px 11px 210px" absolute="true"
                  ><div class="int-usu-prof-icon5" style="--src:url(http://localhost/PaginaWebFinal/assets/401c08b9ec450675d063c437fde8ff0d.png)"></div
                ></px-posize>
                <div class="int-usu-prof-box14 layout"></div>
                <div class="int-usu-prof-cover-block3 layout1">
                  <!--<a href="UsuProf1.php" style="text-decoration:none;">
                    <div class="int-usu-prof-text-body1 layout1">Aplicar ahora</div>
                  </a>-->
                  <form action="" method="post">
                  <input type = "submit" name ="Aplicate3" value="Aplicar ahora" class="int-usu-prof-text-body1 layout1">
                  </form>
                </div>
                <div class="int-usu-prof-cover-block2 layout1">
                  <a href="Vacanteprof3.php" style="text-decoration:none;">
                    <div class="int-usu-prof-text-body2 layout3">Ver</div>
                  </a>
                </div>
                <div class="int-usu-prof-paragraph-body1-box layout">
                  <pre class="int-usu-prof-paragraph-body1">
                  <?php echo $row3['intro']; ?></pre
                  >
                </div>
                <div class="int-usu-prof-text-body2 layout4">#nft</div>
                <div class="int-usu-prof-text-body2 layout5">#3dnfts</div>
                <div class="int-usu-prof-text-body2 layout6">#NFTs</div>
                <div class="int-usu-prof-cover-group3 layout">
                  <div
                    style="--src:url(http://localhost/PaginaWebFinal/assets/1fe75c22eb321d7b3988fb6a847533ba.png)"
                    class="int-usu-prof-icon4 layout1"
                  ></div>
                  <div
                    style="--src:url(http://localhost/PaginaWebFinal/assets/6114b2c347029943866dcbc63887c051.png)"
                    class="int-usu-prof-image8 layout"
                  ></div>
                </div>
                <div class="int-usu-prof-small-text-body layout1">This post will be published Today at 08:30 AM</div>
                <div
                  style="--src:url(http://localhost/PaginaWebFinal/assets/0d5434093be9553a3550483adf558c57.png)"
                  class="int-usu-prof-image14 layout"
                ></div>
                <px-posize x="1209fr 17px 38fr" y="28px 27px 187px" absolute="true"
                  ><div
                    class="int-usu-prof-image151"
                    style="--src:url(http://localhost/PaginaWebFinal/assets/80e7ac964c28c99f2c5d445d357fc5f4.png)"
                  ></div
                ></px-posize>
              </div>
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
