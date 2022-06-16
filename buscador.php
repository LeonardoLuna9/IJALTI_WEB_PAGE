<?php
@include 'config.php';
?>

<!DOCTYPE html> 
<html>
<body>
    <form action = "" method = "get">
        <input type = "text" name = "busqueda"> <br>
        <input type = "submit" name = "enviar" value = "Buscar">
    </form> 

    <br><br>

    <?php
    if(isset($_GET['enviar'])) 
    {
        $busqueda = $_GET['busqueda'];
    
        $consulta = $conn->query("SELECT nombre,apellidoP,apellidoM,usuarios.correo 
        FROM usuarios
            INNER JOIN educacion 
        ON usuarios.correo = educacion.correo
        WHERE educacion.carrera LIKE '%$busqueda%'");
    
        while ($row = $consulta->fetch_array()) 
        {
            echo $row['correo'].'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.$row['nombre'].'&nbsp'.$row['apellidoP'].'&nbsp'.$row['apellidoM'].'<br>';
        }
    }
    ?>
</body>
</html>
