<?php
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = limpiar_dato($_POST['usuario']);
    $password = limpiar_dato($_POST['password']);
    
    $stmt = mysqli_prepare($conn, "SELECT id, usuario, nombre FROM usuarios WHERE usuario = ? AND password = ?");
    mysqli_stmt_bind_param($stmt, "ss", $usuario, $password);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    
    if (mysqli_num_rows($resultado) == 1) {
        $user = mysqli_fetch_assoc($resultado);
        $_SESSION['usuario_id'] = $user['id'];
        $_SESSION['usuario_nombre'] = $user['nombre'];
        $_SESSION['usuario_user'] = $user['usuario'];
        header("Location: index.php?action=dashboard");
        exit();
    } else {
        $error = 'Usuario o contraseña incorrectos';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Gestión Ágil SENA</title>
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body>
    <div class="login-wrapper">
        <!-- Panel Izquierdo -->
        <div class="login-left">
            <div class="login-brand">
                <div class="brand-icon">
                    <svg width="80" height="80" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="50" cy="50" r="45" fill="white" opacity="0.2"/>
                        <path d="M50 20L70 35V65L50 80L30 65V35L50 20Z" fill="white"/>
                        <path d="M50 35L60 42V58L50 65L40 58V42L50 35Z" fill="#39A900"/>
                    </svg>
                </div>
                <h1>Gestión Ágil</h1>
                <p class="brand-subtitle">Sistema de Gestión de Historias de Usuario</p>
            </div>
            
            <div class="login-features">
                <div class="feature-item">
                    <span class="feature-icon">✓</span>
                    <span>Gestión de Ambiente</span>
                </div>
                <div class="feature-item">
                    <span class="feature-icon">✓</span>
                    <span>Control de Competencias</span>
                </div>
                <div class="feature-item">
                    <span class="feature-icon">✓</span>
                    <span>Seguimiento de Proyectos</span>
                </div>
                <div class="feature-item">
                    <span class="feature-icon">✓</span>
                    <span>Reportes en Tiempo Real</span>
                </div>
            </div>
            
            <div class="login-footer">
                <p>SENA - Servicio Nacional de Aprendizaje</p>
                <p class="year">© 2026 - Todos los derechos reservados</p>
            </div>
        </div>
        
        <!-- Panel Derecho -->
        <div class="login-right">
            <div class="login-form-container">
                <div class="login-header">
                    <h2>Bienvenido</h2>
                    <p>Ingresa tus credenciales para continuar</p>
                </div>
                
                <?php if ($error): ?>
                    <div class="alert alert-error">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>
                
                <form method="POST" action="" class="login-form">
                    <div class="form-group-login">
                        <label for="usuario">
                            <svg width="18" height="18" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                            </svg>
                            Usuario
                        </label>
                        <input type="text" id="usuario" name="usuario" placeholder="Ingresa tu usuario" required autofocus>
                    </div>
                    
                    <div class="form-group-login">
                        <label for="password">
                            <svg width="18" height="18" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                            </svg>
                            Contraseña
                        </label>
                        <input type="password" id="password" name="password" placeholder="Ingresa tu contraseña" required>
                    </div>
                    
                    <div class="form-options">
                        <label class="checkbox-label">
                            <input type="checkbox" name="remember">
                            <span>Recordarme</span>
                        </label>
                        <a href="#" class="forgot-link">¿Olvidaste tu contraseña?</a>
                    </div>
                    
                    <button type="submit" class="btn-login">
                        <span>Iniciar Sesión</span>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </form>
                
                <div class="login-demo">
                    <div class="demo-badge">
                        <svg width="16" height="16" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                        </svg>
                        <span>Credenciales de prueba</span>
                    </div>
                    <div class="demo-credentials">
                        <div class="demo-item">
                            <strong>Usuario:</strong> admin
                        </div>
                        <div class="demo-item">
                            <strong>Contraseña:</strong> admin123
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
