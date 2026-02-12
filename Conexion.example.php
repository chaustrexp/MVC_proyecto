<?php
// Configuración de la base de datos
// INSTRUCCIONES: Renombra este archivo a Conexion.php y configura tus credenciales

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'gestion_agil');

// Crear conexión sin seleccionar base de datos primero
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS);

// Verificar conexión
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error() . "<br>Verifica que MySQL esté corriendo en XAMPP");
}

// Crear base de datos si no existe
$sql = "CREATE DATABASE IF NOT EXISTS " . DB_NAME . " CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
mysqli_query($conn, $sql);

// Seleccionar la base de datos
mysqli_select_db($conn, DB_NAME);

// Configurar charset
mysqli_set_charset($conn, "utf8");

// Configurar locale para fechas en español
setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'spanish');
date_default_timezone_set('America/Bogota');

// Iniciar sesión si no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Función para limpiar datos de entrada
function limpiar_dato($dato) {
    global $conn;
    $dato = trim($dato);
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato);
    return mysqli_real_escape_string($conn, $dato);
}

// Verificar si el usuario está logueado
function verificar_sesion() {
    if (!isset($_SESSION['usuario_id'])) {
        header("Location: index.php?action=login");
        exit();
    }
}
?>
