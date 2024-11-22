<?php 
include "../coneccion/coneccion.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="logica.php" method = "POST">
        Elija la asignatura que desea actualizar: <select name="actuAlu">
            <?php
                $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT * FROM alumnos";
                foreach($conn -> query($sql) as $resultado){
                    echo "<option value = '".$resultado["IdAlu"]."'>".$resultado["Nombre"]." ".$resultado["Apellidos"]."</option>";
                }
            ?>
        </select><br>
        Pon el nuevo nombre, si no lo desea actualizar dejelo en blanco, de la alumno: <input type="text" name="neoNomAl"><br>
        Pon el nuevo apellido, si no lo desea actualizar dejelo en blanco, de la alumno: <input type="text" name="neoApeAl"><br>
        <input type="submit">
    </form>
</body>
</html>