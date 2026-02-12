# 🎯 Sistema de Gestión Ágil - SENA

![SENA](https://img.shields.io/badge/SENA-Sistema%20de%20Gestión-39A900?style=for-the-badge)
![PHP](https://img.shields.io/badge/PHP-7.4+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-5.7+-4479A1?style=for-the-badge&logo=mysql&logoColor=white)

Sistema web completo de gestión de Historias de Usuario y Criterios de Aceptación desarrollado con PHP puro, MySQL y CSS usando arquitectura MVC (Modelo-Vista-Controlador) para el Servicio Nacional de Aprendizaje (SENA).

## ✨ Características Principales

- ✅ **Arquitectura MVC** - Separación clara de responsabilidades
- ✅ **Dashboard Interactivo** - Panel de control con estadísticas en tiempo real
- ✅ **CRUD Completo** - Gestión completa de Historias de Usuario
- 🎨 **Diseño Moderno** - Interfaz tipo Dashboard administrativo
- 🟢 **Colores Institucionales SENA** - Verde Principal (#39A900) y Secundario (#007832)
- 🔐 **Sistema de Login** - Autenticación con sesiones seguras
- 📊 **Múltiples Módulos** - Ambiente, Competencia, Asignación, Calendario, etc.
- 📱 **Diseño Responsive** - Adaptable a todos los dispositivos
- 🔒 **Seguridad** - Prepared statements y validación de datos
- 📈 **Gráficos Visuales** - Estadísticas con barras de progreso y círculos SVG

## 🚀 Tecnologías Utilizadas

- **Backend:** PHP 7.4+ (sin frameworks)
- **Base de Datos:** MySQL 5.7+
- **Frontend:** HTML5, CSS3 (sin frameworks)
- **Arquitectura:** MVC (Modelo-Vista-Controlador)
- **Servidor:** Apache (XAMPP)

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
│   ├── dashboard/
│   │   └── index.php            # Dashboard principal
│   │
│   ├── ambiente/
│   │   ├── index.php            # Listar historias
│   │   ├── crear.php            # Crear historia
│   │   ├── editar.php           # Editar historia
│   │   └── ver.php              # Ver detalle
│   │
│   ├── competencia/
│   │   ├── index.php            # Listar historias
│   │   ├── crear.php            # Crear historia
│   │   ├── editar.php           # Editar historia
│   │   └── ver.php              # Ver detalle
│   │
│   └── [otros módulos]/
│       └── index.php            # Módulos preparados
│
├── Conexion.php                 # Configuración BD y funciones
├── Conexion.example.php         # Ejemplo de configuración
├── index.php                    # Controlador principal (Router)
├── instalar.php                 # Script de instalación automática
├── database.sql                 # Script de base de datos
└── README.md                    # Este archivo
```

## 🔧 Instalación

### Requisitos Previos
- XAMPP (Apache + MySQL + PHP 7.4+)
- Navegador web moderno
- Git (opcional)

### Pasos de Instalación

1. **Clonar el repositorio**
   ```bash
   git clone https://github.com/chaustrexp/MVC_proyecto.git
   cd MVC_proyecto
   ```

2. **Copiar a XAMPP**
   - Copiar la carpeta completa a `C:\xampp\htdocs\gestion_sena\`

3. **Iniciar servicios**
   - Abrir XAMPP Control Panel
   - Iniciar Apache ✅
   - Iniciar MySQL ✅

4. **Instalar base de datos**
   - Opción 1: Ejecutar el instalador automático
     ```
     http://localhost/gestion_sena/instalar.php
     ```
   - Opción 2: Importar manualmente
     - Ir a `http://localhost/phpmyadmin`
     - Crear base de datos `gestion_agil`
     - Importar `database.sql`

5. **Configurar conexión** (opcional)
   - Renombrar `Conexion.example.php` a `Conexion.php`
   - Editar credenciales si son diferentes:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_USER', 'root');
   define('DB_PASS', '');
   define('DB_NAME', 'gestion_agil');
   ```

6. **Acceder al sistema**
   ```
   http://localhost/gestion_sena/
   ```
   - **Usuario:** admin
   - **Contraseña:** admin123

## 📊 Módulos del Sistema

### Módulos Implementados (CRUD Completo)
- ✅ **Dashboard** - Panel de control con estadísticas
- ✅ **Ambiente** - Gestión completa de historias de usuario
- ✅ **Competencia** - Gestión completa de historias de usuario

### Módulos Preparados (Estructura Lista)
- 📦 **Asignación** - Estructura creada, pendiente implementación
- 📦 **Calendario** - Estructura creada, pendiente implementación
- 📦 **Competencia Programa** - Estructura creada, pendiente implementación
- 📦 **Detalle Asignación** - Estructura creada, pendiente implementación
- 📦 **Ficha** - Estructura creada, pendiente implementación
- 📦 **Instructor** - Estructura creada, pendiente implementación
- 📦 **Programa** - Estructura creada, pendiente implementación
- 📦 **Sede** - Estructura creada, pendiente implementación
- 📦 **Título Programa** - Estructura creada, pendiente implementación

## 🎨 Características del Dashboard

### Tarjetas de Estadísticas
- 📊 Total de Historias
- ⏳ Historias Pendientes
- ⚙️ Historias en Proceso
- ✅ Historias Completadas

### Visualizaciones
- 📈 Gráfico de barras por prioridad (Alta, Media, Baja)
- 🎯 Círculo de progreso general
- 📋 Tabla de últimas historias registradas
- ⚡ Accesos rápidos a funciones principales

## 🗄️ Base de Datos

### Tabla: usuarios
```sql
- id (INT, PK, AUTO_INCREMENT)
- usuario (VARCHAR)
- password (VARCHAR)
- nombre (VARCHAR)
- fecha_registro (TIMESTAMP)
```

### Tabla: historias_usuario
```sql
- id (INT, PK, AUTO_INCREMENT)
- rol (VARCHAR)
- funcionalidad (VARCHAR)
- descripcion (TEXT)
- criterios_aceptacion (TEXT)
- prioridad (ENUM: Alta, Media, Baja)
- estado (ENUM: Pendiente, Proceso, Completado)
- fecha_creacion (TIMESTAMP)
- fecha_actualizacion (TIMESTAMP)
```

## 🔒 Seguridad

- ✅ Prepared statements para prevenir SQL injection
- ✅ Función `limpiar_dato()` para sanitizar entradas
- ✅ Validación de sesiones en todas las páginas protegidas
- ✅ htmlspecialchars() para prevenir XSS
- ✅ Verificación de permisos por módulo

## 🎨 Paleta de Colores SENA

- **Verde Principal:** `#39A900`
- **Verde Secundario:** `#007832`
- **Fondos:** Blanco y grises suaves
- **Acentos:** Colores para estados y prioridades

## 🛣️ Rutas del Sistema

### Autenticación
- `?action=login` - Pantalla de login
- `?action=logout` - Cerrar sesión

### Dashboard
- `?action=dashboard` - Panel de control principal

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

## 📱 Responsive Design

El sistema es completamente responsive y se adapta a:
- 💻 Desktop (1024px+)
- 📱 Tablet (768px - 1023px)
- 📱 Mobile (< 768px)

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

## 📝 Extensión del Sistema

Para agregar nuevos módulos:

1. Crear carpeta en `views/nombre_modulo/`
2. Crear archivos: index.php, crear.php, editar.php, ver.php
3. Agregar rutas en `index.php` (switch-case)
4. Agregar enlace en `views/layout/header.php`
5. Opcional: Crear modelo específico en `model/`

## 👨‍💻 Autor

**Cristian Chaustre**
- Email: cristianchaustre90@gmail.com
- GitHub: [@chaustrexp](https://github.com/chaustrexp)

## 🤝 Contribuir

Las contribuciones son bienvenidas. Para cambios importantes:

1. Fork el proyecto
2. Crea una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abre un Pull Request

## 📄 Licencia

Este proyecto es de uso educativo para el SENA - Servicio Nacional de Aprendizaje.

## 🎓 Desarrollado para SENA

Sistema educativo para gestión de metodologías ágiles con arquitectura MVC y colores institucionales del Servicio Nacional de Aprendizaje.

---

**Versión:** 2.0.0 (MVC + Dashboard)  
**Fecha:** 2026  
**Licencia:** Uso educativo

⭐ Si este proyecto te fue útil, considera darle una estrella en GitHub!
