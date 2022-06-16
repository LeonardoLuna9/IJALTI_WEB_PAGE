<?php
@include 'config.php';
session_start();
?>

<!DOCTYPE html> 
<html>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
  <link rel="stylesheet" type="text/css" href="css/common.css" />
  <link rel="stylesheet" type="text/css" href="css/fonts.css" />
  <link rel="stylesheet" type="text/css" href="css/CrearCv.css" />
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
  <link rel="stylesheet" type="text/css" href="css/common.css" />
  <link rel="stylesheet" type="text/css" href="css/fonts.css" />
  <link rel="stylesheet" type="text/css" href="css/IntEmpPost.css" />

  <script type="text/javascript" src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script type="text/javascript" src="https://unpkg.com/headroom.js@0.12.0/dist/headroom.min.js"></script>
</head>
<body>
    
<div class= "crear-cv-block3 layout">
<form action = "" method = "get">
        <input type = "text" name = "busqueda"> <br>
        <input type = "submit" name = "enviar" value = "Buscar">
    </form> 

    <br><br>

    <!--
    $correoUsuario = "HolaSoyCorreo1@gmail.com";
    <form action='' method='get'>
    <a href='Desktop.php?CorreoAplicantePerfil=' >El que masca iguana</a>  <br>
    </form> <br> -->

    <?php
    if(isset($_GET['enviar'])) 
    {
        $busqueda = $_GET['busqueda'];
    
        $consulta = $conn->query("SELECT nombre,apellidoP,apellidoM,usuarios.correo, carrera, gradoEducacion, escuela, empresa, descripcion, experiencia_habil
        FROM usuarios
            INNER JOIN educacion 
            INNER JOIN informacion_laboral
            INNER JOIN habilidades
        ON usuarios.correo = educacion.correo  AND usuarios.correo = informacion_laboral.correo AND usuarios.correo = habilidades.correo
        WHERE educacion.carrera LIKE '%$busqueda%' OR educacion.gradoEducacion LIKE '%$busqueda%' OR educacion.escuela LIKE '%$busqueda%' 
        OR informacion_laboral.empresa LIKE '%$busqueda%' OR informacion_laboral.descripcion LIKE '%$busqueda%'
        OR habilidades.experiencia_habil LIKE '%$busqueda%'");
        $selectUsuario = array();
        //$cont = 0;
        
        while ($row = $consulta->fetch_array()) 
        {   
            $correoUsuario = $row['correo'];
            //$selectUsuario[] = $correoUsuario;

        //     echo '<a href="' . htmlspecialchars("/siguientepagina.php?etapa=23&datos=" .
        // urlencode($datos)) . '">'."\n";
            echo '<div class= "crear-cv-block3 layout">';
            echo '<form action="" method="get">' ;
            echo '<a href="' . htmlspecialchars("Desktop.php?CorreoAplicantePerfil=". $correoUsuario ). '">'. $row['correo']. $row['nombre']. $row['apellidoP']. $row['apellidoM']. $row['carrera']. $row['gradoEducacion']. $row['escuela']. $row['empresa']. $row['descripcion']. $row['experiencia_habil']. '</a>';
            echo '</form>'; 
            echo '</div';
            // $cont = $cont + 1;
        }
        //print_r($selectUsuario);
    }
    /*
    print_r($selectUsuario);
    
    if (isset($_POST['0'])) { // Hacemos POST a base de datos
        $_SESSION['CorreoAplicantePerfil'] = 'JimmyRings117@gmail.com';
        header('location:Desktop.php');
    }
    
    /*while(true){*/
    /*
    foreach($selectUsuario as $key => $val) {
        print "$key = $val <br>";
        //print $selectUsuario[$i];
        if (isset($_POST[$val])){ // Hacemos POST a base de datos
            $_SESSION['CorreoAplicantePerfil'] = $val;
            header('location:Desktop.php');
        }
    }*/
    
//}
    ?>
</div>
</body>
</html>
