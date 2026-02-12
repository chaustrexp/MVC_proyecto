# 🎓 Sistema de Gestión Académica SENA

Sistema completo de gestión académica desarrollado con arquitectura MVC (Modelo-Vista-Controlador) para el Servicio Nacional de Aprendizaje (SENA). Incluye gestión de programas, instructores, fichas, competencias, ambientes y asignaciones.

![SENA](https://img.shields.io/badge/SENA-Sistema%20de%20Gestión-38a800?style=for-the-badge)
![PHP](https://img.shields.io/badge/PHP-7.4+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0+-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-3.0+-06B6D4?style=for-the-badge&logo=tailwind-css&logoColor=white)

## 📋 Tabla de Contenidos

- [Características](#-características)
- [Tecnologías](#-tecnologías)
- [Estructura del Proyecto](#-estructura-del-proyecto)
- [Instalación](#-instalación)
- [Configuración](#-configuración)
- [Módulos del Sistema](#-módulos-del-sistema)
- [Diseños Únicos](#-diseños-únicos)
- [Base de Datos](#-base-de-datos)
- [Capturas de Pantalla](#-capturas-de-pantalla)
- [Contribuir](#-contribuir)
- [Licencia](#-licencia)

## ✨ Características

- ✅ **Arquitectura MVC** - Separación clara de responsabilidades
- ✅ **Diseños Modernos** - Cada módulo con diseño único usando Tailwind CSS
- ✅ **Responsive Design** - Adaptable a dispositivos móviles y tablets
- ✅ **CRUD Completo** - Crear, Leer, Actualizar y Eliminar para todas las entidades
- ✅ **Colores SENA** - Identidad visual institucional (#38a800, #007832)
- ✅ **POO** - Programación Orientada a Objetos
- ✅ **Validaciones** - Validación de datos en formularios
- ✅ **Búsqueda en Tiempo Real** - Filtrado dinámico de registros

## 🛠 Tecnologías

### Backend
- **PHP 7.4+** - Lenguaje de programación del lado del servidor
- **MySQL 8.0+** - Sistema de gestión de base de datos
- **PDO** - PHP Data Objects para conexión segura a BD

### Frontend
- **HTML5** - Estructura semántica
- **Tailwind CSS 3.0+** - Framework CSS utility-first
- **JavaScript (Vanilla)** - Interactividad del lado del cliente
- **Material Icons** - Iconografía moderna
- **Google Fonts** - Tipografías: Poppins, Inter, Lexend, Public Sans

## 📁 Estructura del Proyecto

```
MVC_proyecto/
├── assets/
│   └── css/
│       └── styles.css          # Estilos globales con colores SENA
├── modelo/
│   ├── conexion.php            # Clase de conexión a BD
│   ├── AmbienteModel.php       # Modelo de Ambientes
│   ├── AsignacionModel.php     # Modelo de Asignaciones
│   ├── AsignacioDetalleModel.php # Modelo de Detalles de Asignación
│   ├── CompetenciaModel.php    # Modelo de Competencias
│   ├── CompetenciaPrograModel.php # Modelo de Competencias-Programa
│   ├── FichaModel.php          # Modelo de Fichas
│   ├── InstructorModel.php     # Modelo de Instructores
│   ├── ProgramaModel.php       # Modelo de Programas
│   ├── SedeModel.php           # Modelo de Sedes
│   └── TituloPrograModel.php   # Modelo de Títulos de Programa
├── vista/
│   ├── ambiente/               # Vistas de Ambientes
│   │   ├── index.php
│   │   ├── crear.php
│   │   ├── editar.php
│   │   └── ver.php
│   ├── asignacion/             # Vistas de Asignaciones
│   ├── competencia/            # Vistas de Competencias
│   ├── competencia_programa/   # Vistas de Competencias-Programa
│   ├── detalle_asignacion/     # Vistas de Detalles de Asignación
│   ├── ficha/                  # Vistas de Fichas
│   ├── instructor/             # Vistas de Instructores
│   ├── programa/               # Vistas de Programas
│   ├── sede/                   # Vistas de Sedes
│   ├── titulo_programa/        # Vistas de Títulos de Programa
│   └── layout/                 # Componentes compartidos
│       ├── header.php
│       └── footer.php
├── conexion.php                # Archivo de conexión raíz
└── README.md                   # Este archivo
```

## 🚀 Instalación

### Requisitos Previos

- PHP 7.4 o superior
- MySQL 8.0 o superior
- Servidor web (Apache/Nginx) o XAMPP/WAMP
- Composer (opcional)

### Pasos de Instalación

1. **Clonar el repositorio**
```bash
git clone https://github.com/chaustrexp/MVC_proyecto.git
cd MVC_proyecto
```

2. **Configurar la base de datos**
```sql
-- Crear la base de datos
CREATE DATABASE sena_gestion CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

3. **Importar el esquema de base de datos**
```bash
mysql -u root -p sena_gestion < database/schema.sql
```

4. **Configurar la conexión**

Editar `modelo/conexion.php` y `conexion.php`:
```php
private $host = "localhost";
private $db = "sena_gestion";
private $user = "root";
private $password = "tu_password";
```

5. **Iniciar el servidor**
```bash
# Con PHP built-in server
php -S localhost:8000

# O configurar en Apache/Nginx
```

6. **Acceder al sistema**
```
http://localhost:8000/vista/sede/index.php
```

## ⚙️ Configuración

### Conexión a Base de Datos

El sistema utiliza PDO para conexiones seguras. Configurar en `modelo/conexion.php`:

```php
class Db {
    private $host = "localhost";
    private $db = "sena_gestion";
    private $user = "root";
    private $password = "";
    private $charset = "utf8mb4";
    
    public function getConnect() {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}";
            $pdo = new PDO($dsn, $this->user, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch(PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}
```

## 📦 Módulos del Sistema

### 1. 🏢 Sedes
Gestión de sedes del SENA con información de ubicación y contacto.
- **Diseño**: Tailwind CSS con verde SENA (#39A900)
- **Características**: Tarjetas con información de contacto, mapa de ubicación

### 2. 🚪 Ambientes
Administración de ambientes de formación (aulas, laboratorios, talleres).
- **Diseño**: Estilo iOS con verde SENA (#27a800)
- **Características**: Capacidad, tipo de ambiente, sede asociada

### 3. 📚 Programas
Gestión de programas de formación del SENA.
- **Diseño**: Logo SENA, navegación flotante
- **Características**: Título, duración, nivel de formación

### 4. 🎯 Competencias
Administración de competencias laborales.
- **Diseño**: Búsqueda en tiempo real, tarjetas modernas
- **Características**: Código, nombre corto, descripción

### 5. 🔗 Competencias-Programa
Relación entre competencias y programas de formación.
- **Diseño**: Tabla de relaciones con filtros
- **Características**: Vinculación múltiple

### 6. 👨‍🏫 Instructores
Gestión de instructores del SENA.
- **Diseño**: Estilo directorio/contactos con Public Sans
- **Características**: Datos personales, contacto, especialidad

### 7. 🎓 Fichas
Administración de fichas de formación (grupos de aprendices).
- **Diseño**: Badges de jornada (Diurna/Nocturna/Mixta)
- **Características**: Número de ficha, programa, jornada, fechas

### 8. 📅 Asignaciones
Gestión de asignaciones de instructores a fichas.
- **Diseño**: Tema calendario/horarios con Public Sans
- **Características**: Instructor, ficha, ambiente, competencia, fechas

### 9. ⏰ Detalle de Asignación
Horarios específicos de las sesiones de formación.
- **Diseño**: Estilo iOS con Lexend
- **Características**: Hora inicio, hora fin, duración

### 10. 🏆 Títulos de Programa
Gestión de títulos que otorgan los programas.
- **Diseño**: Gradiente purple-indigo, tema educativo con Poppins
- **Características**: Nombre del título, certificación

## 🎨 Diseños Únicos

Cada módulo tiene un diseño único y moderno:

| Módulo | Fuente | Colores | Estilo |
|--------|--------|---------|--------|
| Sede | Inter | Verde SENA (#39A900) | Material Design |
| Ambiente | Inter | Verde SENA (#27a800) | iOS Style |
| Programa | Public Sans | Verde SENA (#38a800) | Floating Navigation |
| Competencia | Inter | Verde SENA (#38a800) | Card Grid |
| Instructor | Public Sans | Neutros | Directory Style |
| Ficha | Public Sans | Verde SENA + Badges | Card Layout |
| Asignación | Public Sans | Verde SENA (#38a800) | Calendar Theme |
| Detalle Asignación | Lexend | Verde SENA (#38a800) | iOS Style |
| Título Programa | Poppins | Purple-Indigo Gradient | Educational Theme |

## 🗄️ Base de Datos

### Diagrama ER (Entidad-Relación)

```
┌─────────────┐       ┌──────────────┐       ┌─────────────┐
│    Sede     │       │   Ambiente   │       │  Programa   │
├─────────────┤       ├──────────────┤       ├─────────────┤
│ sede_id (PK)│───┐   │ amb_id (PK)  │   ┌───│ prog_id (PK)│
│ sede_nombre │   └──→│ sede_id (FK) │   │   │ titpro_id   │
│ sede_ciudad │       │ amb_nombre   │   │   │ prog_nombre │
└─────────────┘       │ amb_capacidad│   │   └─────────────┘
                      └──────────────┘   │
                                         │
┌──────────────┐      ┌─────────────┐   │   ┌──────────────┐
│  Instructor  │      │    Ficha    │   │   │ Competencia  │
├──────────────┤      ├─────────────┤   │   ├──────────────┤
│ inst_id (PK) │      │ fich_id (PK)│───┘   │ comp_id (PK) │
│ inst_nombres │      │ prog_id (FK)│       │ comp_codigo  │
│ inst_email   │      │ fich_jornada│       │ comp_nombre  │
└──────────────┘      └─────────────┘       └──────────────┘
       │                     │                      │
       │                     │                      │
       │              ┌──────┴──────┐              │
       │              │             │              │
       └─────────────→│ Asignacion  │←─────────────┘
                      ├─────────────┤
                      │ asig_id (PK)│
                      │ inst_id (FK)│
                      │ fich_id (FK)│
                      │ amb_id (FK) │
                      │ comp_id (FK)│
                      └─────────────┘
                             │
                             │
                      ┌──────┴──────────┐
                      │ DetalleAsignac  │
                      ├─────────────────┤
                      │ detasig_id (PK) │
                      │ asig_id (FK)    │
                      │ hora_inicio     │
                      │ hora_fin        │
                      └─────────────────┘
```

### Tablas Principales

- **sede**: Sedes del SENA
- **ambiente**: Ambientes de formación
- **programa**: Programas de formación
- **titulo_programa**: Títulos que otorgan los programas
- **competencia**: Competencias laborales
- **competencia_programa**: Relación competencias-programas
- **instructor**: Instructores del SENA
- **ficha**: Fichas de formación (grupos)
- **asignacion**: Asignaciones instructor-ficha-ambiente-competencia
- **detalle_asignacion**: Horarios de las sesiones

## 📸 Capturas de Pantalla

### Vista de Sedes
![Sedes](docs/screenshots/sedes.png)

### Vista de Instructores
![Instructores](docs/screenshots/instructores.png)

### Vista de Asignaciones
![Asignaciones](docs/screenshots/asignaciones.png)

## 🤝 Contribuir

Las contribuciones son bienvenidas. Para contribuir:

1. Fork el proyecto
2. Crea una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abre un Pull Request

### Guía de Estilo

- Usar nombres de variables en español
- Seguir el patrón MVC establecido
- Mantener la consistencia en los diseños
- Documentar funciones complejas
- Usar colores SENA en nuevos módulos

## 📝 Licencia

Este proyecto está bajo la Licencia MIT. Ver el archivo `LICENSE` para más detalles.

## 👥 Autores

- **Desarrollador Principal** - [chaustrexp](https://github.com/chaustrexp)

## 🙏 Agradecimientos

- SENA - Servicio Nacional de Aprendizaje
- Tailwind CSS por el framework CSS
- Google Fonts por las tipografías
- Material Design por los iconos

## 📞 Contacto

Para preguntas o sugerencias, por favor abre un issue en el repositorio.

---

⭐ Si este proyecto te fue útil, considera darle una estrella en GitHub!

**Desarrollado con ❤️ para el SENA**
