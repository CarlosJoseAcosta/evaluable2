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
        Elija la asignatura que desea actualizar: <select name="actuAsig">
            <?php
                $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT * FROM asignaturas";
                foreach($conn -> query($sql) as $resultado){
                    echo "<option value = '".$resultado["IdAsig"]."'>".$resultado["Nombre"]."</option>";
                }
            ?>
        </select><br>
        Pon el nuevo nombre de la asignatura: <input type="text" name="neoAsig"><br>
        <input type="submit">
    </form>
</body>
</html>