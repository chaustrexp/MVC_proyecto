<?php
require_once 'Conexion.php';

// Obtener la acción solicitada
$action = isset($_GET['action']) ? $_GET['action'] : 'login';

// Si ya está logueado y trata de ir a login, redirigir al dashboard
if ($action == 'login' && isset($_SESSION['usuario_id'])) {
    $action = 'dashboard';
}

// Enrutamiento simple
switch ($action) {
    case 'login':
        require_once 'views/layout/login.php';
        break;
    
    case 'logout':
        session_destroy();
        header("Location: index.php?action=login");
        exit();
        break;
    
    case 'dashboard':
        verificar_sesion();
        require_once 'views/dashboard/index.php';
        break;
    
    case 'ambiente':
        verificar_sesion();
        require_once 'views/ambiente/index.php';
        break;
    
    case 'ambiente_crear':
        verificar_sesion();
        require_once 'views/ambiente/crear.php';
        break;
    
    case 'ambiente_editar':
        verificar_sesion();
        require_once 'views/ambiente/editar.php';
        break;
    
    case 'ambiente_ver':
        verificar_sesion();
        require_once 'views/ambiente/ver.php';
        break;
    
    case 'competencia':
        verificar_sesion();
        require_once 'views/competencia/index.php';
        break;
    
    case 'competencia_crear':
        verificar_sesion();
        require_once 'views/competencia/crear.php';
        break;
    
    case 'competencia_editar':
        verificar_sesion();
        require_once 'views/competencia/editar.php';
        break;
    
    case 'competencia_ver':
        verificar_sesion();
        require_once 'views/competencia/ver.php';
        break;
    
    // Módulo Asignación
    case 'asignacion':
        verificar_sesion();
        require_once 'views/asignacion/index.php';
        break;
    
    // Módulo Calendario
    case 'calendario':
        verificar_sesion();
        require_once 'views/calendario/index.php';
        break;
    
    // Módulo Competencia Programa
    case 'competencia_programa':
        verificar_sesion();
        require_once 'views/competencia_programa/index.php';
        break;
    
    // Módulo Detalle Asignación
    case 'detalle_asignacion':
        verificar_sesion();
        require_once 'views/detalle_asignacion/index.php';
        break;
    
    // Módulo Ficha
    case 'ficha':
        verificar_sesion();
        require_once 'views/ficha/index.php';
        break;
    
    // Módulo Instructor
    case 'instructor':
        verificar_sesion();
        require_once 'views/instructor/index.php';
        break;
    
    // Módulo Programa
    case 'programa':
        verificar_sesion();
        require_once 'views/programa/index.php';
        break;
    
    // Módulo Sede
    case 'sede':
        verificar_sesion();
        require_once 'views/sede/index.php';
        break;
    
    // Módulo Título Programa
    case 'titulo_programa':
        verificar_sesion();
        require_once 'views/titulo_programa/index.php';
        break;
    
    default:
        require_once 'views/layout/login.php';
        break;
}
?>
