<?php
// Módulo de Competencia Programa - En desarrollo
require_once 'Conexion.php';
verificar_sesion();

$titulo = 'Competencia Programa';
$titulo_pagina = 'Gestión de Competencia por Programa';
$action = 'competencia_programa';

include 'views/layout/header.php';
?>

<div class="card">
    <div class="card-header">
        <h2>Competencia por Programa</h2>
    </div>
    <div style="padding: 50px; text-align: center;">
        <h3>🚧 Módulo en Desarrollo</h3>
        <p>Esta funcionalidad estará disponible próximamente.</p>
    </div>
</div>

<?php include 'views/layout/footer.php'; ?>
