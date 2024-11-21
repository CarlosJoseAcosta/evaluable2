<?php 
    include "../coneccion/coneccion.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insercion de Unidad</title>
</head>
<body>
    <form action="LogicaInsercion.php" method="POST">
        <label>Seleccione la asignaturas</label>
        <select name="asig">
            <?php 
                $conn -> setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT * FROM asignaturas";
                foreach($conn -> query($sql) as $resultado){
                    echo "<option value = '".$resultado["IdAsig"]."'>".$resultado["Nombre"]. "</option>";
                }
            ?>
            </select><br>
        <label>Numero del tema:
                <input type="number" name= "numeroTem"><br>
        </label>
        <label for="">Nombre de la unidad:
                <input type="text" name = "nombreTem">
        </label><br>
        <input type="submit">
    </form>
</body>
</html>