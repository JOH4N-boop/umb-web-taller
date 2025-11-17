<?php
// CORS para el frontend (React)
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

require_once "modelo.php";

$metodo = $_SERVER['REQUEST_METHOD'];

switch ($metodo) {

    /* ============================
       GET → Obtener tareas / una tarea
    ============================= */
    case 'GET':

        if (isset($_GET['id'])) {
            $result = obtenerTareaPorId($_GET['id']);
            $tarea = mysqli_fetch_assoc($result);
            echo json_encode($tarea);
        } else {
            $resultado = obtenerTareas();
            $tareas = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
            echo json_encode($tareas);
        }
        break;

    /* ============================
       POST → Crear tarea
    ============================= */
    case 'POST':
        $datos = json_decode(file_get_contents("php://input"), true);

        if (!isset($datos['titulo'])) {
            echo json_encode(["error" => "Falta el título"]);
            break;
        }

        crearTarea($datos['titulo']);
        echo json_encode(["mensaje" => "Tarea creada"]);
        break;

    /* ============================
       PUT → Actualizar tarea
    ============================= */
    case 'PUT':
        parse_str($_SERVER['QUERY_STRING'], $params);
        $id = $params['id'] ?? null;

        if (!$id) {
            echo json_encode(["error" => "Falta el ID"]);
            break;
        }

        $datos = json_decode(file_get_contents("php://input"), true);

        actualizarTarea(
            $id,
            $datos['titulo'],
            $datos['completada']
        );

        echo json_encode(["mensaje" => "Tarea actualizada"]);
        break;

    /* ============================
       DELETE → Eliminar tarea
    ============================= */
    case 'DELETE':
        parse_str($_SERVER['QUERY_STRING'], $params);
        $id = $params['id'] ?? null;

        if (!$id) {
            echo json_encode(["error" => "Falta el ID"]);
            break;
        }

        eliminarTarea($id);
        echo json_encode(["mensaje" => "Tarea eliminada"]);
        break;

    default:
        echo json_encode(["error" => "Método no permitido"]);
        break;
}
?>
