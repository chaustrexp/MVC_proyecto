<?php
require_once 'model/HistoriaUsuario.php';

$titulo = 'Dashboard';
$titulo_pagina = 'Panel de Control';
$action = 'dashboard';

$historiaModel = new HistoriaUsuario($conn);

// Obtener estadísticas
$total_historias = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM historias_usuario"))['total'];
$pendientes = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM historias_usuario WHERE estado = 'Pendiente'"))['total'];
$proceso = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM historias_usuario WHERE estado = 'Proceso'"))['total'];
$completadas = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM historias_usuario WHERE estado = 'Completado'"))['total'];

$alta_prioridad = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM historias_usuario WHERE prioridad = 'Alta'"))['total'];
$media_prioridad = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM historias_usuario WHERE prioridad = 'Media'"))['total'];
$baja_prioridad = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM historias_usuario WHERE prioridad = 'Baja'"))['total'];

// Últimas historias
$ultimas_historias = mysqli_query($conn, "SELECT * FROM historias_usuario ORDER BY fecha_creacion DESC LIMIT 5");

include 'views/layout/header.php';
?>

<div class="dashboard-welcome">
    <div class="welcome-content">
        <h2>¡Bienvenido, <?php echo $_SESSION['usuario_nombre']; ?>! 👋</h2>
        <p>Este es tu panel de control del Sistema de Gestión Ágil</p>
    </div>
    <div class="welcome-date">
        <span><?php echo strftime('%A, %d de %B de %Y'); ?></span>
    </div>
</div>

<!-- Tarjetas de Estadísticas -->
<div class="stats-grid">
    <div class="stat-card stat-total">
        <div class="stat-icon">📊</div>
        <div class="stat-info">
            <h3><?php echo $total_historias; ?></h3>
            <p>Total Historias</p>
        </div>
    </div>
    
    <div class="stat-card stat-pendiente">
        <div class="stat-icon">⏳</div>
        <div class="stat-info">
            <h3><?php echo $pendientes; ?></h3>
            <p>Pendientes</p>
        </div>
    </div>
    
    <div class="stat-card stat-proceso">
        <div class="stat-icon">⚙️</div>
        <div class="stat-info">
            <h3><?php echo $proceso; ?></h3>
            <p>En Proceso</p>
        </div>
    </div>
    
    <div class="stat-card stat-completado">
        <div class="stat-icon">✅</div>
        <div class="stat-info">
            <h3><?php echo $completadas; ?></h3>
            <p>Completadas</p>
        </div>
    </div>
</div>

<!-- Gráficos y Resumen -->
<div class="dashboard-grid">
    <!-- Prioridades -->
    <div class="card dashboard-card">
        <div class="card-header">
            <h2>📈 Distribución por Prioridad</h2>
        </div>
        <div class="priority-chart">
            <div class="priority-item">
                <div class="priority-label">
                    <span class="badge badge-alta">Alta</span>
                    <span class="priority-count"><?php echo $alta_prioridad; ?></span>
                </div>
                <div class="priority-bar">
                    <div class="priority-fill alta" style="width: <?php echo $total_historias > 0 ? ($alta_prioridad / $total_historias * 100) : 0; ?>%"></div>
                </div>
            </div>
            
            <div class="priority-item">
                <div class="priority-label">
                    <span class="badge badge-media">Media</span>
                    <span class="priority-count"><?php echo $media_prioridad; ?></span>
                </div>
                <div class="priority-bar">
                    <div class="priority-fill media" style="width: <?php echo $total_historias > 0 ? ($media_prioridad / $total_historias * 100) : 0; ?>%"></div>
                </div>
            </div>
            
            <div class="priority-item">
                <div class="priority-label">
                    <span class="badge badge-baja">Baja</span>
                    <span class="priority-count"><?php echo $baja_prioridad; ?></span>
                </div>
                <div class="priority-bar">
                    <div class="priority-fill baja" style="width: <?php echo $total_historias > 0 ? ($baja_prioridad / $total_historias * 100) : 0; ?>%"></div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Progreso General -->
    <div class="card dashboard-card">
        <div class="card-header">
            <h2>🎯 Progreso General</h2>
        </div>
        <div class="progress-container">
            <div class="progress-circle">
                <svg width="200" height="200" viewBox="0 0 200 200">
                    <circle cx="100" cy="100" r="80" fill="none" stroke="#e0e0e0" stroke-width="20"/>
                    <circle cx="100" cy="100" r="80" fill="none" stroke="#39A900" stroke-width="20" 
                            stroke-dasharray="<?php echo $total_historias > 0 ? ($completadas / $total_historias * 502.4) : 0; ?> 502.4" 
                            stroke-linecap="round" transform="rotate(-90 100 100)"/>
                    <text x="100" y="100" text-anchor="middle" dy="7" font-size="32" font-weight="bold" fill="#39A900">
                        <?php echo $total_historias > 0 ? round($completadas / $total_historias * 100) : 0; ?>%
                    </text>
                </svg>
            </div>
            <p class="progress-label">Historias Completadas</p>
        </div>
    </div>
</div>

<!-- Últimas Historias -->
<div class="card">
    <div class="card-header">
        <h2>📋 Últimas Historias Registradas</h2>
        <a href="index.php?action=ambiente" class="btn btn-secondary btn-sm">Ver Todas</a>
    </div>
    
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Rol</th>
                    <th>Funcionalidad</th>
                    <th>Prioridad</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($ultimas_historias) > 0): ?>
                    <?php while ($historia = mysqli_fetch_assoc($ultimas_historias)): ?>
                        <tr>
                            <td><?php echo $historia['id']; ?></td>
                            <td><?php echo htmlspecialchars($historia['rol']); ?></td>
                            <td><?php echo htmlspecialchars($historia['funcionalidad']); ?></td>
                            <td>
                                <span class="badge badge-<?php echo strtolower($historia['prioridad']); ?>">
                                    <?php echo $historia['prioridad']; ?>
                                </span>
                            </td>
                            <td>
                                <span class="badge badge-<?php echo strtolower($historia['estado']); ?>">
                                    <?php echo $historia['estado']; ?>
                                </span>
                            </td>
                            <td><?php echo date('d/m/Y', strtotime($historia['fecha_creacion'])); ?></td>
                            <td>
                                <div class="acciones">
                                    <a href="index.php?action=ambiente_ver&id=<?php echo $historia['id']; ?>" class="btn btn-primary btn-sm">Ver</a>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" style="text-align: center; padding: 30px;">
                            No hay historias registradas aún.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Accesos Rápidos -->
<div class="quick-actions">
    <h3>⚡ Accesos Rápidos</h3>
    <div class="quick-actions-grid">
        <a href="index.php?action=ambiente_crear" class="quick-action-card">
            <div class="quick-icon">➕</div>
            <span>Nueva Historia Ambiente</span>
        </a>
        <a href="index.php?action=competencia_crear" class="quick-action-card">
            <div class="quick-icon">📝</div>
            <span>Nueva Historia Competencia</span>
        </a>
        <a href="index.php?action=ambiente" class="quick-action-card">
            <div class="quick-icon">📊</div>
            <span>Ver Ambiente</span>
        </a>
        <a href="index.php?action=competencia" class="quick-action-card">
            <div class="quick-icon">📚</div>
            <span>Ver Competencia</span>
        </a>
    </div>
</div>

<?php include 'views/layout/footer.php'; ?>
