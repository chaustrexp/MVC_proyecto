<?php
require_once '../../modelo/CompetenciaModel.php';

$id = $_GET['id'];
$competencia = Competencia::searchById($id);

if(isset($_POST['eliminar'])){
    Competencia::delete($id);
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html class="light" lang="es">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Ver Competencia - SENA</title>
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
            <h1 class="text-xl font-semibold text-white">Detalle de Competencia</h1>
        </div>
    </div>
</header>

<main class="p-4 pb-32 space-y-4">
    <!-- Card Principal -->
    <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-primary/10 overflow-hidden">
        <div class="p-5">
            <div class="flex justify-between items-start mb-3">
                <span class="text-[10px] font-bold tracking-wider text-primary dark:text-primary/80 uppercase px-2 py-0.5 bg-primary/10 rounded">
                    CÓDIGO: <?= $competencia->getCompNombreCorto() ?>
                </span>
                <span class="text-xs font-semibold text-slate-500 dark:text-slate-400">
                    ID: <?= $competencia->getCompId() ?>
                </span>
            </div>
            
            <h3 class="text-base font-semibold text-slate-800 dark:text-white leading-snug mb-4">
                <?= $competencia->getCompNombreUnidadCompetencia() ?>
            </h3>
            
            <div class="pt-4 border-t border-slate-50 dark:border-slate-700 space-y-3">
                <div>
                    <span class="text-xs uppercase font-bold text-slate-400 block mb-1">Horas Asignadas</span>
                    <div class="flex items-center gap-2">
                        <span class="material-icons text-primary text-lg">schedule</span>
                        <span class="text-lg font-bold text-slate-800 dark:text-white"><?= $competencia->getCompHoras() ?> horas</span>
                    </div>
                </div>
                
                <div>
                    <span class="text-xs uppercase font-bold text-slate-400 block mb-1">Código</span>
                    <span class="text-base font-semibold text-slate-800 dark:text-white"><?= $competencia->getCompNombreCorto() ?></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Botones de Acción -->
    <div class="space-y-3">
        <a 
            href="editar.php?id=<?= $competencia->getCompId() ?>"
            class="block w-full bg-primary text-white py-3 rounded-xl font-semibold text-center shadow-lg shadow-primary/30 active:scale-95 transition-transform"
        >
            Editar Competencia
        </a>
        
        <a 
            href="index.php"
            class="block w-full bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 py-3 rounded-xl font-semibold text-center active:scale-95 transition-transform"
        >
            Volver al Listado
        </a>
        
        <form method="POST" onsubmit="return confirm('¿Está seguro de eliminar esta competencia?')">
            <button 
                type="submit" 
                name="eliminar"
                class="w-full bg-red-500 text-white py-3 rounded-xl font-semibold shadow-lg shadow-red-500/30 active:scale-95 transition-transform"
            >
                Eliminar Competencia
            </button>
        </form>
    </div>
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
