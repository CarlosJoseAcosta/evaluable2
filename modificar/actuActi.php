<?php 
include "../coneccion/coneccion.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar temario</title>
</head>
<body>
    <form action="logica.php" method="POST">
        Elija la actividad que desea modificar: <select name="actuActi">
            <?php
            $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM actividades";
            foreach($conn -> query($sql) as $resultado){
                echo "<option value = '".$resultado["IdA"]."'>".$resultado["nombre"]."</option>";
            }
            ?>
        </select><br>
        Ponga el cambio que desea poner de la actividad:<input type="text" name = "neoNomAct"><br>
        <input type="submit">
    </form>
</body>
</html>