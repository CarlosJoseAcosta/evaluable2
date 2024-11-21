<?php

include '../coneccion/coneccion.php';
// Insercion de asignaturas
if(isset($_POST["nombreAsig"]) && $_POST["nombreAsig"] != ""){
    try{
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO asignaturas (nombre) VALUES ('".$_POST["nombreAsig"]."')";
        $conn -> exec($sql);
        header("LOCATION: ../index.php");
        die();
    }catch(PDOException $e){
        $_SESSION["errores"]["db"] = $e -> getMessage();
    }
}
//Insercion de alumnos y relacionados con las asignaturas ya creadas
if((isset($_POST["nombreAlu"])) && ($_POST["nombreAlu"] != "") && (isset($_POST["apellido"])) && ($_POST["apellido"]!= "") && (isset($_POST["asignatura"])) && ($_POST["asignatura"] != "")){
     try{
         $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "INSERT INTO alumnos (Nombre, Apellidos) VALUES ('".$_POST["nombreAlu"]."', '".$_POST["apellido"]."')";
          $seleccion = "SELECT idAlu FROM alumnos WHERE Nombre = '".$_POST["nombreAlu"]."'";
          $conn -> exec($sql);
          foreach($conn -> query($seleccion) as $res){
             $idAl = $res["idAlu"];
          }
         for($i = 0;  $i < count($_POST["asignatura"]); $i++){
            $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo $_POST["asignatura"][$i]. "<br>";
            $insertar = "INSERT INTO alasi (IdAlu, IdAsig) VALUES ('".$idAl."', '".$_POST["asignatura"][$i]."')";
            var_dump($insertar);
            $conn -> exec($insertar);
        }
        header("LOCATION: ../index.php");
        die();
         
     }catch(PDOException $e){
        echo "SI";
        $_SESSION["errores"]["db"] =  $e -> getMessage();
         
     }
}
// Insercion de las unidades con respecto a las asignaturas ya creadas

if((isset($_POST["numeroTem"])) && ($_POST["numeroTem"] != "") && (isset($_POST["nombreTem"])) && ($_POST["nombreTem"] != "") && (isset($_POST["asig"]))){
    try{
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO unidades (numero, nombre, IdAsig) VALUES ('".$_POST["numeroTem"]."', '".$_POST["nombreTem"]."', '".$_POST["asig"]."')";
        echo $_POST["asig"];
        $conn -> exec($sql);
        header("LOCATION: ../index.php");
        die();
    }catch(PDOException $e){
        echo $_POST["asig"];
        echo $e -> getMessage();
    }
}else{}

//Insercion para las nuevas tareas con respecto a la unidad que pertenee

if((isset($_POST["unidades"])) && (isset($_POST["actividad"])) && ($_POST["actividad"]) != ""){
    try{
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO actividades (nombre, IdU) VALUES ('".$_POST["actividad"]."', '".$_POST["unidades"]."')";
        $conn -> exec($sql);
        header("LOCATION: ../index.php");
        die();
    }catch(PDOException $e){
        echo $e -> getMessage();
    }
}else{}

//Añadir nota segun el alumno y la actividad

if((isset($_SESSION["auxiliarId"])) && (isset($_POST["actNota"])) && ($_POST["actNota"] != "") && (isset($_POST["nota"])) && ($_POST["nota"] != "") && ($_POST["nota"] >= 0 )){
    try{
        
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO alact (IdAlu, IdA, Nota) VALUES ('".$_SESSION["auxiliarId"]."', '".$_POST["actNota"]."', '".$_POST["nota"]."')";
        $conn -> exec($sql);
        unset($_SESSION["auxiliarId"]);
        header("LOCATION: ../calificacion/elegirAl.php");
        die();
    }catch(PDOException $e){
        echo $e -> getMessage();
    }
}else{
    
}
