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
    <form action="media.php" method = "POST">
        Elija el alumno: <select name="alumno">
            <?php
                $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT * FROM alumnos";
                foreach($conn -> query($sql) as $resultado){
                    echo "<option value = '".$resultado["IdAlu"]."'>".$resultado["Nombre"]."</option>";
                }
            ?>
        </select><br>
        <input type="submit">
    </form>
    <?php
    if(isset(($_POST["alumno"])) && ($_POST["alumno"] != "")){
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT Nota FROM alact WHERE idAlu = '".$_POST["alumno"]."'";
        $cont = 0;
        $aux = 0;
        echo "<ul>";
        foreach($conn->query($sql) as $result){
            echo "<li>".$result["Nota"]."</li>";
            if($aux == 0){
                $aux = $result["nota"];
            }else{
                $aux = $aux + $result["nota"];
            }
            $cont ++;
        }
        echo "</ul>";
        $media = $aux / $cont;
        
    }else{
        echo"mondongo";
    }
    ?>
</body>
</html>