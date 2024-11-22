<?php
include "../coneccion/coneccion.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Media</title>
</head>
<body>
    <a href="../index.php"><p>Volver</p></a>
    <form action="mediaTotal.php" method = "POST">
        Elija el alumno: <select name="alumno">
            <?php
                $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT * FROM alumnos";
                foreach($conn -> query($sql) as $resultado){
                    echo "<option value = '".$resultado["IdAlu"]."'>".$resultado["Nombre"]."</option>";
                }
            ?>
        </select><br>
        Elija el tema: <select name="unidad">
            <?php
                $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT * FROM unidades";
                foreach($conn -> query($sql) as $resultado){
                    echo "<option value = '".$resultado["IdU"]."'>".$resultado["nombre"]."</option>";
                }
            ?>
        </select><br>
        <input type="submit">
    </form>
    <?php
    if(isset(($_POST["alumno"])) && ($_POST["alumno"] != "") && ($_POST["unidad"]) && ($_POST["unidad"] != "")){
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM unidades INNER JOIN actividades ON unidades.IdU = actividades.IdU INNER JOIN alact ON actividades.IdA = alact.IdA WHERE unidades.IdU = '".$_POST["unidad"]."' AND IdAlu = '".$_POST["alumno"]."'";
        $cont = 0;
        $aux = 0;
        echo "<ul>";
        foreach($conn->query($sql) as $result){
            echo "<li>".$result["Nota"]."</li>";
            if($aux == 0){
                $aux = $result["Nota"];
            }else{
                $aux = $aux + $result["Nota"];
            }
            $cont ++;
        }
        echo "</ul>";
        if($cont == 0){
            $_SESSIOM["errores"]["db"] = "No hay nada que evaluar en esta unidad o no se ha evaluado al alumno seleccionado";
        }else{
            $media = $aux / $cont;
            echo "<p> La media del alumno elegido es de: " .$media. "</p>";
        }
    }else{
        echo"mondongo";
    }
    ?>
</body>
</html>