<!DOCTYPE html>
<?php
    include 'coneccion/coneccion.php';
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    <h3>Insercion</h3>
    <a href="insertar/asignaturaIns.php"><button>Insertar asignatura</button></a>
    <a href="insertar/alumnoIns.php"><button>Inertar alumnos</button></a>
    <a href="insertar/temasIns.php"><button>Insertar temas</button></a>
    <a href="insertar/actIns.php"><button>Insertar actividades</button></a><br>
    <h3>Calificaciones</h3>
    <a href = "calificacion/elegirAl.php"><button>Añadir calificaciones</button></a>
    <a href="calificacion/media.php"><button>Ver media de alumnos</button></a><br>
    <h3>Gestion de alumnos y actividades</h3>
    <a href="modificar/eliAsigphp.php"><button>Eliminar asignatura</button></a>
    <a href="modificar/eliAlu.php"><button>Eliminar alumno</button></a>
    <a href="modificar/eliTemario.php"><button>Eliminar temario</button></a>
    <a href="modificar/eliActi.php"><button>Eliminar actividad</button></a><br>
    <a href=""><button>Actualizar asignatura</button></a>
    <a href=""><button>Actualizar alumno</button></a>
    <a href=""><button>Actualizar temario</button></a>
    <a href=""><button>Actualizar actividad</button></a>
</body>
</html>