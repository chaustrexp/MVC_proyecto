<?php
require_once '../../modelo/AmbienteModel.php';
require_once '../../modelo/SedeModel.php';

$id = $_GET['id'];
$ambiente = Ambiente::searchById($id);
$sede = Sede::searchById($ambiente->getSedeId());

if(isset($_POST['eliminar'])){
    Ambiente::delete($id);
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html class="light" lang="es">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/>
<title>Ver Ambiente - SENA</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet"/>
<script id="tailwind-config">
    tailwind.config = {
        darkMode: "class",
        theme: {
            extend: {
                colors: {
                    "primary": "#27a800",
                    "background-light": "#f6f8f5",
                    "background-dark": "#14230f",
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
</style>
</head>
<body class="bg-background-light dark:bg-background-dark text-slate-800 dark:text-slate-200 font-display min-h-screen pb-24">
<div class="h-12 bg-primary w-full sticky top-0 z-50"></div>

<header class="bg-primary text-white sticky top-12 z-40 px-5 py-4 shadow-md rounded-b-xl">
    <div class="flex items-center gap-3">
        <a href="index.php" class="bg-white/20 p-2 rounded-full backdrop-blur-sm">
            <span class="material-icons-round">arrow_back</span>
        </a>
        <h1 class="text-xl font-bold tracking-tight">Detalle del Ambiente</h1>
    </div>
</header>

<main class="mt-6 px-5 pb-32 space-y-6">
    <!-- Card Principal -->
    <div class="bg-white dark:bg-background-dark/50 border border-primary/5 dark:border-primary/20 rounded-xl p-5 shadow-sm">
        <div class="flex items-start gap-4 mb-6">
            <div class="bg-primary/10 p-4 rounded-2xl">
                <span class="material-icons-round text-primary text-4xl">meeting_room</span>
            </div>
            <div class="flex-1">
                <h2 class="text-2xl font-bold text-slate-800 dark:text-white mb-1"><?= $ambiente->getAmbNombre() ?></h2>
                <p class="text-sm text-slate-500 dark:text-slate-400 font-medium">CÓDIGO: #<?= $ambiente->getAmbId() ?></p>
            </div>
        </div>

        <div class="space-y-4 pt-4 border-t border-slate-100 dark:border-primary/10">
            <div>
                <span class="text-xs uppercase font-bold text-slate-400 block mb-1">Identificador</span>
                <span class="text-lg font-semibold text-slate-800 dark:text-white">#<?= $ambiente->getAmbId() ?></span>
            </div>
            
            <div>
                <span class="text-xs uppercase font-bold text-slate-400 block mb-1">Nombre del Ambiente</span>
                <span class="text-lg font-semibold text-slate-800 dark:text-white"><?= $ambiente->getAmbNombre() ?></span>
            </div>
            
            <div>
                <span class="text-xs uppercase font-bold text-slate-400 block mb-1">Sede Asignada</span>
                <div class="flex items-center gap-2 mt-1">
                    <span class="bg-primary/10 text-primary text-xs font-bold px-3 py-1.5 rounded-lg border border-primary/20">
                        <?= $sede->getSedeNombre() ?>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Botones de Acción -->
    <div class="space-y-3">
        <a 
            href="editar.php?id=<?= $ambiente->getAmbId() ?>"
            class="block w-full bg-primary text-white py-3.5 rounded-xl font-bold text-center shadow-lg shadow-primary/30 active:scale-95 transition-transform"
        >
            Editar Ambiente
        </a>
        
        <a 
            href="index.php"
            class="block w-full bg-white dark:bg-slate-800 border border-slate-200 dark:border-primary/20 text-slate-600 dark:text-slate-300 py-3.5 rounded-xl font-bold text-center active:scale-95 transition-transform"
        >
            Volver al Listado
        </a>
        
        <form method="POST" onsubmit="return confirm('¿Está seguro de eliminar este ambiente?')">
            <button 
                type="submit" 
                name="eliminar"
                class="w-full bg-red-500 text-white py-3.5 rounded-xl font-bold shadow-lg shadow-red-500/30 active:scale-95 transition-transform"
            >
                Eliminar Ambiente
            </button>
        </form>
    </div>
</main>

<nav class="fixed bottom-0 left-0 right-0 bg-white/80 dark:bg-background-dark/80 backdrop-blur-lg border-t border-slate-200 dark:border-primary/20 px-6 py-3 pb-8 z-50">
    <div class="flex items-center justify-between max-w-md mx-auto">
        <button class="flex flex-col items-center gap-1 text-slate-400 dark:text-slate-500">
            <span class="material-icons-round text-2xl">grid_view</span>
            <span class="text-[10px] font-semibold">Dashboard</span>
        </button>
        <button class="flex flex-col items-center gap-1 text-primary">
            <span class="material-icons-round text-2xl">meeting_room</span>
            <span class="text-[10px] font-semibold">Ambientes</span>
        </button>
        <button class="flex flex-col items-center gap-1 text-slate-400 dark:text-slate-500">
            <span class="material-icons-round text-2xl">event_note</span>
            <span class="text-[10px] font-semibold">Horarios</span>
        </button>
        <button class="flex flex-col items-center gap-1 text-slate-400 dark:text-slate-500">
            <span class="material-icons-round text-2xl">person_outline</span>
            <span class="text-[10px] font-semibold">Perfil</span>
        </button>
    </div>
</nav>
</body>
</html>
