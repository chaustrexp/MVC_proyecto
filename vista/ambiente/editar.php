<?php
require_once '../../modelo/AmbienteModel.php';
require_once '../../modelo/SedeModel.php';

$id = $_GET['id'];
$ambiente = Ambiente::searchById($id);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $ambiente->setAmbNombre($_POST['amb_nombre']);
    $ambiente->setSedeId($_POST['sede_id']);
    Ambiente::update($ambiente);
    header('Location: index.php');
    exit;
}

$sedes = Sede::all();
?>
<!DOCTYPE html>
<html class="light" lang="es">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/>
<title>Editar Ambiente - SENA</title>
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
        <h1 class="text-xl font-bold tracking-tight">Editar Ambiente</h1>
    </div>
</header>

<main class="mt-6 px-5 pb-32">
    <form method="POST" class="space-y-6">
        <div class="bg-white dark:bg-background-dark/50 border border-primary/5 dark:border-primary/20 rounded-xl p-5 shadow-sm">
            <div class="flex items-center gap-3 mb-4">
                <div class="bg-primary/10 p-3 rounded-xl">
                    <span class="material-icons-round text-primary text-2xl">meeting_room</span>
                </div>
                <div>
                    <h2 class="text-xs font-semibold text-primary/70 dark:text-primary uppercase tracking-wider">ID del Ambiente</h2>
                    <p class="text-lg font-bold text-slate-800 dark:text-white">#<?= $ambiente->getAmbId() ?></p>
                </div>
            </div>
            
            <div class="space-y-4 pt-4 border-t border-slate-100 dark:border-primary/10">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
                        Nombre del Ambiente
                    </label>
                    <input 
                        type="text" 
                        name="amb_nombre" 
                        value="<?= $ambiente->getAmbNombre() ?>"
                        required
                        class="w-full bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-primary/20 rounded-xl py-3 px-4 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none transition-all"
                    />
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
                        Sede
                    </label>
                    <select 
                        name="sede_id" 
                        required
                        class="w-full bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-primary/20 rounded-xl py-3 px-4 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none transition-all"
                    >
                        <?php foreach($sedes as $sede): ?>
                        <option value="<?= $sede->getSedeId() ?>" <?= $sede->getSedeId() == $ambiente->getSedeId() ? 'selected' : '' ?>>
                            <?= $sede->getSedeNombre() ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="flex gap-3">
            <button 
                type="submit"
                class="flex-1 bg-primary text-white py-3.5 rounded-xl font-bold shadow-lg shadow-primary/30 active:scale-95 transition-transform"
            >
                Actualizar
            </button>
            <a 
                href="index.php"
                class="flex-1 bg-white dark:bg-slate-800 border border-slate-200 dark:border-primary/20 text-slate-600 dark:text-slate-300 py-3.5 rounded-xl font-bold text-center active:scale-95 transition-transform"
            >
                Cancelar
            </a>
        </div>
    </form>
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
