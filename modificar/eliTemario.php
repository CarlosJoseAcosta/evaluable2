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
        <select name="eliTemario">
            <?php
            $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM unidades";
            foreach($conn -> query($sql) as $resultado){
                echo "<option value = '".$resultado["IdU"]."'>".$resultado["nombre"]."</option>";
            }
            ?>
        </select>
        <input type="submit">
    </form>
</body>
</html>