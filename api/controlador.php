<?php
require_once "modelo.php";

$accion = $_GET['accion'] ?? "";

switch ($accion) {
    case "listar":
        $resultado = obtenerTareas();
        $tareas = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        echo json_encode($tareas);
        break;

    case "agregar":
        $titulo = $_POST['titulo'];
        agregarTarea($titulo);
        echo "Tarea agregada";
        break;

    case "completar":
        completarTarea($_POST['id']);
        echo "Tarea completada";
        break;

    case "eliminar":
        eliminarTarea($_POST['id']);
        echo "Tarea eliminada";
        break;

    default:
        echo "Acción no válida";
        break;
}
