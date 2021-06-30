<?php

//Etapa de preparacion
$mysqli = new mysqli("localhost:3306", "root", "", "php");
if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}else{
    echo 'Conexion realizada con exito <br>';
}

/* Sentencia no preparada */
if (!$mysqli->query("DROP TABLE IF EXISTS test") || !$mysqli->query("CREATE TABLE test(id INT)")) {
    echo "Falló la creación de la tabla: (" . $mysqli->errno . ") " . $mysqli->error;
}else{
    echo 'Tabla Test creada con exito <br>';
}

/* Sentencia preparada, etapa 1: preparación */
if (!($sentencia = $mysqli->prepare("INSERT INTO test(id) VALUES (?)"))) {
    echo "Falló la preparación: (" . $mysqli->errno . ") " . $mysqli->error;
}else{
    echo 'Sentencia preparada con exito <br>';
}


/* Sentencia preparada, etapa 2: vincular y ejecutar */
$id = 1;
if (!$sentencia->bind_param("i", $id)) {
    echo "Falló la vinculación de parámetros: (" . $sentencia->errno . ") " . $sentencia->error;
}else{
    echo 'Sentencia vinculada con exito <br>';
}

if (!$sentencia->execute()) {
    echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
}else{
    echo 'Sentencia ejecutada con exito <br>';
}


/* Sentencia preparada: ejecución repetida, sólo datos transferidos desde el cliente al servidor */
for ($id = 2; $id < 5; $id++) {
    if (!$sentencia->execute()) {
        echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
    }
}

/* se recomienda el cierre explícito */
$sentencia->close();

/* Sentencia no preparada */
$resultado = $mysqli->query("SELECT id FROM test");
var_dump($resultado->fetch_all());


?>