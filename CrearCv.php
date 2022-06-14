<?php

@include 'config.php'; // Base de datos

/* session_start();

if(!isset($_SESSION['CorreoElectronico'])){
  header('location:IniciarSesion.php');
}
$CorreoElectronico = $_SESSION['CorreoElectronico'];
/* Validación para ver si ya tiene CV 
$select = " SELECT * FROM informacion_laboral WHERE correo = '$CorreoElectronico' AND empresa != NULL"; //Prueba para ver si me valida 

$result = mysqli_query($conn, $select);

if(mysqli_num_rows($result) > 0){

  $error[] = 'CV ya existe para usuario, vuleve a publicar si desea actualizar los datos';
}*/
if (isset($_POST['submit'])) { // Hacemos POST a base de datos
  //$correo = mysqli_real_escape_string($conn, $_POST[$CorreoElectronico]);
  $empresa = mysqli_real_escape_string($conn, $_POST['Empresa']);
  $desc = mysqli_real_escape_string($conn, $_POST['Descripcion']);
  //$fechaInicial = mysqli_real_escape_string($conn, $_POST['FechaInicial']);
  $fechaInicial = strtotime($_POST["FechaInicial"]);
  $fechaInicial = date('Y-m-d H:i:s', $fechaInicial);
  //$fechaFinal = mysqli_real_escape_string($conn, $_POST['FechaFinal']);
  $fechaFinal = strtotime($_POST["FechaFinal"]);
  $fechaFinal = date('Y-m-d H:i:s', $fechaFinal);
  //$escuela = mysqli_real_escape_string($conn, $_POST['Escuela']);
  //$grado =mysqli_real_escape_string($conn,$_POST['GradoEducacion']);
  //$habilidades = $_POST['Habilidades'];*/

  $buscaUsuario = " SELECT * FROM usuario_prof WHERE correo = '$CorreoElectronico'"; //Prueba para ver si me valida 
  $validaUsuario = mysqli_query($conn, $buscaUsuario);
  if (mysqli_num_rows($validaUsuario) == 0) {
    $error[] = 'No existe usuario';
    header('location:Cuenta.php');
  } else {
    $insert = "UPDATE informacion_laboral SET empresa = '$empresa', descripcion = '$desc', fechaInicial = '$fechaInicial', fechaFinal = '$fechaFinal' WHERE correo = '$CorreoElectronico'";
    mysqli_query($conn, $insert);
    header('location:IntUsuProf.php');
  }
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
  <link rel="stylesheet" type="text/css" href="css/CrearCv.css" />

  <script type="text/javascript" src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script type="text/javascript" src="https://unpkg.com/headroom.js@0.12.0/dist/headroom.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/px2code/posize/build/v1.00.5.js"></script>
</head>

<body style="display: flex; flex-direction: column">
  <div class="crear-cv crear-cv-block layout">
    <div class="crear-cv-flex layout">
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
        <div class="crear-cv-flex1 layout">
          <h1 class="crear-cv-big-title layout">Ingresa tus datos <?php echo $_SESSION['CorreoElectronico'] ?></h1>
          <div class="crear-cv-flex1-spacer"></div>
          <div class="crear-cv-flex1-item">
            <div class="crear-cv-block14 layout">
              <div style="--src:url(http://localhost/PaginaWebFinal/assets/e1b8c76181004a3e9e95a1151056a5c1.png)" class="crear-cv-icon1 layout"></div>
            </div>
          </div>
          <div class="crear-cv-flex1-spacer1"></div>
          <div class="crear-cv-flex1-item">
            <div class="crear-cv-block15 layout">
              <div style="--src:url(http://localhost/PaginaWebFinal/assets/601449fdf3b988c9624f92ad1efe381a.png)" class="crear-cv-image4 layout"></div>
            </div>
          </div>
          <div class="crear-cv-flex1-spacer2"></div>
          <div class="crear-cv-flex1-item">
            <div style="--src:url(http://localhost/PaginaWebFinal/assets/6db786cae790c9b78f84af356252d24b.png)" class="crear-cv-icon2 layout"></div>
          </div>
        </div>

        <div class="crear-cv-flex2 layout">
          <div class="crear-cv-flex2-item">
            <div class="crear-cv-group layout3">
              <div class="crear-cv-block1 layout">
                <div class="crear-cv-block2 layout">
                  <div class="crear-cv-block2-item">
                    <div class="crear-cv-flex3 layout">
                      <h5 class="crear-cv-highlights layout">Datos personales</h5>
                      <!--<div class="crear-cv-block3 layout"> Fecha de nacimiento
                      <input class="crear-cv-small-text-body1 layout" type = "text" placeholder="Fecha de nacimiento" name="FechaNacimiento" pattern="{18}" required>
                      <input type="date" id="crear-cv-small-text-body11" name="FechaInicial" value="2022-06-17" min="2018-01-01" max="2022-12-31" required>-->
                      <div class="crear-cv-block3 layout">
                          <px-posize
                            track-style='{"flexGrow":1}'
                            x="16px 42fr 869fr"
                            y="11px minmax(0px, max-content) 10fr"
                            ><div class="crear-cv-small-text-body11">Fecha de nacimiento
                          <input type="date" id="crear-cv-small-text-body11" name="FechaInicial" value="2022-06-17" min="2018-01-01" max="2022-12-31" required>
                          </div>
                          <br>
                        <hr class="cuenta-line1 layout" />
                      </div>
                    </div>
                    <div class="crear-cv-block3 layout">
                      <input class="crear-cv-small-text-body1 layout" type="text" placeholder="Ciudad" name="Ciudad" pattern="{18}" required>
                      <hr class="cuenta-line1 layout" />
                    </div>
                    <div class="crear-cv-block3 layout">
                      <input class="crear-cv-small-text-body1 layout" type="text" placeholder="Código Postal" name="CP" pattern="{18}" required>
                      <hr class="cuenta-line1 layout" />
                    </div>
                    <div class="crear-cv-block3 layout">
                      <input class="crear-cv-small-text-body1 layout" type="text" placeholder="Calle" name="Calle" pattern="{18}" required>
                      <hr class="cuenta-line1 layout" />
                    </div>
                    <div class="crear-cv-block3 layout">
                      <input class="crear-cv-small-text-body1 layout" type="text" placeholder="Número de calle" name="NumCalle" pattern="{18}" required>
                      <hr class="cuenta-line1 layout" />
                    </div>
                  </div>
                  <!-- <div class="crear-cv-block2-spacer"></div>
                  <div class="crear-cv-small-text-body layout">Nombre completo como aparece en la INE</div>
                   CURP 
                  <div class="crear-cv-block3 layout">
                    <input class="crear-cv-small-text-body1 layout" type = "text" placeholder="CURP" name="CURP" pattern="{18}" required> CURP
                    <hr class="cuenta-line1 layout" />
                    </div>  CURP -->
                </div>
                <div class="crear-cv-block4 layout">
                  <div class="crear-cv-block4-item">
                    <div class="crear-cv-flex4 layout">
                      <div class="crear-cv-flex5 layout">
                        <h5 class="crear-cv-highlights layout1">Experiencia laboral</h5>
                        <div class="crear-cv-flex5-spacer"></div>
                        <div class="crear-cv-flex5-item">
                          <div style="--src:url(http://localhost/PaginaWebFinal/assets/06e3cba43acec943570ffd2c403a7e4c.png)" class="crear-cv-image layout"></div>
                        </div>
                        <div class="crear-cv-flex5-spacer1"></div>
                        <div class="crear-cv-flex5-item1">
                          <div style="--src:url(http://localhost/PaginaWebFinal/assets/7ba74c20a3d85f39cd180e40dfc3d51c.png)" class="crear-cv-image1 layout"></div>
                        </div>
                      </div>
                      <div class="crear-cv-block3 layout1">
                        <!-- <div class="crear-cv-small-text-body1 layout">Empresa</div> -->
                        <input class="crear-cv-small-text-body1 layout" type="text" placeholder="Empresa" name="Empresa" pattern="{30}" required>
                      </div>
                    </div>
                  </div>
                  <div class="crear-cv-block4-spacer"></div>
                </div>
                <div class="crear-cv-block5 layout">
                  <div class="crear-cv-block5-item">
                    <div class="crear-cv-block6 layout">
                      <div class="crear-cv-block3 layout2">
                        <!-- <div class="crear-cv-small-text-body1 layout">Descripcion</div> -->
                        <input class="crear-cv-small-text-body1 layout" type="text" placeholder="Descripción" name="Descripcion" pattern="{100}" required>
                      </div>
                      <div class="crear-cv-small-text-body2 layout">Limit: 400 words</div>
                    </div>
                  </div>
                  <div class="crear-cv-block5-spacer"></div>
                </div>
                <div class="crear-cv-block7 layout">
                  <div class="crear-cv-block7-item">
                    <div class="crear-cv-group layout">
                      <div class="crear-cv-block8 layout">
                        <div class="crear-cv-block3 layout3">
                          <px-posize
                            track-style='{"flexGrow":1}'
                            x="16px 42fr 869fr"
                            y="11px minmax(0px, max-content) 10fr"
                            ><div class="crear-cv-small-text-body11">Fecha Inicial
                          <input type="date" id="crear-cv-small-text-body11" name="FechaInicial" value="2022-06-17" min="2018-01-01" max="2022-12-31" required>
                          </div>
                        </px-posize>
                        </div>
                        <br>
                        <div class="crear-cv-block3 layout3">
                          <px-posize
                            track-style='{"flexGrow":1}'
                            x="16px 42fr 869fr"
                            y="11px minmax(0px, max-content) 10fr"
                            ><div class="crear-cv-small-text-body11">Fecha Final
                          <input type="date" id="crear-cv-small-text-body11" name="FechaFinal" value="2022-06-17" min="2000-01-01" max="2022-12-31" required>
                          </div>
                        </px-posize>
                        </div>
                      </div>
                      <px-posize x="891fr 70px 6fr" y="3px 30px 3px" absolute="true"></px-posize>
                    </div>
                  </div>
                  <div class="crear-cv-block7-spacer"></div>
                  <div class="crear-cv-block7-item1">
                  </div>
                </div>
                <p>
                  Click on the button to create
                  a form dynamically
                </p>
                <button class="Add" onClick="GFG_Fun()">
                  click here
                </button>
                <p id="GFG_DOWN"></p>
                <script>
                  var down = document.getElementById("GFG_DOWN");

                  function GFG_Fun() {

                    // Create a form dynamically
                    var form = document.createElement("form");
                    form.setAttribute("method", "post");
                    form.setAttribute("action", "submit.php");

                    // Create an input element for emailID
                    var ID = document.createElement("input");
                    ID.setAttribute("type", "text");
                    ID.setAttribute("name", "emailID");
                    ID.setAttribute("placeholder", "E-Mail ID");

                    // Create an input element for password
                    var PWD = document.createElement("input");
                    PWD.setAttribute("type", "password");
                    PWD.setAttribute("name", "password");
                    PWD.setAttribute("placeholder", "Password");

                    // Create a submit button
                    var s = document.createElement("input");
                    s.setAttribute("type", "submit");
                    s.setAttribute("value", "Submit");

                    // Append the email_ID input to the form
                    form.append(ID);

                    // Append the password to the form
                    form.append(PWD);

                    // Append the button to the form
                    form.append(s);

                    document.getElementsByClassName("crear-cv-block7-item")[0]
                      .appendChild(form);
                  }
                </script>
                <div class="crear-cv-block9 layout">
                  <div class="crear-cv-block9-item">
                    <div class="crear-cv-flex6 layout">
                      <h5 class="crear-cv-highlights layout">Educación</h5>
                      <div class="crear-cv-block6 layout1">
                        <div class="crear-cv-block3 layout4">
                          <!-- <div class="crear-cv-small-text-body1 layout">Escuela</div> -->
                          <input class="crear-cv-small-text-body1 layout" type="text" placeholder="Escuela" name="Escuela" pattern="{30}" required>
                        </div>
                        <div class="crear-cv-small-text-body3 layout">Limit: 100 words</div>
                      </div>
                      <div class="crear-cv-block3 layout1">
                        <input class="crear-cv-small-text-body1 layout" type="text" placeholder="Carrera" name="Carrera" pattern="30}" required>
                      </div>
                    </div>
                  </div>
                  <div class="crear-cv-block9-spacer"></div>
                  <!--<div class="crear-cv-small-text-body layout4">Nombre completo de la escuela</div>-->
                </div>
                <div class="crear-cv-block10 layout">
                  <div class="crear-cv-block10-item">
                    <div class="crear-cv-group layout1">
                      <div class="crear-cv-block8 layout">
                        <div class="crear-cv-block3 layout5">
                          <px-posize track-style='{"flexGrow":1}' x="16px 110fr 801fr" y="11px minmax(0px, max-content) 10fr"> <input class="crear-cv-small-text-body12" type="text" name="GradoEducacion" pattern="{18}" required>

                            ><select name="SeleccionaCuenta" id="SelectCuenta" required>
                              <optgroup label="GradoEducacion">
                                <option value="GradoEducacion">Licenciatura</option>
                                <option value="GradoEducacion">Maestria</option>
                                <option value="GradoEducacion">Doctorado</option>
                            </select>
                            <p class="crear-cv-small-text-body12">Grado de educación</p>
                            <!-- <div class="crear-cv-small-text-body12">Grado de educacion</div> -->
                          </px-posize>
                        </div>
                      </div>
                      <div class="crear-cv-block11 layout">
                      </div>
                    </div>
                  </div>
                  <div class="crear-cv-block10-spacer"></div> <!-- Hola David-->
                  <!--<div class="crear-cv-small-text-body layout5">Licenciatura, maestria, phd, etc</div> -->
                </div>
                <div class="crear-cv-block12 layout">
                  <div class="crear-cv-block12-item">
                    <div class="crear-cv-group layout2">
                      <div class="crear-cv-block3 layout6">
                        <px-posize track-style='{"flexGrow":1}' x="16px 114fr 797fr" y="11px minmax(0px, max-content) 10fr">
                          <div class="crear-cv-small-text-body13"> Fecha de Graduación
                            <input type="date" class="calendario" name="FechaIncial" value="2022-06-07" min="2000-01-01" max="2022-12-31" required>
                          </div>
                        </px-posize>
                      </div>
                      <px-posize x="891fr 30px 6fr" y="2px 30px 4px" absolute="true"></px-posize>
                    </div>
                  </div>
                  <div class="crear-cv-block12-spacer"></div>
                  <!--<div class="crear-cv-small-text-body layout6">Fecha de graduacion</div>-->
                </div>
                <h5 class="crear-cv-highlights layout2">Habilidades</h5>
                <div class="crear-cv-block13 layout">
                  <!-- <div class="crear-cv-small-text-body1 layout">Escribir acá</div> -->
                  <input class="crear-cv-small-text-body1 layout" type="text" placeholder="Habilidades" name="Habilidades" pattern="{18}" required>
                </div>
              </div>
              <div class="crear-cv-block11 layout1">
             </div>
              <div class="crear-cv-block13 layout1">
                <px-posize track-style='{"flexGrow":1}' x="16px 47fr 867fr" y="11px minmax(0px, max-content) 10fr">
                  <!-- <div class="crear-cv-small-text-body14">Apellido</div> -->
                  <input class="crear-cv-small-text-body14" type="text" placeholder="RFC" name="RFC" pattern="{18}" required>
                </px-posize>

              </div>
            </div>
          </div>
          <div class="crear-cv-flex2-spacer"></div>
          <div class="crear-cv-flex2-item1">
            <form action="" method="post">
              <!--<a href="IntUsuProf.php" style="text-decoration: none;"><div class="crear-cv-cover-block layout"><div class="crear-cv-text-body layout">Publicar</div></div></a>-->
              <input type="submit" name="Publicar" value="Publicar" class="crear-cv-cover-block layout">
            </form>
            <!--<a href="IntUsuProf.php" style="text-decoration: none;"><div class="crear-cv-cover-block layout"><div class="crear-cv-text-body layout">Publicar</div></div></a>-->
          </div>
        </div>
        </form>
      </div>
    </div> 
    
    <!--
    <script type="text/javascript">
      AOS.init();
    </script> -->
</body>

</html>