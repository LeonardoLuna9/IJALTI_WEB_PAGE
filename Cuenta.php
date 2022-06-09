<?php

@include 'config.php'; // Base de datos

if (isset($_POST['submit'])){
  $telefono = mysqli_real_escape_string($conn, $_POST['telefono']);
  $correo = mysqli_real_escape_string($conn, $_POST['CorreoElectronico']);
  $nombre = mysqli_real_escape_string($conn, $_POST['Nombre']);
  $apellidoP= mysqli_real_escape_string($conn, $_POST['ApellidoP']);
  $apellidoM = mysqli_real_escape_string($conn, $_POST['ApellidoM']);
  $contraseña = md5($_POST['Contraseña']);
  $RepContraseña =md5($_POST['RepetirContraseña']);
  $SeleccionCuenta = $_POST['SeleccionaCuenta'];

  $select = " SELECT * FROM usuarios WHERE correo = '$correo' && contraseña = '$contraseña'";

  $result = mysqli_query($conn, $select);

  if(mysqli_num_rows($result)> 0){

    $error[] = 'usuario ya existe';
  }
  else{
    if($contraseña!=$RepContraseña){
      $error[] = "Contraseña no coincide";
    }
    else{
      $insert = "INSERT INTO usuarios(correo, nombre, apellidoP, apellidoM, contraseña) VALUES ('$correo', '$nombre','$apellidoP' ,'$apellidoM', '$contraseña')";
      mysqli_query($conn, $insert);
      
      $insert2 = "INSERT INTO usuario_prof(correo) VALUES ('$correo')";
      mysqli_query($conn, $insert2);

      $insert3 = "INSERT INTO telefono(correo, num_tel) VALUES ('$correo', $telefono)";
      mysqli_query($conn, $insert3);

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

    <link
      rel="stylesheet"
      type="text/css"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
      crossorigin="anonymous"
    />
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
        <h2 class="cuenta-medium-title layout">Crear cuenta</h2>
        <div class="cuenta-flex1 layout">
          <div class="cuenta-flex1-item">
            <div class="cuenta-cover-block1 layout">
              <div class="cuenta-cover-block1-item">
                <div style="--src:url(http://localhost/PaginaWebFinal/assets/571ef6a80d41f9dfd53a10e217d57ad9.png)" class="cuenta-image2 layout"></div>
              </div>
              <div class="cuenta-cover-block1-spacer"></div>
              <div class="cuenta-small-text-body layout">Ingresar con Google</div>
            </div>
          </div>
          <div class="cuenta-flex1-item1">
            <div class="cuenta-flex2 layout">
              <div class="cuenta-cover-block1 layout1">
                <div class="cuenta-cover-block1-item1">
                  <div
                    style="--src:url(http://localhost/PaginaWebFinal/assets/08eca4a24ed703acded7cfce2a48dab4.png)" class="cuenta-image2 layout1"></div>
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
                <div style="--src:url(http://localhost/PaginaWebFinal/assets/47448dd426ca9db3d5c1834b897a6a45.png)" class="cuenta-image3 layout"></div>
              </div>
              <div class="cuenta-cover-block-spacer"></div>
              <div class="cuenta-small-text-body layout2">Ingresar con LinkedIn</div>
            </div>
          </div>
        </div>
        <form action="" method="post" class ="form1">
          <?php
          if (isset($error)){
            foreach ($error as $error){
              echo '<span class ="msgerror" 
              style = "font: 16px/2.18 Abel, Helvetica, Arial, serif;
              letter-spacing: 1.28px; 
              color: red;
              padding-left: 35%;">'.$error. '</span>';
            }
          }
          ?>
        <div class="cuenta-flex3 layout">
          <h5 class="cuenta-highlights layout">¿Cómo planeas usar tu cuenta?</h5>
          <div class="cuenta-flex3-spacer">
            <select name="SeleccionaCuenta" id="SelectCuenta">
              <option value="Empresarial">Empresarial</option>
              <option value="UsuarioProf">Usuario Profesional</option>
            </select>
          </div>
          <div class="cuenta-flex3-item">
          </div>
        </div>
        <hr class="cuenta-line layout" />
        <input class="cuenta-highlights layout1" type = "text" placeholder="Telefono" name="telefono" pattern="{20}" required>
        <hr class="cuenta-line1 layout" />
        <input class="cuenta-highlights layout1" type = "email" placeholder="Correo Electrónico" name="CorreoElectronico" required>
        <hr class="cuenta-line layout" />
        <input class="cuenta-highlights layout1" type = "text" placeholder="Nombre" name="Nombre" required>
        <hr class="cuenta-line layout" />
        <input class="cuenta-highlights layout1" type = "text" placeholder="Apellido Paterno" name="ApellidoP" required>
        <hr class="cuenta-line layout" />
        <input class="cuenta-highlights layout1" type = "text" placeholder="Apellido Materno" name="ApellidoM" required>
        <hr class="cuenta-line layout" />
        <input class="cuenta-highlights layout1" type = "password" id ="psw" placeholder="Contraseña" name="Contraseña" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Debe contener una mayúscula, una minúscula, un número y longitud de 8 caractéres"required>
        <hr class="cuenta-line layout" />
        <input class="cuenta-highlights layout1" type = "password" id ="confpsw" placeholder="Repetir Contraseña" name="RepetirContraseña" required>
        <hr class="cuenta-line1 layout1" />
        <div id="message">
          <h5>La contraseña debe contener lo siguiente</h5>
          <p id="letter" class="invalid">Una<b> minúscula</b></p>
          <p id="capital" class="invalid">Una <b>mayúscula</b></p>
          <p id="number" class="invalid">Un <b>número</b></p>
          <p id="length" class="invalid">Mínimo <b>8 caracteres</b></p>
          <p id="confirmation" class="invalid">Las contraseñas coinciden</b></p>
        </div>
        <input type = "submit" name ="submit" value="Crear Cuenta" class="cuenta-cover-block3 layout">
        <h5 class="cuenta-highlights layout4"><a href="IniciarSesion.php" style="text-decoration: none;">¿Ya tienes una cuenta? Iniciar sesión</a></h5>
      </form>
      </div>
    </div>
    <script>
      var myInput = document.getElementById("psw");
      var myInput2 = document.getElementById("confpsw");
      var letter = document.getElementById("letter");
      var capital = document.getElementById("capital");
      var number = document.getElementById("number");
      var length = document.getElementById("length");
      
      myInput.onfocus = function() {
        document.getElementById("message").style.display = "block";
      }
      
      myInput.onblur = function() {
        document.getElementById("message").style.display = "none";
      }

      myInput2.onfocus = function() {
        document.getElementById("message").style.display = "block";
      }
      
      myInput2.onblur = function() {
        document.getElementById("message").style.display = "none";
      }
      
      myInput.onkeyup = function() {
        var lowerCaseLetters = /[a-z]/g;
        if(myInput.value.match(lowerCaseLetters)) {
          letter.classList.remove("invalid");
          letter.classList.add("valid");
        } else {
          letter.classList.remove("valid");
          letter.classList.add("invalid");
      }
    
        var upperCaseLetters = /[A-Z]/g;
        if(myInput.value.match(upperCaseLetters)) {
          capital.classList.remove("invalid");
          capital.classList.add("valid");
        } else {
          capital.classList.remove("valid");
          capital.classList.add("invalid");
        }
      
        var numbers = /[0-9]/g;
        if(myInput.value.match(numbers)) {
          number.classList.remove("invalid");
          number.classList.add("valid");
        } else {
          number.classList.remove("valid");
          number.classList.add("invalid");
        }
      

        if(myInput.value.length >= 8) {
          length.classList.remove("invalid");
          length.classList.add("valid");
        } else {
          length.classList.remove("valid");
          length.classList.add("invalid");
        }

        if (document.getElementById("psw").value == document.getElementById("confpsw").value) {
          confirmation.classList.remove("invalid");
          confirmation.classList.add("valid");
         }
        else{
          confirmation.classList.remove("valid");
          confirmation.classList.add("invalid");
          }
      }
      myInput2.onkeyup = function() {
        if (document.getElementById("psw").value == document.getElementById("confpsw").value) {
          confirmation.classList.remove("invalid");
          confirmation.classList.add("valid");
         }
        else{
          confirmation.classList.remove("valid");
          confirmation.classList.add("invalid");
          }
        }
      </script>
  </body>
</html>
