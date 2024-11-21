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
}