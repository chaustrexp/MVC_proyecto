<?php
require_once '../../modelo/CompetenciaModel.php';

$id = $_GET['id'];
$competencia = Competencia::searchById($id);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $competencia->setCompNombreCorto($_POST['comp_nombre_corto']);
    $competencia->setCompHoras($_POST['comp_horas']);
    $competencia->setCompNombreUnidadCompetencia($_POST['comp_nombre_unidad_competencia']);
    Competencia::update($competencia);
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html class="light" lang="es">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Editar Competencia - SENA</title>
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
                    "secondary-green": "#007832",
                    "background-light": "#f6f8f5",
                    "background-dark": "#16230f",
                },
                fontFamily: {
                    "display": ["Lexend"]
                },
            },
        },
    }
</script>
<style>
    body {
        font-family: 'Lexend', sans-serif;
        -webkit-tap-highlight-color: transparent;
    }
    .ios-blur {
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
    }
</style>
</head>
<body class="bg-background-light dark:bg-background-dark text-slate-800 dark:text-slate-100 font-display min-h-screen pb-24">
<header class="sticky top-0 z-50 bg-primary dark:bg-primary shadow-md">
    <div class="px-4 py-3 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <a href="index.php" class="text-white hover:bg-white/10 p-1 rounded-full transition-colors">
                <span class="material-icons text-2xl">arrow_back</span>
            </a>
            <h1 class="text-xl font-semibold text-white">Editar Competencia</h1>
        </div>
    </div>
</header>

<main class="p-4 pb-32">
    <form method="POST" class="space-y-4">
        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-primary/10 p-5">
            <div class="flex items-center gap-2 mb-4 pb-4 border-b border-slate-100 dark:border-slate-700">
                <span class="text-[10px] font-bold tracking-wider text-primary uppercase px-2 py-0.5 bg-primary/10 rounded">
                    ID: <?= $competencia->getCompId() ?>
                </span>
            </div>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
                        Nombre Corto / Código
                    </label>
                    <input 
                        type="text" 
                        name="comp_nombre_corto" 
                        value="<?= $competencia->getCompNombreCorto() ?>"
                        required
                        class="w-full bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 rounded-xl py-2.5 px-4 text-sm focus:ring-2 focus:ring-primary/50 focus:border-primary outline-none transition-all"
                    />
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
                        Horas
                    </label>
                    <input 
                        type="number" 
                        name="comp_horas" 
                        value="<?= $competencia->getCompHoras() ?>"
                        required
                        class="w-full bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 rounded-xl py-2.5 px-4 text-sm focus:ring-2 focus:ring-primary/50 focus:border-primary outline-none transition-all"
                    />
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
                        Unidad de Competencia
                    </label>
                    <textarea 
                        name="comp_nombre_unidad_competencia" 
                        required
                        rows="4"
                        class="w-full bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 rounded-xl py-2.5 px-4 text-sm focus:ring-2 focus:ring-primary/50 focus:border-primary outline-none transition-all resize-none"
                    ><?= $competencia->getCompNombreUnidadCompetencia() ?></textarea>
                </div>
            </div>
        </div>

        <div class="flex gap-3">
            <button 
                type="submit"
                class="flex-1 bg-primary text-white py-3 rounded-xl font-semibold shadow-lg shadow-primary/30 active:scale-95 transition-transform"
            >
                Actualizar
            </button>
            <a 
                href="index.php"
                class="flex-1 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 py-3 rounded-xl font-semibold text-center active:scale-95 transition-transform"
            >
                Cancelar
            </a>
        </div>
    </form>
</main>

<nav class="fixed bottom-0 left-0 right-0 bg-white/80 dark:bg-slate-900/80 ios-blur border-t border-slate-200 dark:border-slate-800 px-6 py-2 flex justify-between items-center z-50">
    <a class="flex flex-col items-center gap-1 text-slate-400" href="#">
        <span class="material-icons">dashboard</span>
        <span class="text-[10px] font-medium">Inicio</span>
    </a>
    <a class="flex flex-col items-center gap-1 text-primary" href="index.php">
        <span class="material-icons">assignment_turned_in</span>
        <span class="text-[10px] font-medium">Competencias</span>
    </a>
    <a class="flex flex-col items-center gap-1 text-slate-400" href="#">
        <span class="material-icons">calendar_today</span>
        <span class="text-[10px] font-medium">Horario</span>
    </a>
    <a class="flex flex-col items-center gap-1 text-slate-400" href="#">
        <span class="material-icons">person</span>
        <span class="text-[10px] font-medium">Perfil</span>
    </a>
</nav>
</body>
</html>
