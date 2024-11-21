<?php 
include "../coneccion/coneccion.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminacion de asignaturas</title>
</head>
<body>
    <form action="logica.php" method = "POST">
        Elija la asignatura que desea eliminar: <select name="asignaturaEl">
            <?php 
                $conn -> setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT * FROM asignaturas";
                foreach($conn -> query($sql) as $resultado){
                    echo "<option value = '".$resultado["IdAsig"]."'>".$resultado["Nombre"]."</option>";
                }
            ?>
        </select><br>
        <input type="submit">
    </form>
</body>
</html>