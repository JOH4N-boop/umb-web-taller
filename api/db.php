<?php
// Conexión a MySQL local
$conexion = mysqli_connect(
    "localhost",     // Servidor
    "root",          // Usuario
    "",              // Contraseña (en XAMPP normalmente es vacío)
    "tareas_db"      // Nombre de tu base de datos
);

// Validación de conexión
if (!$conexion) {
    die("Error al conectar a MySQL: " . mysqli_connect_error());
}
?>
