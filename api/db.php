<?php
// 1. Conexión con MySQL local (XAMPP)
$conexion = mysqli_connect(
  "localhost",   // host
  "root",        // usuario por defecto de XAMPP
  "",            // contraseña (vacía en XAMPP)
  "tareas_db"    // nombre de tu base de datos
);

// 2. Validación
if(mysqli_connect_errno()){
  echo "Error al conectar a MySQL: " . mysqli_connect_error();
  exit();
}
?>
