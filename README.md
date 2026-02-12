# 🎯 Sistema de Gestión Ágil - SENA (Estructura MVC)

Sistema web de gestión de Historias de Usuario y Criterios de Aceptación desarrollado con PHP puro, MySQL y CSS usando arquitectura MVC.

## 📋 Características

- ✅ CRUD completo de Historias de Usuario
- 🏗️ Arquitectura MVC (Modelo-Vista-Controlador)
- 🎨 Diseño moderno tipo Dashboard administrativo
- 🟢 Paleta de colores institucional SENA
- 🔐 Sistema de login con sesiones
- 📊 Múltiples módulos (Ambiente, Competencia)
- 📱 Diseño responsive
- 🔒 Seguridad con prepared statements

## 📁 Estructura del Proyecto

```
mvc_programa/
│
├── assets/
│   └── css/
│       └── estilos.css          # Estilos del sistema
│
├── model/
│   └── HistoriaUsuario.php      # Modelo de datos
│
├── views/
│   ├── layout/
│   │   ├── header.php           # Encabezado común
│   │   ├── footer.php           # Pie común
│   │   └── login.php            # Vista de login
│   │
│   ├── ambiente/
│   │   ├── index.php            # Listar historias
│   │   ├── crear.php            # Crear historia
│   │   ├── editar.php           # Editar historia
│   │   └── ver.php              # Ver detalle
│   │
│   ├── asignacion/
│   │   └── index.php            # Módulo asignación
│   │
│   ├── calendario/
│   │   └── index.php            # Módulo calendario
│   │
│   ├── competencia/
│   │   ├── index.php            # Listar historias
│   │   ├── crear.php            # Crear historia
│   │   ├── editar.php           # Editar historia
│   │   └── ver.php              # Ver detalle
│   │
│   ├── competencia_programa/
│   │   └── index.php            # Módulo competencia programa
│   │
│   ├── detalle_asignacion/
│   │   └── index.php            # Módulo detalle asignación
│   │
│   ├── ficha/
│   │   └── index.php            # Módulo ficha
│   │
│   ├── instructor/
│   │   └── index.php            # Módulo instructor
│   │
│   ├── programa/
│   │   └── index.php            # Módulo programa
│   │
│   ├── sede/
│   │   └── index.php            # Módulo sede
│   │
│   └── titulo_programa/
│       └── index.php            # Módulo título programa
│
├── Conexion.php                 # Configuración BD y funciones
├── index.php                    # Controlador principal (Router)
├── instalar.php                 # Script de instalación automática
├── database.sql                 # Script de base de datos
└── README.md                    # Este archivo
```

## 🚀 Instalación

### Requisitos
- XAMPP (Apache + MySQL + PHP 7.4+)
- Navegador web moderno

### Pasos de Instalación

1. **Copiar archivos**
   - Copiar la carpeta completa a `C:\xampp\htdocs\mvc_programa\`

2. **Crear base de datos**
   - Abrir phpMyAdmin: `http://localhost/phpmyadmin`
   - Importar el archivo `database.sql`

3. **Configurar conexión** (opcional)
   - Editar `Conexion.php` si tus credenciales son diferentes:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_USER', 'root');
   define('DB_PASS', '');
   define('DB_NAME', 'gestion_agil');
   ```

4. **Acceder al sistema**
   - URL: `http://localhost/mvc_programa/`
   - Usuario: `admin`
   - Contraseña: `admin123`

## 🎨 Paleta de Colores SENA

- Verde Principal: `#39A900`
- Verde Secundario: `#007832`
- Fondos: Blanco y grises suaves

## 🗄️ Base de Datos

### Tabla: usuarios
- id (INT, PK, AUTO_INCREMENT)
- usuario (VARCHAR)
- password (VARCHAR)
- nombre (VARCHAR)
- fecha_registro (TIMESTAMP)

### Tabla: historias_usuario
- id (INT, PK, AUTO_INCREMENT)
- rol (VARCHAR)
- funcionalidad (VARCHAR)
- descripcion (TEXT)
- criterios_aceptacion (TEXT)
- prioridad (ENUM: Alta, Media, Baja)
- estado (ENUM: Pendiente, Proceso, Completado)
- fecha_creacion (TIMESTAMP)
- fecha_actualizacion (TIMESTAMP)

## 🔧 Funcionalidades

### Módulos Implementados (CRUD Completo)
- ✅ **Ambiente**: Gestión completa de historias de usuario
- ✅ **Competencia**: Gestión completa de historias de usuario

### Módulos Preparados (Estructura Lista)
- 📦 **Asignación**: Estructura creada, pendiente implementación
- 📦 **Calendario**: Estructura creada, pendiente implementación
- 📦 **Competencia Programa**: Estructura creada, pendiente implementación
- 📦 **Detalle Asignación**: Estructura creada, pendiente implementación
- 📦 **Ficha**: Estructura creada, pendiente implementación
- 📦 **Instructor**: Estructura creada, pendiente implementación
- 📦 **Programa**: Estructura creada, pendiente implementación
- 📦 **Sede**: Estructura creada, pendiente implementación
- 📦 **Título Programa**: Estructura creada, pendiente implementación

### Modelo (Model)
- `model/HistoriaUsuario.php`: Maneja toda la lógica de datos
  - obtenerTodas()
  - obtenerPorId($id)
  - crear($datos)
  - actualizar($id, $datos)
  - eliminar($id)

### Vista (View)
- `views/layout/`: Plantillas comunes (header, footer, login)
- `views/ambiente/`: Vistas del módulo Ambiente
- `views/competencia/`: Vistas del módulo Competencia

### Controlador (Controller)
- `index.php`: Router principal que maneja todas las rutas
- `Conexion.php`: Configuración y funciones auxiliares

## 🛣️ Rutas del Sistema

### Autenticación
- `?action=login` - Pantalla de login
- `?action=logout` - Cerrar sesión

### Módulo Ambiente
- `?action=ambiente` - Listar historias
- `?action=ambiente_crear` - Crear historia
- `?action=ambiente_editar&id=X` - Editar historia
- `?action=ambiente_ver&id=X` - Ver detalle

### Módulo Competencia
- `?action=competencia` - Listar historias
- `?action=competencia_crear` - Crear historia
- `?action=competencia_editar&id=X` - Editar historia
- `?action=competencia_ver&id=X` - Ver detalle

## 🔒 Seguridad

- Prepared statements para prevenir SQL injection
- Función `limpiar_dato()` para sanitizar entradas
- Validación de sesiones en todas las páginas protegidas
- htmlspecialchars() para prevenir XSS
- Verificación de permisos por módulo

## 🎨 Diseño

- Sidebar fijo con menú de navegación
- Topbar con información de usuario
- Cards con sombras suaves
- Tabla responsive con hover effects
- Botones con transiciones
- Badges de colores por estado
- Formularios con estilos modernos

## 📱 Responsive

El sistema es completamente responsive y se adapta a:
- Desktop (1024px+)
- Tablet (768px - 1023px)
- Mobile (< 768px)

## 🐛 Solución de Problemas

### Error de conexión a BD
- Verificar que XAMPP esté ejecutando MySQL
- Revisar credenciales en `Conexion.php`
- Verificar que la base de datos exista

### Página en blanco
- Activar errores en PHP: `error_reporting(E_ALL);`
- Revisar logs de Apache en `xampp/apache/logs/`

### Estilos no cargan
- Verificar ruta del archivo CSS en header.php
- Limpiar caché del navegador

## 👨‍💻 Tecnologías Utilizadas

- PHP 7.4+ (sin frameworks)
- MySQL 5.7+
- HTML5
- CSS3 (sin frameworks)
- Arquitectura MVC
- JavaScript (mínimo)

## 📝 Extensión del Sistema

Para agregar nuevos módulos:

1. Crear carpeta en `views/nombre_modulo/`
2. Crear archivos: index.php, crear.php, editar.php, ver.php
3. Agregar rutas en `index.php` (switch-case)
4. Agregar enlace en `views/layout/header.php`
5. Opcional: Crear modelo específico en `model/`

## 🎓 Desarrollado para SENA

Sistema educativo para gestión de metodologías ágiles con arquitectura MVC y colores institucionales del Servicio Nacional de Aprendizaje.

---

**Versión:** 2.0.0 (MVC)  
**Fecha:** 2026  
**Licencia:** Uso educativo
