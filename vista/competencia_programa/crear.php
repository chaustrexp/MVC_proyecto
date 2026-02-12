<?php
require_once '../../modelo/CompetenciaPrograModel.php';
require_once '../../modelo/ProgramaModel.php';
require_once '../../modelo/CompetenciaModel.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $cp = new CompetenciaPrograma($_POST['prog_id'], $_POST['comp_id']);
    CompetenciaPrograma::save($cp);
    header('Location: index.php');
    exit;
}

$programas = Programa::all();
$competencias = Competencia::all();
?>
<!DOCTYPE html>
<html class="light" lang="es">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/>
<title>Asignar Competencia - SENA</title>
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
        <h1 class="text-lg font-semibold">Asignar Competencia</h1>
    </div>
</header>

<main class="p-4 space-y-4 pb-24">
    <form method="POST" class="space-y-4">
        <section class="bg-surface-light dark:bg-surface-dark p-4 rounded-xl shadow-sm border border-border-light dark:border-border-dark">
            <label class="block text-xs font-semibold text-primary uppercase tracking-wider mb-2">
                Programa de Formación
            </label>
            <div class="relative group">
                <select 
                    name="prog_id" 
                    required
                    class="w-full bg-background-light dark:bg-background-dark border-border-light dark:border-border-dark rounded-lg py-3 px-4 appearance-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none"
                >
                    <option value="">Seleccione un programa...</option>
                    <?php foreach($programas as $programa): ?>
                    <option value="<?= $programa->getProgCodigo() ?>"><?= $programa->getProgDenominacion() ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-primary">
                    <span class="material-icons">expand_more</span>
                </div>
            </div>
        </section>

        <section class="bg-surface-light dark:bg-surface-dark p-4 rounded-xl shadow-sm border border-border-light dark:border-border-dark">
            <label class="block text-xs font-semibold text-primary uppercase tracking-wider mb-2">
                Competencia
            </label>
            <div class="relative group">
                <select 
                    name="comp_id" 
                    required
                    class="w-full bg-background-light dark:bg-background-dark border-border-light dark:border-border-dark rounded-lg py-3 px-4 appearance-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none"
                >
                    <option value="">Seleccione una competencia...</option>
                    <?php foreach($competencias as $competencia): ?>
                    <option value="<?= $competencia->getCompId() ?>">
                        <?= $competencia->getCompNombreCorto() ?> - <?= $competencia->getCompNombreUnidadCompetencia() ?>
                    </option>
                    <?php endforeach; ?>
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-primary">
                    <span class="material-icons">expand_more</span>
                </div>
            </div>
        </section>

        <div class="flex gap-3">
            <button 
                type="submit"
                class="flex-1 bg-primary text-white py-3.5 rounded-xl font-semibold shadow-lg active:scale-95 transition-transform"
            >
                Asignar
            </button>
            <a 
                href="index.php"
                class="flex-1 bg-surface-light dark:bg-surface-dark border border-border-light dark:border-border-dark text-slate-600 dark:text-slate-300 py-3.5 rounded-xl font-semibold text-center active:scale-95 transition-transform"
            >
                Cancelar
            </a>
        </div>
    </form>
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
