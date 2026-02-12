<?php
// Módulo de Asignación - En desarrollo
require_once 'Conexion.php';
verificar_sesion();

$titulo = 'Asignación';
$titulo_pagina = 'Gestión de Asignaciones';
$action = 'asignacion';

include 'views/layout/header.php';
?>

<div class="card">
    <div class="card-header">
        <h2>Módulo de Asignación</h2>
    </div>
    <div style="padding: 50px; text-align: center;">
        <h3>🚧 Módulo en Desarrollo</h3>
        <p>Esta funcionalidad estará disponible próximamente.</p>
    </div>
</div>

<?php include 'views/layout/footer.php'; ?>
