<?php
// Script de instalación automática
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>🚀 Instalador del Sistema de Gestión Ágil - SENA</h1>";
echo "<hr>";

// Configuración
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'gestion_agil';

// Paso 1: Conectar a MySQL
echo "<h2>Paso 1: Conectando a MySQL...</h2>";
$conn = @mysqli_connect($host, $user, $pass);

if (!$conn) {
    die("<p style='color:red;'>❌ Error: No se puede conectar a MySQL. <br>Mensaje: " . mysqli_connect_error() . "<br><br><strong>Solución:</strong> Abre XAMPP Control Panel e inicia MySQL.</p>");
}
echo "<p style='color:green;'>✅ Conexión exitosa a MySQL</p>";

// Paso 2: Crear base de datos
echo "<h2>Paso 2: Creando base de datos...</h2>";
$sql = "CREATE DATABASE IF NOT EXISTS $dbname CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
if (mysqli_query($conn, $sql)) {
    echo "<p style='color:green;'>✅ Base de datos '$dbname' creada o ya existe</p>";
} else {
    die("<p style='color:red;'>❌ Error al crear base de datos: " . mysqli_error($conn) . "</p>");
}

// Paso 3: Seleccionar base de datos
mysqli_select_db($conn, $dbname);

// Paso 4: Crear tabla usuarios
echo "<h2>Paso 3: Creando tablas...</h2>";

$sql_usuarios = "CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

if (mysqli_query($conn, $sql_usuarios)) {
    echo "<p style='color:green;'>✅ Tabla 'usuarios' creada</p>";
} else {
    echo "<p style='color:orange;'>⚠️ Tabla 'usuarios': " . mysqli_error($conn) . "</p>";
}

// Paso 5: Crear tabla historias_usuario
$sql_historias = "CREATE TABLE IF NOT EXISTS historias_usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    rol VARCHAR(100) NOT NULL,
    funcionalidad VARCHAR(200) NOT NULL,
    descripcion TEXT NOT NULL,
    criterios_aceptacion TEXT NOT NULL,
    prioridad ENUM('Alta', 'Media', 'Baja') NOT NULL DEFAULT 'Media',
    estado ENUM('Pendiente', 'Proceso', 'Completado') NOT NULL DEFAULT 'Pendiente',
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

if (mysqli_query($conn, $sql_historias)) {
    echo "<p style='color:green;'>✅ Tabla 'historias_usuario' creada</p>";
} else {
    echo "<p style='color:orange;'>⚠️ Tabla 'historias_usuario': " . mysqli_error($conn) . "</p>";
}

// Paso 6: Insertar usuario demo
echo "<h2>Paso 4: Insertando datos de ejemplo...</h2>";

$check_user = mysqli_query($conn, "SELECT id FROM usuarios WHERE usuario = 'admin'");
if (mysqli_num_rows($check_user) == 0) {
    $sql_insert_user = "INSERT INTO usuarios (usuario, password, nombre) VALUES ('admin', 'admin123', 'Administrador SENA')";
    if (mysqli_query($conn, $sql_insert_user)) {
        echo "<p style='color:green;'>✅ Usuario demo creado (admin / admin123)</p>";
    }
} else {
    echo "<p style='color:blue;'>ℹ️ Usuario demo ya existe</p>";
}

// Paso 7: Insertar historias de ejemplo
$check_historias = mysqli_query($conn, "SELECT id FROM historias_usuario LIMIT 1");
if (mysqli_num_rows($check_historias) == 0) {
    $historias = [
        ['Administrador', 'Gestionar usuarios del sistema', 'Como administrador, quiero gestionar los usuarios del sistema para controlar el acceso y permisos', 'Dado que soy administrador\nCuando accedo al módulo de usuarios\nEntonces puedo crear, editar y eliminar usuarios\nY puedo asignar roles y permisos', 'Alta', 'Proceso'],
        ['Instructor', 'Registrar asistencia de aprendices', 'Como instructor, quiero registrar la asistencia de mis aprendices para llevar control de su participación', 'Dado que tengo una ficha asignada\nCuando ingreso al módulo de asistencia\nEntonces puedo marcar presente, ausente o justificado\nY el sistema guarda el registro con fecha y hora', 'Alta', 'Pendiente'],
        ['Aprendiz', 'Consultar mis calificaciones', 'Como aprendiz, quiero consultar mis calificaciones para conocer mi rendimiento académico', 'Dado que soy un aprendiz activo\nCuando accedo a mi perfil\nEntonces puedo ver todas mis calificaciones por competencia\nY puedo descargar un reporte en PDF', 'Media', 'Completado']
    ];
    
    foreach ($historias as $h) {
        $stmt = mysqli_prepare($conn, "INSERT INTO historias_usuario (rol, funcionalidad, descripcion, criterios_aceptacion, prioridad, estado) VALUES (?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "ssssss", $h[0], $h[1], $h[2], $h[3], $h[4], $h[5]);
        mysqli_stmt_execute($stmt);
    }
    echo "<p style='color:green;'>✅ Historias de ejemplo insertadas</p>";
} else {
    echo "<p style='color:blue;'>ℹ️ Ya existen historias en la base de datos</p>";
}

mysqli_close($conn);

echo "<hr>";
echo "<h2 style='color:green;'>🎉 ¡Instalación Completada!</h2>";
echo "<p><strong>Credenciales de acceso:</strong></p>";
echo "<ul>";
echo "<li>Usuario: <strong>admin</strong></li>";
echo "<li>Contraseña: <strong>admin123</strong></li>";
echo "</ul>";
echo "<p><a href='index.php' style='background:#39A900; color:white; padding:15px 30px; text-decoration:none; border-radius:8px; display:inline-block; margin-top:20px;'>🚀 Ir al Sistema</a></p>";
?>
