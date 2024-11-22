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
    <a href="../index.php"><p>volver</p></a>
    <form action="notas.php" method = "POST">
        <label>Elige el alumno que deseas calificar<select name="alNota">
            <?php 
                $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT * FROM alumnos";
                foreach($conn -> query($sql) as $resultado){
                    echo "<option value = '".$resultado["IdAlu"]."'>".$resultado["Nombre"]. " " .$resultado["Apellidos"]. "</option>";
                }
            ?>
            </select><br>
        <input type="submit">
    </form>
</body>
</html>