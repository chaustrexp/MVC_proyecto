<?php
require_once '../../modelo/SedeModel.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $sede = new Sede(null, $_POST['sede_nombre']);
    Sede::save($sede);
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
            <h1 class="text-2xl font-bold tracking-tight text-white">Crear Nueva Sede</h1>
        </div>
    </div>
</header>

<main class="flex-1 px-4 pb-32 overflow-y-auto mt-6">
    <form method="POST" class="space-y-6">
        <div class="bg-white dark:bg-slate-900 p-6 rounded-2xl shadow-sm border border-slate-100 dark:border-slate-800">
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">
                        Nombre de la Sede
                    </label>
                    <input 
                        type="text" 
                        name="sede_nombre" 
                        required
                        class="w-full bg-slate-50 dark:bg-slate-800 border-none rounded-xl py-3 px-4 text-sm focus:ring-2 focus:ring-primary-dark/50"
                        placeholder="Ej: Centro de Servicios y Gestión"
                    />
                </div>
            </div>
        </div>

        <div class="flex space-x-3">
            <button 
                type="submit"
                class="flex-1 py-3.5 bg-primary text-white text-sm font-bold rounded-xl shadow-lg shadow-primary/40"
            >
                Guardar Sede
            </button>
            <a 
                href="index.php"
                class="flex-1 py-3.5 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 text-sm font-bold rounded-xl text-center"
            >
                Cancelar
            </a>
        </div>
    </form>
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
