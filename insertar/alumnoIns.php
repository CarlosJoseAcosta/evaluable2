<?php
    include '../coneccion/coneccion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insercion de alumnos</title>
</head>
<body>
    <form action="LogicaInsercion.php" method="POST">
    <label>Asignatura</label><br>
            <?php
                $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT * FROM asignaturas";
                foreach($conn -> query($sql) as $resultado){
                    echo $resultado["Nombre"]."<input name = 'asignatura[]' type = 'checkbox' value = '".$resultado["IdAsig"]."'><br>";
                }
            ?>
        <label for="">Nombre del alumno:
            <input type="text" name = "nombreAlu"><br>
        </label>
        <label for="">Apellidos del alumno: 
            <input type="text" name = "apellido"><br>
        </label>
        <input type="submit">
    </form>
    <?php 
        if(isset($_SESSION["errores"]["db"])){
            echo "<p>" .$_SESSION["errores"]["db"]. "</p>";
        }
    ?>
</body>
</html>