<?php 

    include "../coneccion/coneccion.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas</title>
</head>
<body>
<a href = "../index.php"><p>Volver a inicio</p></a>
    <form action="../insertar/LogicaInsercion.php" method = "POST">
        <label>Elige la actividad que sera calificada<select name="actNota">
            <?php 
                $idAl = $_POST["alNota"];
                $_SESSION["auxiliarId"] = $idAl;
                $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT actividades.nombre, actividades.IdA from actividades INNER JOIN unidades on actividades.IdU = unidades.IdU inner join asignaturas on unidades.IdAsig = asignaturas.IdAsig inner JOIN alasi on asignaturas.IdAsig = alasi.IdAsig where alasi.IdAlu = " .$_POST["alNota"];
                foreach($conn -> query($sql) as $resultado){
                    echo "<option value = '".$resultado["IdA"]."'>".$resultado["nombre"]."</option>";
                }
            ?>
        </select></label><br>
        <?php 
            echo $_SESSION["auxiliarId"];
        ?>
        <label>Nota que saco el alumno:<input type="number" name = "nota"></label><br>
        <input type="submit">
    </form>
    
</body>
</html>