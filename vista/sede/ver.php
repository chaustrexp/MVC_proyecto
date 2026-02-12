<?php
require_once '../../modelo/SedeModel.php';
$id = $_GET['id'];
$sede = Sede::searchById($id);

if(isset($_POST['eliminar'])){
    Sede::delete($id);
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html class="light" lang="es">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
<script id="tailwind-config">
    tailwind.config = {
        darkMode: "class",
        theme: {
            extend: {
                colors: {
                    "primary": "#39A900",
                    "primary-dark": "#007832",
                    "background-light": "#ffffff",
                    "background-dark": "#101722",
                },
                fontFamily: {
                    "display": ["Lexend"]
                },
                borderRadius: {
                    "DEFAULT": "0.25rem",
                    "lg": "0.5rem",
                    "xl": "0.75rem",
                    "full": "9999px"
                },
            },
        },
    }
</script>
<style type="text/tailwindcss">
    :root {
        --sena-green: #39A900;
        --sena-dark-green: #007832;
    }
    body { font-family: 'Lexend', sans-serif; }
    .ios-blur { backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); }
    body {
        min-height: max(884px, 100dvh);
    }
</style>
</head>
<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100 min-h-screen flex flex-col">
<div class="h-12 w-full flex items-center justify-between px-6 bg-primary dark:bg-slate-900 sticky top-0 z-50 text-white">
    <span class="text-sm font-semibold">9:41</span>
    <div class="flex items-center space-x-2">
        <span class="material-icons text-sm">signal_cellular_alt</span>
        <span class="material-icons text-sm">wifi</span>
        <span class="material-icons text-sm">battery_full</span>
    </div>
</div>

<header class="px-4 pb-4 bg-primary dark:bg-slate-900 sticky top-12 z-40 rounded-b-[2rem] shadow-lg">
    <div class="flex items-center justify-between mb-4 pt-2">
        <div class="flex items-center space-x-3">
            <a href="index.php" class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center text-white">
                <span class="material-icons">arrow_back</span>
            </a>
            <h1 class="text-2xl font-bold tracking-tight text-white">Detalle de Sede</h1>
        </div>
    </div>
</header>

<main class="flex-1 px-4 pb-32 overflow-y-auto mt-6">
    <div class="space-y-6">
        <div class="bg-white dark:bg-slate-900 p-6 rounded-2xl shadow-sm border border-slate-100 dark:border-slate-800">
            <div class="flex items-center space-x-4 mb-6">
                <div class="w-16 h-16 rounded-2xl bg-primary/10 flex items-center justify-center text-primary-dark">
                    <span class="material-icons text-4xl">business</span>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white"><?= $sede->getSedeNombre() ?></h2>
                    <p class="text-xs font-mono font-bold text-primary-dark mt-1">ID: #<?= $sede->getSedeId() ?></p>
                </div>
            </div>

            <div class="space-y-4 pt-4 border-t border-slate-100 dark:border-slate-800">
                <div>
                    <span class="text-xs uppercase font-bold text-slate-400 block mb-1">Identificador</span>
                    <span class="text-lg font-semibold text-slate-900 dark:text-white"><?= $sede->getSedeId() ?></span>
                </div>
                <div>
                    <span class="text-xs uppercase font-bold text-slate-400 block mb-1">Nombre Completo</span>
                    <span class="text-lg font-semibold text-slate-900 dark:text-white"><?= $sede->getSedeNombre() ?></span>
                </div>
            </div>
        </div>

        <div class="flex space-x-3">
            <a 
                href="editar.php?id=<?= $sede->getSedeId() ?>"
                class="flex-1 py-3.5 bg-primary text-white text-sm font-bold rounded-xl shadow-lg shadow-primary/40 text-center"
            >
                Editar Sede
            </a>
            <a 
                href="index.php"
                class="flex-1 py-3.5 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 text-sm font-bold rounded-xl text-center"
            >
                Volver
            </a>
        </div>

        <form method="POST" onsubmit="return confirm('¿Está seguro de eliminar esta sede?')">
            <button 
                type="submit" 
                name="eliminar"
                class="w-full py-3.5 bg-red-500 text-white text-sm font-bold rounded-xl shadow-lg shadow-red-500/40"
            >
                Eliminar Sede
            </button>
        </form>
    </div>
</main>

<nav class="fixed bottom-0 left-0 right-0 bg-white/90 dark:bg-slate-950/90 ios-blur border-t border-slate-100 dark:border-slate-800 px-6 py-3 flex justify-between items-center z-50 pb-8">
    <div class="flex flex-col items-center space-y-1 text-slate-400">
        <span class="material-icons">dashboard</span>
        <span class="text-[10px] font-medium">Inicio</span>
    </div>
    <div class="flex flex-col items-center space-y-1 text-slate-400">
        <span class="material-icons">event_note</span>
        <span class="text-[10px] font-medium">Horarios</span>
    </div>
    <div class="flex flex-col items-center space-y-1 text-slate-400">
        <span class="material-icons">map</span>
        <span class="text-[10px] font-medium">Ubicaciones</span>
    </div>
    <div class="flex flex-col items-center space-y-1 text-primary-dark">
        <span class="material-icons">business</span>
        <span class="text-[10px] font-bold">Sedes</span>
    </div>
    <div class="flex flex-col items-center space-y-1 text-slate-400">
        <span class="material-icons">settings</span>
        <span class="text-[10px] font-medium">Ajustes</span>
    </div>
</nav>
<div class="fixed bottom-1 left-1/2 -translate-x-1/2 w-32 h-1 bg-slate-200 dark:bg-slate-700 rounded-full z-50"></div>
</body>
</html>
