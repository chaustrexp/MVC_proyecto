<?php
require_once '../../modelo/AsignacioDetalleModel.php';
require_once '../../modelo/AsignacionModel.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $detalle = new AsignacionDetalle($_POST['asig_id'], $_POST['detasig_hora_ini'], $_POST['detasig_hora_fin'], null);
    AsignacionDetalle::save($detalle);
    header('Location: index.php');
    exit;
}

$asignaciones = Asignacion::all();
?>
<!DOCTYPE html>
<html class="light" lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Sesión - SENA</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#38a800",
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
        .ios-status-bar {
            height: 44px;
        }
        .safe-area-bottom {
            padding-bottom: env(safe-area-inset-bottom);
        }
    </style>
</head>
<body class="bg-background-light dark:bg-background-dark text-slate-800 dark:text-slate-200 font-display">
    <!-- iOS Status Bar Placeholder -->
    <div class="ios-status-bar bg-primary w-full"></div>

    <!-- Sticky Header -->
    <header class="sticky top-0 z-50 bg-primary text-white shadow-md">
        <div class="px-4 py-3 flex items-center justify-between">
            <button onclick="window.location.href='index.php'" class="p-1 -ml-1 flex items-center">
                <span class="material-icons">chevron_left</span>
                <span class="text-sm font-medium">Volver</span>
            </button>
            <div class="text-center flex-1 mx-2">
                <h1 class="text-lg font-bold leading-tight">Nueva Sesión</h1>
                <p class="text-[10px] uppercase tracking-wider opacity-90 font-medium">Detalle de Asignación</p>
            </div>
            <div class="w-10 flex justify-end">
                <span class="material-icons">add_circle</span>
            </div>
        </div>
    </header>

    <main class="p-4 space-y-4 mb-32">
        <form method="POST" class="space-y-4">
            <!-- Asignación Card -->
            <section class="bg-white dark:bg-zinc-900 rounded-xl shadow-sm border border-emerald-100 dark:border-emerald-900/30 overflow-hidden">
                <div class="p-4 border-b border-emerald-50 dark:border-emerald-900/20 flex items-center gap-2">
                    <span class="material-icons text-primary text-xl">assignment</span>
                    <h2 class="font-bold text-sm uppercase tracking-tight text-emerald-800 dark:text-emerald-400">Asignación</h2>
                </div>
                <div class="p-4">
                    <label class="block text-[10px] text-emerald-600 dark:text-emerald-500 font-bold uppercase mb-2">
                        Seleccione la Asignación
                    </label>
                    <select name="asig_id" required
                        class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
                        <option value="">Seleccione una asignación</option>
                        <?php foreach($asignaciones as $asignacion): ?>
                        <option value="<?= $asignacion->getAsigId() ?>">
                            Asignación #<?= $asignacion->getAsigId() ?> - Instructor: <?= $asignacion->getInstructorInstId() ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </section>

            <!-- Horario Card -->
            <section class="bg-white dark:bg-zinc-900 rounded-xl shadow-sm border border-emerald-100 dark:border-emerald-900/30 overflow-hidden">
                <div class="p-4 border-b border-emerald-50 dark:border-emerald-900/20 flex items-center gap-2">
                    <span class="material-icons text-primary text-xl">schedule</span>
                    <h2 class="font-bold text-sm uppercase tracking-tight text-emerald-800 dark:text-emerald-400">Horario de Sesión</h2>
                </div>
                <div class="p-4 space-y-4">
                    <div>
                        <label class="block text-[10px] text-emerald-600 dark:text-emerald-500 font-bold uppercase mb-2">
                            Hora Inicio
                        </label>
                        <input type="time" name="detasig_hora_ini" required
                            class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent text-sm font-medium">
                    </div>
                    <div>
                        <label class="block text-[10px] text-emerald-600 dark:text-emerald-500 font-bold uppercase mb-2">
                            Hora Fin
                        </label>
                        <input type="time" name="detasig_hora_fin" required
                            class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent text-sm font-medium">
                    </div>
                    
                    <!-- Time Preview -->
                    <div class="pt-3 border-t border-emerald-50 dark:border-emerald-900/20">
                        <p class="text-[10px] text-emerald-600 dark:text-emerald-500 font-bold uppercase mb-2">Vista Previa</p>
                        <div class="flex items-center gap-2">
                            <span class="bg-primary/10 text-primary px-3 py-1 rounded text-sm font-bold tracking-tight">--:--</span>
                            <span class="material-icons text-slate-300 text-sm">arrow_forward</span>
                            <span class="bg-primary/10 text-primary px-3 py-1 rounded text-sm font-bold tracking-tight">--:--</span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Action Buttons -->
            <div class="fixed bottom-16 left-0 right-0 p-4 bg-white/80 dark:bg-zinc-900/80 backdrop-blur-md border-t border-emerald-100 dark:border-emerald-900/30 grid grid-cols-2 gap-3 z-40">
                <a href="index.php" 
                    class="bg-white dark:bg-zinc-800 border border-slate-300 dark:border-slate-600 text-slate-700 dark:text-slate-300 font-bold py-3 px-4 rounded-xl text-sm transition-all active:scale-95 flex items-center justify-center gap-2">
                    <span class="material-icons text-lg">close</span>
                    Cancelar
                </a>
                <button type="submit"
                    class="bg-primary text-white font-bold py-3 px-4 rounded-xl text-sm shadow-lg shadow-primary/20 transition-all active:scale-95 flex items-center justify-center gap-2">
                    <span class="material-icons text-lg">check_circle</span>
                    Guardar Sesión
                </button>
            </div>
        </form>
    </main>

    <!-- Bottom Navigation Bar (iOS Style) -->
    <nav class="fixed bottom-0 left-0 right-0 bg-white dark:bg-zinc-950 border-t border-slate-200 dark:border-slate-800 px-6 pt-2 safe-area-bottom z-50">
        <div class="flex justify-between items-center max-w-md mx-auto h-12">
            <button class="flex flex-col items-center gap-0.5">
                <span class="material-icons text-slate-400">home</span>
                <span class="text-[10px] font-medium text-slate-400">Inicio</span>
            </button>
            <button class="flex flex-col items-center gap-0.5">
                <span class="material-icons text-primary">calendar_today</span>
                <span class="text-[10px] font-medium text-primary">Agenda</span>
            </button>
            <button class="flex flex-col items-center gap-0.5">
                <span class="material-icons text-slate-400">group</span>
                <span class="text-[10px] font-medium text-slate-400">Fichas</span>
            </button>
            <button class="flex flex-col items-center gap-0.5">
                <span class="material-icons text-slate-400">account_circle</span>
                <span class="text-[10px] font-medium text-slate-400">Perfil</span>
            </button>
        </div>
    </nav>
</body>
</html>
