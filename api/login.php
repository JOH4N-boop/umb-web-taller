<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
header("Content-Type: application/json");

session_start();
require_once "db.php";

$metodo = $_SERVER["REQUEST_METHOD"];

if ($metodo === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($data["usuario"]) || !isset($data["contrasena"])) {
        echo json_encode(["error" => "Faltan campos"]);
        exit;
    }

    $usuario = mysqli_real_escape_string($conexion, $data["usuario"]);
    $contrasena = md5($data["contrasena"]);  // contraseña cifrada

    // Buscar usuario
    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
    $result = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Guardar usuario en sesión
        $_SESSION["usuario"] = $usuario;

        echo json_encode([
            "mensaje" => "Sesión iniciada",
            "usuario" => $usuario,
            "sesion" => true
        ]);
    } else {
        echo json_encode(["error" => "Credenciales incorrectas", "sesion" => false]);
    }
}
else if ($metodo === "GET") {
    // Verificar si ya existe una sesión activa
    if (isset($_SESSION["usuario"])) {
        echo json_encode([
            "sesion" => true,
            "usuario" => $_SESSION["usuario"]
        ]);
    } else {
        echo json_encode(["sesion" => false]);
    }
}
else if ($metodo === "DELETE") {
    // Cerrar sesión
    session_destroy();
    echo json_encode(["mensaje" => "Sesión cerrada"]);
}
?>
