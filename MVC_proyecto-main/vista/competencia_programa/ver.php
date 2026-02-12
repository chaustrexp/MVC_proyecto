<?php
require_once '../../modelo/CompetenciaPrograModel.php';
require_once '../../modelo/ProgramaModel.php';
require_once '../../modelo/CompetenciaModel.php';

$prog_id = $_GET['prog_id'];
$comp_id = $_GET['comp_id'];
$cp = CompetenciaPrograma::searchById($prog_id, $comp_id);
$programa = Programa::searchById($prog_id);
$competencia = Competencia::searchById($comp_id);

if(isset($_POST['eliminar'])){
    CompetenciaPrograma::delete($prog_id, $comp_id);
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html class="light" lang="es">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/>
<title>Ver Vinculación - SENA</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
<script id="tailwind-config">
    tailwind.config = {
        darkMode: "class",
        theme: {
            extend: {
                colors: {
                    "primary": "#38a800",
                    "primary-dark": "#007832",
                    "background-light": "#f6f8f5",
                    "background-dark": "#16230f",
                    "surface-light": "#ffffff",
                    "surface-dark": "#1f2e18",
                    "border-light": "#e1e8dd",
                    "border-dark": "#2d3d25",
                },
                fontFamily: {
                    "display": ["Lexend", "sans-serif"]
                },
            },
        },
    }
</script>
<style>
    body {
        -webkit-tap-highlight-color: transparent;
        font-family: 'Lexend', sans-serif;
    }
</style>
</head>
<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100 font-display min-h-screen">
<div class="bg-primary w-full sticky top-0 z-50"></div>

<header class="bg-primary text-white sticky top-0 z-50 px-4 py-3 flex items-center justify-between shadow-md">
    <div class="flex items-center gap-3">
        <a href="index.php" class="flex items-center justify-center p-1 rounded-full hover:bg-white/10 transition-colors">
            <span class="material-icons">arrow_back</span>
        </a>
        <h1 class="text-lg font-semibold">Detalle de Vinculación</h1>
    </div>
</header>

<main class="p-4 space-y-4 pb-24">
    <!-- Programa Card -->
    <section class="bg-surface-light dark:bg-surface-dark p-5 rounded-xl shadow-sm border border-border-light dark:border-border-dark">
        <label class="block text-xs font-semibold text-primary uppercase tracking-wider mb-3">
            Programa de Formación
        </label>
        <div class="flex items-start gap-3">
            <div class="bg-primary/10 dark:bg-primary/20 p-2 rounded-lg text-primary">
                <span class="material-icons">school</span>
            </div>
            <div class="flex-1">
                <h3 class="text-base font-semibold text-slate-800 dark:text-slate-100">
                    <?= $programa->getProgDenominacion() ?>
                </h3>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">
                    Código: <?= $programa->getProgCodigo() ?> | Tipo: <?= $programa->getProgTipo() ?>
                </p>
            </div>
        </div>
    </section>

    <!-- Competencia Card -->
    <section class="bg-surface-light dark:bg-surface-dark p-5 rounded-xl shadow-sm border border-border-light dark:border-border-dark">
        <label class="block text-xs font-semibold text-primary uppercase tracking-wider mb-3">
            Competencia Asignada
        </label>
        <div class="flex items-start gap-3">
            <div class="bg-primary/10 dark:bg-primary/20 p-2 rounded-lg text-primary">
                <span class="material-icons">history_edu</span>
            </div>
            <div class="flex-1">
                <span class="text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest">
                    CÓDIGO: <?= $competencia->getCompNombreCorto() ?>
                </span>
                <h3 class="text-sm font-semibold text-slate-800 dark:text-slate-100 mt-1 leading-snug">
                    <?= $competencia->getCompNombreUnidadCompetencia() ?>
                </h3>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-2">
                    Horas: <?= $competencia->getCompHoras() ?>
                </p>
            </div>
        </div>
    </section>

    <!-- Botones de Acción -->
    <div class="space-y-3">
        <a 
            href="index.php"
            class="block w-full bg-primary text-white py-3.5 rounded-xl font-semibold text-center shadow-lg active:scale-95 transition-transform"
        >
            Volver al Listado
        </a>
        
        <form method="POST" onsubmit="return confirm('¿Está seguro de eliminar esta vinculación?')">
            <button 
                type="submit" 
                name="eliminar"
                class="w-full bg-red-500 text-white py-3.5 rounded-xl font-semibold shadow-lg active:scale-95 transition-transform"
            >
                Eliminar Vinculación
            </button>
        </form>
    </div>
</main>

<nav class="fixed bottom-0 left-0 right-0 bg-surface-light dark:bg-surface-dark border-t border-border-light dark:border-border-dark px-6 py-2 pb-4 flex justify-between items-center z-50">
    <button class="flex flex-col items-center gap-1 text-primary">
        <span class="material-icons text-2xl">school</span>
        <span class="text-[10px] font-medium">Programas</span>
    </button>
    <button class="flex flex-col items-center gap-1 text-slate-400 dark:text-slate-500">
        <span class="material-icons text-2xl">assignment</span>
        <span class="text-[10px] font-medium">Proyectos</span>
    </button>
    <button class="flex flex-col items-center gap-1 text-slate-400 dark:text-slate-500">
        <span class="material-icons text-2xl">calendar_today</span>
        <span class="text-[10px] font-medium">Agenda</span>
    </button>
    <button class="flex flex-col items-center gap-1 text-slate-400 dark:text-slate-500">
        <span class="material-icons text-2xl">person</span>
        <span class="text-[10px] font-medium">Perfil</span>
    </button>
</nav>
</body>
</html>
