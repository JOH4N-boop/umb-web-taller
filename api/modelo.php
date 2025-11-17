<?php
require_once "db.php";

function obtenerTareas() {
    global $conexion;
    $sql = "SELECT * FROM tareas";
    return mysqli_query($conexion, $sql);
}

function obtenerTareaPorId($id) {
    global $conexion;
    $id = intval($id);
    $sql = "SELECT * FROM tareas WHERE id = $id LIMIT 1";
    return mysqli_query($conexion, $sql);
}

function crearTarea($titulo) {
    global $conexion;
    $titulo = mysqli_real_escape_string($conexion, $titulo);

    $sql = "INSERT INTO tareas (titulo, completada) VALUES ('$titulo', 0)";
    return mysqli_query($conexion, $sql);
}

function actualizarTarea($id, $titulo, $completada) {
    global $conexion;

    $id = intval($id);
    $titulo = mysqli_real_escape_string($conexion, $titulo);
    $completada = intval($completada);

    $sql = "UPDATE tareas 
            SET titulo = '$titulo', completada = $completada
            WHERE id = $id";

    return mysqli_query($conexion, $sql);
}

function eliminarTarea($id) {
    global $conexion;
    $id = intval($id);

    $sql = "DELETE FROM tareas WHERE id = $id";
    return mysqli_query($conexion, $sql);
}
?>
