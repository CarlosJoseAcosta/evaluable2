<?php
include "../coneccion/coneccion.php";

if(isset($_POST["asignaturaEl"])){
    try{
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM asignaturas WHERE IdAsig = '".$_POST["asignaturaEl"]."'";
        $conn -> exec($sql);
        header("LOCATION ../index.php");
        die();
    }catch(PDOException $e){
        $_SESSION["errores"]["db"] = "Ha ocurrido un error a la hora de eliminar la asignatura";
    }
}else{
    $_SESSION["errores"]["db"] = "Los datos introducidos no son correctos fijese que al menos un campo este con la informacion necesaria";
    header("LOCATION: ../index.php");
    die();
}

if(isset($_POST["alumnosEli"])){
    try{
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM alumnos WHERE IdAlu = '".$_POST["alumnosEli"]."'";
    $conn -> exec($sql);
    header("LOCATION: ../index.php");
    die();
    }catch(PDOException $e){
        $_SESSION["errores"]["db"] = "Ha ocurrido un error a la hora de eliminar al alumno";
    }
}else{
    $_SESSION["errores"]["db"] = "Los datos introducidos no son correctos fijese que al menos un campo este con la informacion necesaria";
    header("LOCATION: ../index.php");
    die();
}

if(isset($_POST["eliTemario"])){
    try{
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM unidades WHERE IdU = '".$_POST["eliTemario"]."'";
        $conn -> exec($sql);
        header("LOCATION: ../index.php");
        die();
    }catch(PDOException $e){
        $_SESSION["errores"]["db"] = "Ha ocurrido un error a la hora de eliminar la unidad";
    }
}else{
    $_SESSION["errores"]["db"] = "Los datos introducidos no son correctos fijese que al menos un campo este con la informacion necesaria";
    header("LOCATION: ../index.php");
    die();
}

if(isset($_POST["eliActi"])){
    try{
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM actividades WHERE IdA = '".$_POST["eliActi"]."'";
        $conn -> exec($sql);
        header("LOCATION: ../index.php");
    }catch(PDOException $e){
        $_SESSION["errores"]["db"] = "Ha ocurrido un error a la hora de eliminar la actividad";
    }
}else{
    $_SESSION["errores"]["db"] = "Los datos introducidos no son correctos fijese que al menos un campo este con la informacion necesaria";
    header("LOCATION: ../index.php");
    die();
}

if((isset($_POST["actuAsig"])) && (isset($_POST["neoAsig"])) && ($_POST["neoAsig"] != "")){
    try{
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE asignaturas SET Nombre = '".$_POST["neoAsig"]."' WHERE IdAsig = '".$_POST["actuAsig"]."'";
        $nosepremo = $conn -> prepare($sql);
        $nosepremo -> execute();
        header("LOCATION: ../index.php");
        die();
    }catch(PDOException $e){
        $_SESSION["errores"]["db"] = "Ha ocurrido un error a la hora de modificar los datos de las asignaturas";
    }
}else{
    $_SESSION["errores"]["db"] = "Los datos introducidos no son correctos fijese que al menos un campo este con la informacion necesaria";
    header("LOCATION: ../index.php");
    die();
}

if((isset($_POST["actuAlu"])) && (isset($_POST["neoNomAl"])) && (isset($_POST["neoApeAl"])) && ($_POST["neoNomAl"] != "") && ($_POST["neoApeAl"] != "")){
    try{
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE alumnos SET Nombre = '".$_POST["neoNomAl"]."', Apellidos = '".$_POST["neoApeAl"]."' WHERE IdAlu = '".$_POST["actuAlu"]."'";
        $nosepremo = $conn -> prepare($sql);
        $nosepremo -> execute();
        header("LOCATION: ../index.php");
        die();
    }catch(PDOException $e){
        $_SESSION["errores"]["db"] = "Ha ocurrido un error a la hora de modificar los datos del alumno";
    }
}else if(isset($_POST["actuAlu"]) && (isset($_POST["neoNomAl"])) && ($_POST["neoNomAl"] != "")){
    try{
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE alumnos SET Nombre = '".$_POST["neoNomAl"]."' WHERE IdAlu = '".$_POST["actuAlu"]."'";
        $nosepremo = $conn -> prepare($sql);
        $nosepremo -> execute();
        header("LOCATION: ../index.php");
        die();
    }catch(PDOException $e){
        $_SESSION["errores"]["db"] = "Ha ocurrido un error a la hora de modificar los datos del alumno";
    }
}else if(isset($_POST["actuAlu"]) && (isset($_POST["neoApeAl"])) && ($_POST["neoApeAl"] != "")){
    try{
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE alumnos SET Apellidos = '".$_POST["neoApeAl"]."' WHERE IdAlu = '".$_POST["actuAlu"]."'";
        $nosepremo = $conn -> prepare($sql);
        $nosepremo -> execute();
        header("LOCATION: ../index.php");
        die();
    }catch(PDOException $e){
        $_SESSION["errores"]["db"] = "Ha ocurrido un error a la hora de modificar los datos del alumno";
    }
}else{
    $_SESSION["errores"]["db"] = "Los datos introducidos no son correctos fijese que al menos un campo este con la informacion necesaria";
    header("LOCATION: ../index.php");
    die();
}

if((isset($_POST["actuTem"])) && (isset($_POST["neoNomTem"])) && (isset($_POST["neoNumTem"])) && ($_POST["neoNomTem"] != "") && ($_POST["neoNumTem"]) != ""){
    try{
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE unidades SET nombre = '".$_POST["neoNomTem"]."', numero = '".$_POST["neoNumTem"]."' WHERE IdU = '".$_POST["actuTem"]."'";
        $nosepremo = $conn -> prepare($sql);
        $nosepremo -> execute();
        header("LOCATION: ../index.php");
        die();
    }catch(PDOException $e){
        $_SESSION["errores"]["db"] = "Ha ocurrido un error a la hora de modificar los datos del temario";
    }
}else if((isset($_POST["actuTem"])) && (isset($_POST["neoNomTem"])) && ($_POST["neoNomTem"] != "")){
    try{
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE unidades SET nombre = '".$_POST["neoNomTem"]."' WHERE IdU = '".$_POST["actuTem"]."'";
        $nosepremo = $conn -> prepare($sql);
        $nosepremo -> execute();
        header("LOCATION: ../index.php");
        die();
    }catch(PDOException $e){
        $_SESSION["errores"]["db"] = "Ha ocurrido un error a la hora de modificar los datos del temario";
    }
}else if((isset($_POST["actuTem"])) && (isset($_POST["neoNumTem"])) && ($_POST["neoNumTem"] != "")){
    try{
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE unidades SET numero = '".$_POST["neoNumTem"]."' WHERE IdU = '".$_POST["actuTem"]."'";
        $nosepremo = $conn -> prepare($sql);
        $nosepremo -> execute();
        header("LOCATION: ../index.php");
        die();
    }catch(PDOException $e){
        $_SESSION["errores"]["db"] = "Ha ocurrido un error a la hora de modificar los datos del temario";
    }
}else{
    $_SESSION["errores"]["db"] = "Los datos introducidos no son correctos fijese que al menos un campo este con la informacion necesaria";
    header("LOCATION: ../index.php");
    die();
}

if((isset($_POST["actuActi"])) && (isset($_POST["neoNomAct"])) && ($_POST["neoNomAct"] != "")){
    try{
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE actividades SET nombre = '".$_POST["neoNomAct"]."' WHERE IdA = '".$_POST["actuActi"]."'";
        $nosepremo = $conn -> prepare($sql);
        $nosepremo -> execute();
        header("LOCATION: ../index.php");
        die();
    }catch(PDOException $e){

    }
}else{
    $_SESSION["errores"]["db"] = "Los datos introducidos no son correctos fijese que al menos un campo este con la informacion necesaria";
    header("LOCATION: ../index.php");
    die();
}