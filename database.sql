-- Base de datos para Sistema de Gestión Ágil
-- Ejecutar este script en phpMyAdmin o MySQL

CREATE DATABASE IF NOT EXISTS gestion_agil CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE gestion_agil;

-- Tabla de usuarios
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insertar usuario demo
INSERT INTO usuarios (usuario, password, nombre) VALUES 
('admin', 'admin123', 'Administrador SENA');

-- Tabla de historias de usuario
CREATE TABLE IF NOT EXISTS historias_usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    rol VARCHAR(100) NOT NULL,
    funcionalidad VARCHAR(200) NOT NULL,
    descripcion TEXT NOT NULL,
    criterios_aceptacion TEXT NOT NULL,
    prioridad ENUM('Alta', 'Media', 'Baja') NOT NULL DEFAULT 'Media',
    estado ENUM('Pendiente', 'Proceso', 'Completado') NOT NULL DEFAULT 'Pendiente',
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insertar datos de ejemplo
INSERT INTO historias_usuario (rol, funcionalidad, descripcion, criterios_aceptacion, prioridad, estado) VALUES
('Administrador', 'Gestionar usuarios del sistema', 'Como administrador, quiero gestionar los usuarios del sistema para controlar el acceso y permisos', 'Dado que soy administrador\nCuando accedo al módulo de usuarios\nEntonces puedo crear, editar y eliminar usuarios\nY puedo asignar roles y permisos', 'Alta', 'Proceso'),

('Instructor', 'Registrar asistencia de aprendices', 'Como instructor, quiero registrar la asistencia de mis aprendices para llevar control de su participación', 'Dado que tengo una ficha asignada\nCuando ingreso al módulo de asistencia\nEntonces puedo marcar presente, ausente o justificado\nY el sistema guarda el registro con fecha y hora', 'Alta', 'Pendiente'),

('Aprendiz', 'Consultar mis calificaciones', 'Como aprendiz, quiero consultar mis calificaciones para conocer mi rendimiento académico', 'Dado que soy un aprendiz activo\nCuando accedo a mi perfil\nEntonces puedo ver todas mis calificaciones por competencia\nY puedo descargar un reporte en PDF', 'Media', 'Completado'),

('Coordinador', 'Generar reportes estadísticos', 'Como coordinador, quiero generar reportes estadísticos para analizar el desempeño del centro', 'Dado que tengo permisos de coordinador\nCuando accedo al módulo de reportes\nEntonces puedo filtrar por fecha, programa y ficha\nY puedo exportar en Excel o PDF', 'Media', 'Pendiente'),

('Usuario', 'Recuperar contraseña olvidada', 'Como usuario, quiero recuperar mi contraseña en caso de olvidarla para poder acceder nuevamente', 'Dado que olvidé mi contraseña\nCuando hago clic en recuperar contraseña\nEntonces recibo un correo con enlace de recuperación\nY puedo establecer una nueva contraseña', 'Baja', 'Completado');
