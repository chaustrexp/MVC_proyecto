<?php
// Módulo de Título Programa - En desarrollo
require_once 'Conexion.php';
verificar_sesion();

$titulo = 'Título Programa';
$titulo_pagina = 'Gestión de Títulos de Programa';
$action = 'titulo_programa';

include 'views/layout/header.php';
?>

<div class="card">
    <div class="card-header">
        <h2>Títulos de Programa</h2>
    </div>
    <div style="padding: 50px; text-align: center;">
        <h3>🚧 Módulo en Desarrollo</h3>
        <p>Esta funcionalidad estará disponible próximamente.</p>
    </div>
</div>

<?php include 'views/layout/footer.php'; ?>
