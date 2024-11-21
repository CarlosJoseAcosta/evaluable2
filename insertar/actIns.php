<?php 
    include "../coneccion/coneccion.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insercion de actividades</title>
</head>
<body>
    <form action="LogicaInsercion.php" method = "POST">
        <label for="">Seleccione la unidad que pertenezca la actividad:
            <select name="unidades">
                <?php 
                    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "SELECT * FROM unidades";
                    foreach($conn -> query($sql) as $resultado){
                        echo "<option value = '".$resultado["IdU"]."'>" .$resultado["nombre"]. "</option>";
                    }
                ?>
            </select><br>
        </label>
        <label for="">Nombre de la actividad:<input type="text" name = "actividad"></label><br>
        <input type="submit">
    </form>
</body>
</html>