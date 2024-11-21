<?php 
include "../coneccion/coneccion.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar actividad</title>
</head>
<body>
<form action="logica.php" method="POST">
    <select name="eliActi">
        <?php 
            $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM actividades";
            foreach($conn -> query($sql) as $resultado){
                echo "<option value = '".$resultado["IdA"]."'>".$resultado["nombre"]."</option>";
            }
        ?>
        <input type="submit">
    </select>
</form>
</body>
</html>