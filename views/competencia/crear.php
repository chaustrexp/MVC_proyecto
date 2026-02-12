<?php
require_once 'model/HistoriaUsuario.php';

$titulo = 'Crear Historia - Competencia';
$titulo_pagina = 'Crear Nueva Historia de Usuario';
$action = 'competencia_crear';

$mensaje = '';
$tipo_mensaje = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $datos = [
        'rol' => limpiar_dato($_POST['rol']),
        'funcionalidad' => limpiar_dato($_POST['funcionalidad']),
        'descripcion' => limpiar_dato($_POST['descripcion']),
        'criterios' => limpiar_dato($_POST['criterios']),
        'prioridad' => limpiar_dato($_POST['prioridad']),
        'estado' => limpiar_dato($_POST['estado'])
    ];
    
    $historiaModel = new HistoriaUsuario($conn);
    
    if ($historiaModel->crear($datos)) {
        $mensaje = 'Historia de usuario creada exitosamente';
        $tipo_mensaje = 'success';
        $_POST = array();
    } else {
        $mensaje = 'Error al crear la historia: ' . mysqli_error($conn);
        $tipo_mensaje = 'error';
    }
}

include 'views/layout/header.php';
?>

<div class="card">
    <div class="card-header">
        <h2>Formulario de Historia de Usuario</h2>
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
            <input type="text" id="rol" name="rol" required 
                   placeholder="Ej: Administrador, Cliente, Usuario final"
                   value="<?php echo isset($_POST['rol']) ? htmlspecialchars($_POST['rol']) : ''; ?>">
        </div>

        <div class="form-group">
            <label for="funcionalidad">Funcionalidad *</label>
            <input type="text" id="funcionalidad" name="funcionalidad" required 
                   placeholder="Ej: Gestionar productos, Realizar compras"
                   value="<?php echo isset($_POST['funcionalidad']) ? htmlspecialchars($_POST['funcionalidad']) : ''; ?>">
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción Completa *</label>
            <textarea id="descripcion" name="descripcion" required 
                      placeholder="Como [rol], quiero [funcionalidad] para [beneficio]"><?php echo isset($_POST['descripcion']) ? htmlspecialchars($_POST['descripcion']) : ''; ?></textarea>
        </div>

        <div class="form-group">
            <label for="criterios">Criterios de Aceptación *</label>
            <textarea id="criterios" name="criterios" required 
                      placeholder="Dado que... Cuando... Entonces... (Separar cada criterio con salto de línea)"><?php echo isset($_POST['criterios']) ? htmlspecialchars($_POST['criterios']) : ''; ?></textarea>
        </div>

        <div class="form-group">
            <label for="prioridad">Prioridad *</label>
            <select id="prioridad" name="prioridad" required>
                <option value="">Seleccionar...</option>
                <option value="Alta">Alta</option>
                <option value="Media">Media</option>
                <option value="Baja">Baja</option>
            </select>
        </div>

        <div class="form-group">
            <label for="estado">Estado *</label>
            <select id="estado" name="estado" required>
                <option value="">Seleccionar...</option>
                <option value="Pendiente">Pendiente</option>
                <option value="Proceso">En Proceso</option>
                <option value="Completado">Completado</option>
            </select>
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn btn-success">💾 Guardar Historia</button>
            <a href="index.php?action=competencia" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>

<?php include 'views/layout/footer.php'; ?>
