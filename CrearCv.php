<?php

@include 'config.php'; // Base de datos

session_start();

if(!isset($_SESSION['CorreoElectronico'])){
  header('location:IniciarSesion.php');
}

$CorreoElectronico = $_SESSION['CorreoElectronico'];

$buscaUsuario = " SELECT * FROM usuario_prof WHERE correo = '$CorreoElectronico'"; //Prueba para ver si me valida 
$validaUsuario = mysqli_query($conn, $buscaUsuario);
if (mysqli_num_rows($validaUsuario) == 0) {
  $error[] = 'No existe usuario';
  header('location:Cuenta.php');
}

//Validación para ver si ya tiene CV 
$select = " SELECT * FROM informacion_laboral WHERE correo = '$CorreoElectronico' AND empresa != NULL"; //Prueba para ver si me valida 

$result = mysqli_query($conn, $select);

if(mysqli_num_rows($result) > 0){

  $error[] = 'CV ya existe para usuario, vuelve a publicar si desea actualizar los datos';
}

if (isset($_POST['submit'])) { // Hacemos POST a base de datos
  // Datos personales
  $fechNac = strtotime($_POST['FechaNacimiento']);
  $fechNac = date('Y-m-d H:i:s', $fechNac);
  $rfc = mysqli_real_escape_string($conn, $_POST['RFC']);
  $ciudad = mysqli_real_escape_string($conn, $_POST['Ciudad']);
  $cp = mysqli_real_escape_string($conn, $_POST['CP']);
  $calle = mysqli_real_escape_string($conn, $_POST['Calle']);
  $numCalle = mysqli_real_escape_string($conn, $_POST['NumCalle']);

  // Situación laboral
  $SitLaboral = mysqli_real_escape_string($conn, $_POST['SitLaboral']); // Nueva

  //Información laboral
  $empresa = mysqli_real_escape_string($conn, $_POST['Empresa']);
  $desc = mysqli_real_escape_string($conn, $_POST['Descripcion']);
  $fechaInicial = strtotime($_POST["FechaInicial"]);
  $fechaInicial = date('Y-m-d H:i:s', $fechaInicial);
  $fechaFinal = strtotime($_POST["FechaFinal"]);
  $fechaFinal = date('Y-m-d H:i:s', $fechaFinal);

  // Educación
  $escuela = mysqli_real_escape_string($conn, $_POST['Escuela']);
  $carrera = mysqli_real_escape_string($conn, $_POST['Carrera']);
  $gradEd = mysqli_real_escape_string($conn, $_POST['GradoEducacion']);
  $fechaGrad = strtotime($_POST['FechaGrad']);
  $fechaGrad = date('Y-m-d H:i:s', $fechaGrad);

  // Descripción
  $Certificaciones = mysqli_real_escape_string($conn, $_POST['Certificaciones']); // Nueva
  $Cursos = mysqli_real_escape_string($conn, $_POST['Cursos']);  // Nueva
  $habilidades = mysqli_real_escape_string($conn, $_POST['Habilidades']);
  

  /*
  $buscaUsuario = " SELECT * FROM usuario_prof WHERE correo = '$CorreoElectronico'"; //Prueba para ver si me valida 
  $validaUsuario = mysqli_query($conn, $buscaUsuario);
  if (mysqli_num_rows($validaUsuario) == 0) {
    $error[] = 'No existe usuario';
    header('location:Cuenta.php');
  }
  else { */


  // Update en usuario_prof
  $insert1 = "UPDATE usuario_prof SET fechaNac = '$fechNac', codigo_postal = '$cp', ciudad = '$ciudad', num_calle = '$numCalle', calle = '$calle', RFC = '$rfc', sitLab = '$SitLaboral' WHERE correo = '$CorreoElectronico'";
  mysqli_query($conn, $insert1);

  // Update en informacion_laboral
  $insert2 = "UPDATE informacion_laboral SET empresa = '$empresa', descripcion = '$desc', fechaInicial = '$fechaInicial', fechaFinal = '$fechaFinal' WHERE correo = '$CorreoElectronico'";
  mysqli_query($conn, $insert2);

  // Update en informacion_laboral
  $insert3 = "UPDATE educacion SET escuela = '$escuela', carrera = '$carrera', gradoEducacion = '$gradEd', fechaGrad = '$fechaGrad' WHERE correo = '$CorreoElectronico'";
  mysqli_query($conn, $insert3);

  //Update en certificaciones
  $insert4 = "UPDATE certificaciones SET certificacion = '$Certificaciones' WHERE correo = '$CorreoElectronico'";
  mysqli_query($conn, $insert4);

  //Update en cursos
  $insert5 = "UPDATE cursos SET curso = '$Cursos' WHERE correo = '$CorreoElectronico'";
  mysqli_query($conn, $insert5);

  // Update en habilidades
  $insert6 = "UPDATE habilidades SET experiencia_habil = '$habilidades' WHERE correo = '$CorreoElectronico'";
  mysqli_query($conn, $insert6);

  // Regresa a página principal
  header('location:IntUsuProf.php');
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
                        <px-posize track-style='{"flexGrow":1}' x="16px 42fr 869fr" y="11px minmax(0px, max-content) 10fr">
                          <div class="crear-cv-small-text-body11">Fecha de nacimiento
                            <input type="date" id="crear-cv-small-text-body11" name="FechaInicial" value="2022-06-17" min="1950-01-01" max="2022-12-31" required>
                          </div>
                          <br>
                          <hr class="cuenta-line1 layout" />
                          <!-- </div>  div extra -->
                      </div>
                    </div>
                    <div class="crear-cv-block3 layout">
                      <input class="crear-cv-small-text-body1 layout" type="text" placeholder="Ciudad" name="Ciudad" pattern="{20}" maxlength="20" required>
                      <hr class="cuenta-line1 layout" />
                    </div>
                    <div class="crear-cv-block3 layout">
                      <input class="crear-cv-small-text-body1 layout" type="text" placeholder="Código Postal" name="CP" pattern="{9}" maxlength="9" required>
                      <hr class="cuenta-line1 layout" />
                    </div>
                    <div class="crear-cv-block3 layout">
                      <input class="crear-cv-small-text-body1 layout" type="text" placeholder="Calle" name="Calle" pattern="{20}" maxlength="20" required>
                      <hr class="cuenta-line1 layout" />
                    </div>
                    <div class="crear-cv-block3 layout">
                      <input class="crear-cv-small-text-body1 layout" type="text" placeholder="Número de calle" name="NumCalle" pattern="{11}" maxlength="11" required>
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
                <h5 class="crear-cv-highlights layout2">Situación Laboral</h5>
                <div class="crear-cv-block13 layout">
                  <!-- We are helljumpers, BECAUSE HELL IS OUR DOMAIN! -->
                          <px-posize track-style='{"flexGrow":1}' x="16px 110fr 801fr" y="11px minmax(0px, max-content) 10fr">
                            <!--<input class="crear-cv-small-text-body12" type = "text" name="GradoEducacion" pattern="{18}" required>-->

                            ><select name="SitLaboral" id="SelectCuenta" required>
                              <optgroup label="GradoEducacion">
                                <option value="Empleado">Empleado</option>
                                <option value="Desempleado">Desempleado</option>
                                <option value="Estudiante">Estudiante</option>
                            </select>
                            <p class="crear-cv-small-text-body12">Situación laboral</p>
                            <!-- <div class="crear-cv-small-text-body12">Grado de educacion</div> -->
                          </px-posize>
                        <!--<input class="crear-cv-small-text-body1 layout" type = "text" placeholder="Empleado, desempleado, estudiante" name="SitLaboral" pattern="{20}" maxlength = "20" required> Situación laboral -->
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
                        <input class="crear-cv-small-text-body1 layout" type="text" placeholder="Empresa" name="Empresa" pattern="{30}" maxlength="30" required>
                      </div>
                    </div>
                  </div>
                  <div class="crear-cv-block4-spacer"></div>
                </div>
                <div class="crear-cv-block5 layout">
                  <div class="crear-cv-block5-item">
                    <div class="crear-cv-block6 layout">
                      <div class="crear-cv-block3 layout">
                        <!-- <div class="crear-cv-small-text-body1 layout">Descripcion</div> -->
                        <input class="crear-cv-small-text-body1 layout" type="text" placeholder="Descripción" name="Descripcion" pattern="{100}" maxlength="100" required>
                      </div>
                      <div class="crear-cv-small-text-body2 layout">Limit: 100 words</div>
                    </div>
                  </div>
                  <div class="crear-cv-block5-spacer"></div>
                </div>
                <div class="crear-cv-block7 layout">
                  <div class="crear-cv-block7-item">
                    <div class="crear-cv-group layout">
                      <div class="crear-cv-block8 layout">
                        <div class="crear-cv-block3 layout3">
                          <px-posize track-style='{"flexGrow":1}' x="16px 42fr 869fr" y="11px minmax(0px, max-content) 10fr">
                            <div class="crear-cv-small-text-body11">Fecha Inicial
                              <input type="date" id="crear-cv-small-text-body11" name="FechaInicial" value="2022-06-17" min="1950-01-01" max="2022-12-31" required>
                            </div>
                          </px-posize>
                        </div>
                        <br>
                        <div class="crear-cv-block3 layout3">
                          <px-posize track-style='{"flexGrow":1}' x="16px 42fr 869fr" y="11px minmax(0px, max-content) 10fr">
                            <div class="crear-cv-small-text-body11">Fecha Final
                              <input type="date" id="crear-cv-small-text-body11" name="FechaFinal" value="2022-06-17" min="1950-01-01" max="2022-12-31" required>
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
                <button class="add" onClick="GFG_Fun()">
                  +
                </button>
                <p id="GFG_DOWN"></p>
                <div class="crear-cv-block9 layout">
                  <div class="crear-cv-block9-item">
                    <div class="crear-cv-flex6 layout">
                      <h5 class="crear-cv-highlights layout">Formación acádemica</h5>
                      <div class="crear-cv-block6 layout1">
                        <div class="crear-cv-block3 layout4">
                          <!-- <div class="crear-cv-small-text-body1 layout">Escuela</div> -->
                          <input class="crear-cv-small-text-body1 layout" type="text" placeholder="Escuela" name="Escuela" pattern="{30}" maxlength="30" required>
                        </div>
                        <div class="crear-cv-small-text-body3 layout">Limit: 100 words</div>
                      </div>
                      <div class="crear-cv-block3 layout1">
                        <input class="crear-cv-small-text-body1 layout" type="text" placeholder="Carrera" name="Carrera" pattern="{30}" maxlength="30" required>
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
                          <!--
                          <px-posize track-style='{"flexGrow":1}' x="16px 110fr 801fr" y="11px minmax(0px, max-content) 10fr"> <input class="crear-cv-small-text-body12" type="text" name="GradoEducacion" pattern="{18}" required>
Cambios Paulina-->
                          <px-posize track-style='{"flexGrow":1}' x="16px 110fr 801fr" y="11px minmax(0px, max-content) 10fr">
                            <!--<input class="crear-cv-small-text-body12" type = "text" name="GradoEducacion" pattern="{18}" required>-->

                            ><select name="GradoEducacion" id="SelectCuenta" required>
                              <optgroup label="GradoEducacion">
                                <option value="Licenciatura">Licenciatura</option>
                                <option value="Maestria">Maestria</option>
                                <option value="Doctorado">Doctorado</option>
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
                        <!-- Cambios Paulina
                        <px-posize track-style='{"flexGrow":1}' x="16px 114fr 797fr" y="11px minmax(0px, max-content) 10fr">
                          <div class="crear-cv-small-text-body13"> Fecha de Graduación
                            <input type="date" class="calendario" name="FechaIncial" value="2022-06-07" min="2000-01-01" max="2022-12-31" required>
                          </div>
                        </px-posize>
-->
                        <px-posize track-style='{"flexGrow":1}' x="16px 114fr 797fr" y="11px minmax(0px, max-content) 10fr">
                          <div class="crear-cv-small-text-body13"> Fecha de Graduación
                            <input type="date" class="calendario" name="FechaGrad" value="2022-06-07" min="1950-01-01" max="2022-12-31" required>
                          </div>
                        </px-posize>
                      </div>
                      <px-posize x="891fr 30px 6fr" y="2px 30px 4px" absolute="true"></px-posize>
                    </div>
                  </div>
                  <div class="crear-cv-block12-spacer"></div>
                  <!--<div class="crear-cv-small-text-body layout6">Fecha de graduacion</div>-->
                </div>
                <button class="add3" onClick="GFG_Fun2()">
                  +
                </button>
                <p id="GFG_DOWN"></p>

                <div class="divisionmamalona" id="55555">
                  <h5 class="crear-cv-highlights layout2">Descripción</h5>
                  <div class="crear-cv-block13 layout">
                    <input class="crear-cv-small-text-body1 layout" type="text" placeholder="Certificaciones" name="Certificaciones" pattern="{20}" maxlength="20" required>
                  </div>
                  <div class="crear-cv-block13 layout">
                    <input class="crear-cv-small-text-body1 layout" type="text" placeholder="Cursos" name="Cursos" pattern="{20}" maxlength="20" required>
                  </div>
                  <div class="crear-cv-block13 layout">
                    <!-- <div class="crear-cv-small-text-body1 layout">Escribir acá</div> --> 
                    <input class="crear-cv-small-text-body1 layout" type="text" placeholder="Habilidades" name="Habilidades" pattern="{50}" maxlength="50" required>
                  </div>
                </div>
                <button class="add2" onClick="GFG_Fun3()">
                  +
                </button>
                <p id="GFG_DOWN"></p>
              </div>
              <div class="crear-cv-block11 layout1">
              </div>
              <div class="crear-cv-block13 layout1">
                <px-posize track-style='{"flexGrow":1}' x="16px 47fr 867fr" y="11px minmax(0px, max-content) 10fr">
                  <!-- <div class="crear-cv-small-text-body14">Apellido</div> -->
                  <input class="crear-cv-small-text-body14" type="text" placeholder="RFC" name="RFC" pattern="{13}" maxlength="13" required>
                </px-posize>
              </div>
            </div>
          </div>
          <div class="crear-cv-flex2-spacer"></div>
          <div class="crear-cv-flex2-item1">
            <form action="" method="post">
              <!--<a href="IntUsuProf.php" style="text-decoration: none;"><div class="crear-cv-cover-block layout"><div class="crear-cv-text-body layout">Publicar</div></div></a>-->
              <input type="submit" name="submit" value="Publicar" class="crear-cv-cover-block layout">
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
<script>
  var down = document.getElementById("GFG_DOWN");

  function GFG_Fun() {

    // Create a form dynamically
    var div = document.createElement("div");
    div.setAttribute("class", "crear-cv-block3 layout7")

    var form = document.createElement("input");
    form.setAttribute("method", "post");
    form.setAttribute("placeholder", "Empresa")
    form.setAttribute("action", "submit.php");
    form.setAttribute("class", "crear-cv-small-text-body1 layout");

    var div2 = document.createElement("div");
    div2.setAttribute("class", "crear-cv-block3 layout7")

    var form2 = document.createElement("input");
    form2.setAttribute("method", "post");
    form2.setAttribute("placeholder", "Descripcion")
    form2.setAttribute("action", "submit.php");
    form2.setAttribute("class", "crear-cv-small-text-body1 layout");

    var div2 = document.createElement("div");
    div2.setAttribute("class", "crear-cv-block3 layout7")

    var form2 = document.createElement("input");
    form2.setAttribute("method", "post");
    form2.setAttribute("placeholder", "Descripcion")
    form2.setAttribute("action", "submit.php");
    form2.setAttribute("class", "crear-cv-small-text-body1 layout");

    var div3 = document.createElement("div");
    div3.setAttribute("class", "crear-cv-block3 layout7")

    var form3 = document.createElement("input");
    form3.setAttribute("type", "date")
    form3.setAttribute("id", "crear-cv-small-text-body11");
    form3.setAttribute("id", "fechaI");
    form3.setAttribute("name", "FechaInicial")
    form3.setAttribute("value", "2022-06-17");
    form3.setAttribute("class", "crear-cv-small-text-body1 layout");
    form3.setAttribute("min", "2018-01-01");
    form3.setAttribute("max", "2022-12-31");
    var div4 = document.createElement("div");
    div4.setAttribute("class", "crear-cv-block3 layout7")

    var form4 = document.createElement("input");
    form4.setAttribute("type", "date")
    form4.setAttribute("id", "crear-cv-small-text-body11");
    form4.setAttribute("id", "fechaI");
    form4.setAttribute("name", "FechaFinal")
    form4.setAttribute("value", "2022-06-17");
    form4.setAttribute("class", "crear-cv-small-text-body1 layout");
    form4.setAttribute("min", "2018-01-01");
    form4.setAttribute("max", "2022-12-31");

    //<input type="date" id="crear-cv-small-text-body11" id="fechaI" name="fechaInicial" value="2022-06-17" min="2018-01-01" max="2022-12-31" required>
    div.append(form)

    div2.append(form2)
    div3.append(form3)
    div4.append(form4)

    document.getElementsByClassName("crear-cv-block7-item")[0]
      .appendChild(div);
    document.getElementsByClassName("crear-cv-block7-item")[0]
      .appendChild(document.createElement("br"));

    document.getElementsByClassName("crear-cv-block7-item")[0]
      .appendChild(div2);
    document.getElementsByClassName("crear-cv-block7-item")[0]
      .appendChild(document.createElement("br"));
    document.getElementsByClassName("crear-cv-block7-item")[0]
      .appendChild(div3);
    document.getElementsByClassName("crear-cv-block7-item")[0]
      .appendChild(document.createElement("br"));
    document.getElementsByClassName("crear-cv-block7-item")[0]
      .appendChild(div4);
    document.getElementsByClassName("crear-cv-block7-item")[0]
      .appendChild(document.createElement("br"));

  }

  function GFG_Fun2() {

    // Create a form dynamically
    var div = document.createElement("div");
    div.setAttribute("class", "crear-cv-block3 layout")

    var form = document.createElement("input");
    form.setAttribute("method", "post");
    form.setAttribute("placeholder", "Escuela")
    form.setAttribute("action", "submit.php");
    form.setAttribute("class", "crear-cv-small-text-body1 layout");

    var div2 = document.createElement("div");
    div2.setAttribute("class", "crear-cv-block3 layout")

    var form2 = document.createElement("input");
    form2.setAttribute("method", "post");
    form2.setAttribute("placeholder", "Carrera")
    form2.setAttribute("action", "submit.php");
    form2.setAttribute("class", "crear-cv-small-text-body1 layout");


    var div3 = document.createElement("div");
    div3.setAttribute("class", "crear-cv-block3 layout")

    var form3 = document.createElement("select");

    var groups = document.createElement("optgroup")
    groups.setAttribute("label","gradoEducacion");
    

    var opt1 = document.createElement("option");
    var tex1 = document.createTextNode("licenciatura");

    opt1.setAttribute("value","licenciatura");
    opt1.appendChild(tex1)

    var opt2 = document.createElement("option");
    var tex2 = document.createTextNode("Maestria");

    opt2.setAttribute("value","Maestria");
    opt2.appendChild(tex2)

    var opt3 = document.createElement("option");
    var tex3 = document.createTextNode("Doctorado");

    opt3.setAttribute("value","Doctorado");
    opt3.appendChild(tex3)
    


    form3.appendChild(groups);
    groups.appendChild(opt1);
    groups.appendChild(opt2);
    groups.appendChild(opt3);

    /*<select name="GradoEducacion" id="SelectCuenta" required>
                              <optgroup label="GradoEducacion">
                                <option value="Licenciatura">Licenciatura</option>
                                <option value="Maestria">Maestria</option>
                                <option value="Doctorado">Doctorado</option>
                            </select>

*/
    var div4 = document.createElement("div");
    div4.setAttribute("class", "crear-cv-block3 layout")

    var form4 = document.createElement("input");
    form4.setAttribute("type", "date")
    form4.setAttribute("id", "crear-cv-small-text-body11");
    form4.setAttribute("id", "fechaI");
    form4.setAttribute("name", "fechaInicial")
    form4.setAttribute("value", "2022-06-17");
    form4.setAttribute("class", "crear-cv-small-text-body1 layout");
    form4.setAttribute("min", "2018-01-01");
    form4.setAttribute("max", "2022-12-31");
    //<input type="date" id="crear-cv-small-text-body11" id="fechaI" name="fechaInicial" value="2022-06-17" min="2018-01-01" max="2022-12-31" required>
    div.append(form)
    div2.append(form2)
    var grad=document.createTextNode("Grado de educacion")
    
    div3.appendChild(grad)
    div3.append(form3)
    div4.append(form4)

    document.getElementsByClassName("crear-cv-group layout2")[0]
      .appendChild(document.createElement("br"));
    document.getElementsByClassName("crear-cv-group layout2")[0]
      .appendChild(div);
    document.getElementsByClassName("crear-cv-group layout2")[0]
      .appendChild(document.createElement("br"));
    document.getElementsByClassName("crear-cv-group layout2")[0]
      .appendChild(div2);
    document.getElementsByClassName("crear-cv-group layout2")[0]
      .appendChild(document.createElement("br"));
    document.getElementsByClassName("crear-cv-group layout2")[0]
      .appendChild(div3);
    document.getElementsByClassName("crear-cv-group layout2")[0]
      .appendChild(document.createElement("br"));
    document.getElementsByClassName("crear-cv-group layout2")[0]
      .appendChild(div4);
    document.getElementsByClassName("crear-cv-group layout2")[0]
      .appendChild(document.createElement("br"));

  }

  function GFG_Fun3() {

    // Create a form dynamically
    var div = document.createElement("div");
    div.setAttribute("class", "crear-cv-block3 layout79")

    var form = document.createElement("input");
    form.setAttribute("method", "post");
    form.setAttribute("placeholder", "Certificaciones")
    form.setAttribute("action", "submit.php");
    form.setAttribute("class", "crear-cv-small-text-body1 layout");

    var div2 = document.createElement("div");
    div2.setAttribute("class", "crear-cv-block3 layout79")

    var form2 = document.createElement("input");
    form2.setAttribute("method", "post");
    form2.setAttribute("placeholder", "Cursos")
    form2.setAttribute("action", "submit.php");
    form2.setAttribute("class", "crear-cv-small-text-body1 layout");

    var div3 = document.createElement("div");
    div3.setAttribute("class", "crear-cv-block3 layout79")

    var form3 = document.createElement("input");
    form3.setAttribute("method", "post");
    form3.setAttribute("placeholder", "Habilidades")
    form3.setAttribute("action", "submit.php");
    form3.setAttribute("class", "crear-cv-small-text-body1 layout");



    //<input type="date" id="crear-cv-small-text-body11" id="fechaI" name="fechaInicial" value="2022-06-17" min="2018-01-01" max="2022-12-31" required>
    div.append(form)
    div2.append(form2)
    div3.append(form3)


    document.getElementsByClassName("divisionmamalona")[0]
      .appendChild(div);
    document.getElementsByClassName("divisionmamalona")[0]
      .appendChild(document.createElement("br"));
    document.getElementsByClassName("divisionmamalona")[0]
      .appendChild(div2);
    document.getElementsByClassName("divisionmamalona")[0]
      .appendChild(document.createElement("br"));
    document.getElementsByClassName("divisionmamalona")[0]
      .appendChild(div3);
    document.getElementsByClassName("divisionmamalona")[0]
      .appendChild(document.createElement("br"));




  }
</script>

</html>