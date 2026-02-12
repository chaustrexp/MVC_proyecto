<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($titulo) ? $titulo : 'Gestión Ágil'; ?> - SENA</title>
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2>🎯 Gestión Ágil</h2>
            </div>
            <ul class="sidebar-menu">
                <li><a href="index.php?action=dashboard" class="<?php echo $action == 'dashboard' ? 'active' : ''; ?>">� Dashboard</a></li>
                <li style="margin-top: 10px; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 10px;">
                    <a href="index.php?action=ambiente" class="<?php echo ($action == 'ambiente' || strpos($action, 'ambiente_') === 0) ? 'active' : ''; ?>">🏢 Ambiente</a>
                </li>
                <li><a href="index.php?action=asignacion" class="<?php echo $action == 'asignacion' ? 'active' : ''; ?>">� Asignación</a></li>
                <li><a href="index.php?action=calendario" class="<?php echo $action == 'calendario' ? 'active' : ''; ?>">� Calendario</a></li>
                <li><a href="index.php?action=competencia" class="<?php echo ($action == 'competencia' || strpos($action, 'competencia_') === 0) ? 'active' : ''; ?>">� Competencia</a></li>
                <li><a href="index.php?action=competencia_programa" class="<?php echo $action == 'competencia_programa' ? 'active' : ''; ?>">� Competencia Programa</a></li>
                <li><a href="index.php?action=detalle_asignacion" class="<?php echo $action == 'detalle_asignacion' ? 'active' : ''; ?>">📋 Detalle Asignación</a></li>
                <li><a href="index.php?action=ficha" class="<?php echo $action == 'ficha' ? 'active' : ''; ?>">📑 Ficha</a></li>
                <li><a href="index.php?action=instructor" class="<?php echo $action == 'instructor' ? 'active' : ''; ?>">👨‍🏫 Instructor</a></li>
                <li><a href="index.php?action=programa" class="<?php echo $action == 'programa' ? 'active' : ''; ?>">� Programa</a></li>
                <li><a href="index.php?action=sede" class="<?php echo $action == 'sede' ? 'active' : ''; ?>">🏛️ Sede</a></li>
                <li><a href="index.php?action=titulo_programa" class="<?php echo $action == 'titulo_programa' ? 'active' : ''; ?>">🎖️ Título Programa</a></li>
                <li style="margin-top: 20px; border-top: 1px solid rgba(255,255,255,0.2); padding-top: 10px;">
                    <a href="index.php?action=logout">🚪 Cerrar Sesión</a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Top Bar -->
            <header class="topbar">
                <h1><?php echo isset($titulo_pagina) ? $titulo_pagina : 'Dashboard'; ?></h1>
                <div class="user-info">
                    <span>👤 <?php echo $_SESSION['usuario_nombre']; ?></span>
                    <a href="index.php?action=logout" class="btn btn-secondary btn-sm">Salir</a>
                </div>
            </header>

            <!-- Content -->
            <main class="content">
