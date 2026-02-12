<?php
require_once 'model/HistoriaUsuario.php';

$titulo = 'Ver Historia - Ambiente';
$titulo_pagina = 'Detalle de Historia de Usuario';
$action = 'ambiente_ver';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$historiaModel = new HistoriaUsuario($conn);

if ($id > 0) {
    $historia = $historiaModel->obtenerPorId($id);
    
    if (!$historia) {
        header("Location: index.php?action=ambiente");
        exit();
    }
} else {
    header("Location: index.php?action=ambiente");
    exit();
}

$criterios = explode("\n", $historia['criterios_aceptacion']);

include 'views/layout/header.php';
?>

<div class="card">
    <div class="card-header">
        <h2>Historia #<?php echo $historia['id']; ?></h2>
        <div style="display: flex; gap: 10px;">
            <a href="index.php?action=ambiente_editar&id=<?php echo $id; ?>" class="btn btn-success">✏️ Editar</a>
            <a href="index.php?action=ambiente" class="btn btn-secondary">← Volver</a>
        </div>
    </div>

    <div class="detalle-grupo">
        <h3>📋 Información General</h3>
        <p><strong>ID:</strong> <?php echo $historia['id']; ?></p>
        <p><strong>Fecha de Creación:</strong> <?php echo date('d/m/Y H:i', strtotime($historia['fecha_creacion'])); ?></p>
    </div>

    <div class="detalle-grupo">
        <h3>👤 Rol</h3>
        <p><?php echo htmlspecialchars($historia['rol']); ?></p>
    </div>

    <div class="detalle-grupo">
        <h3>⚙️ Funcionalidad</h3>
        <p><?php echo htmlspecialchars($historia['funcionalidad']); ?></p>
    </div>

    <div class="detalle-grupo">
        <h3>📝 Descripción</h3>
        <p><?php echo nl2br(htmlspecialchars($historia['descripcion'])); ?></p>
    </div>

    <div class="detalle-grupo">
        <h3>✅ Criterios de Aceptación</h3>
        <ul class="criterios-lista">
            <?php foreach ($criterios as $criterio): ?>
                <?php if (trim($criterio)): ?>
                    <li><?php echo htmlspecialchars($criterio); ?></li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="detalle-grupo">
        <h3>🎯 Prioridad</h3>
        <p>
            <span class="badge badge-<?php echo strtolower($historia['prioridad']); ?>">
                <?php echo $historia['prioridad']; ?>
            </span>
        </p>
    </div>

    <div class="detalle-grupo">
        <h3>📊 Estado</h3>
        <p>
            <span class="badge badge-<?php echo strtolower($historia['estado']); ?>">
                <?php echo $historia['estado']; ?>
            </span>
        </p>
    </div>
</div>

<?php include 'views/layout/footer.php'; ?>
