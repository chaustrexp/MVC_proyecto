<?php
require_once 'model/HistoriaUsuario.php';

$titulo = 'Editar Historia - Competencia';
$titulo_pagina = 'Editar Historia de Usuario';
$action = 'competencia_editar';

$mensaje = '';
$tipo_mensaje = '';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$historiaModel = new HistoriaUsuario($conn);

if ($id > 0) {
    $historia = $historiaModel->obtenerPorId($id);
    
    if (!$historia) {
        header("Location: index.php?action=competencia");
        exit();
    }
} else {
    header("Location: index.php?action=competencia");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $datos = [
        'rol' => limpiar_dato($_POST['rol']),
        'funcionalidad' => limpiar_dato($_POST['funcionalidad']),
        'descripcion' => limpiar_dato($_POST['descripcion']),
        'criterios' => limpiar_dato($_POST['criterios']),
        'prioridad' => limpiar_dato($_POST['prioridad']),
        'estado' => limpiar_dato($_POST['estado'])
    ];
    
    if ($historiaModel->actualizar($id, $datos)) {
        $mensaje = 'Historia actualizada exitosamente';
        $tipo_mensaje = 'success';
        $historia = $historiaModel->obtenerPorId($id);
    } else {
        $mensaje = 'Error al actualizar: ' . mysqli_error($conn);
        $tipo_mensaje = 'error';
    }
}

include 'views/layout/header.php';
?>

<div class="card">
    <div class="card-header">
        <h2>Modificar Historia #<?php echo $id; ?></h2>
        <a href="index.php?action=competencia" class="btn btn-secondary">← Volver</a>
    </div>

    <?php if ($mensaje): ?>
        <div class="alert alert-<?php echo $tipo_mensaje; ?>">
            <?php echo $mensaje; ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="form-group">
            <label for="rol">Rol del Usuario *</label>
            <input type="text" id="rol" name="rol" required value="<?php echo htmlspecialchars($historia['rol']); ?>">
        </div>

        <div class="form-group">
            <label for="funcionalidad">Funcionalidad *</label>
            <input type="text" id="funcionalidad" name="funcionalidad" required value="<?php echo htmlspecialchars($historia['funcionalidad']); ?>">
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción Completa *</label>
            <textarea id="descripcion" name="descripcion" required><?php echo htmlspecialchars($historia['descripcion']); ?></textarea>
        </div>

        <div class="form-group">
            <label for="criterios">Criterios de Aceptación *</label>
            <textarea id="criterios" name="criterios" required><?php echo htmlspecialchars($historia['criterios_aceptacion']); ?></textarea>
        </div>

        <div class="form-group">
            <label for="prioridad">Prioridad *</label>
            <select id="prioridad" name="prioridad" required>
                <option value="Alta" <?php echo $historia['prioridad'] == 'Alta' ? 'selected' : ''; ?>>Alta</option>
                <option value="Media" <?php echo $historia['prioridad'] == 'Media' ? 'selected' : ''; ?>>Media</option>
                <option value="Baja" <?php echo $historia['prioridad'] == 'Baja' ? 'selected' : ''; ?>>Baja</option>
            </select>
        </div>

        <div class="form-group">
            <label for="estado">Estado *</label>
            <select id="estado" name="estado" required>
                <option value="Pendiente" <?php echo $historia['estado'] == 'Pendiente' ? 'selected' : ''; ?>>Pendiente</option>
                <option value="Proceso" <?php echo $historia['estado'] == 'Proceso' ? 'selected' : ''; ?>>En Proceso</option>
                <option value="Completado" <?php echo $historia['estado'] == 'Completado' ? 'selected' : ''; ?>>Completado</option>
            </select>
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn btn-success">💾 Actualizar Historia</button>
            <a href="index.php?action=competencia_ver&id=<?php echo $id; ?>" class="btn btn-primary">👁️ Ver Detalle</a>
            <a href="index.php?action=competencia" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>

<?php include 'views/layout/footer.php'; ?>
