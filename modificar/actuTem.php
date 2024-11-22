<?php 
include "../coneccion/coneccion.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar temario</title>
</head>
<body>
    <form action="logica.php" method="POST">
        Elija el temario que desea cambiar sus datos: <select name="actuTem">
            <?php
            $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM unidades";
            foreach($conn -> query($sql) as $resultado){
                echo "<option value = '".$resultado["IdU"]."'>".$resultado["numero"]. ": ".$resultado["nombre"]."</option>";
            }
            ?>
        </select><br>
        Pon el nuevo nombre, si no lo desea actualizar dejelo en blanco, de la asignatura: <input type="text" name="neoNomTem"><br>
        Pon el nuevo apellido, si no lo desea actualizar dejelo en blanco, de la asignatura: <input type="number" name="neoNumTem"><br>
        <input type="submit">
    </form>
</body>
</html>