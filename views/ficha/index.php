<?php
// Módulo de Ficha - En desarrollo
require_once 'Conexion.php';
verificar_sesion();

$titulo = 'Ficha';
$titulo_pagina = 'Gestión de Fichas';
$action = 'ficha';

include 'views/layout/header.php';
?>

<div class="card">
    <div class="card-header">
        <h2>Gestión de Fichas</h2>
    </div>
    <div style="padding: 50px; text-align: center;">
        <h3>🚧 Módulo en Desarrollo</h3>
        <p>Esta funcionalidad estará disponible próximamente.</p>
    </div>
</div>

<?php include 'views/layout/footer.php'; ?>
