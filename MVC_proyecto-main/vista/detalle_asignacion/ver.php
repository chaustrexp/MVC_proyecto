<?php
require_once '../../modelo/AsignacioDetalleModel.php';

$id = $_GET['id'];
$detalle = AsignacionDetalle::searchById($id);

if(isset($_POST['eliminar'])){
    AsignacionDetalle::delete($id);
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html class="light" lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Sesión - SENA</title>
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
                <h1 class="text-lg font-bold leading-tight">Sesión #<?= $detalle->getDetasigId() ?></h1>
                <p class="text-[10px] uppercase tracking-wider opacity-90 font-medium">Detalle de Asignación</p>
            </div>
            <div class="w-10 flex justify-end">
                <span class="material-icons text-white/80">more_horiz</span>
            </div>
        </div>
        <!-- Status Badge -->
        <div class="px-4 pb-2 flex justify-center">
            <span class="bg-white/20 backdrop-blur-sm text-white text-[10px] px-3 py-0.5 rounded-full font-semibold border border-white/30 uppercase tracking-tighter">
                Programada
            </span>
        </div>
    </header>

    <main class="p-4 space-y-4 mb-32">
        <!-- ID Card -->
        <section class="bg-white dark:bg-zinc-900 rounded-xl shadow-sm border border-emerald-100 dark:border-emerald-900/30 overflow-hidden">
            <div class="p-4 border-b border-emerald-50 dark:border-emerald-900/20 flex items-center gap-2">
                <span class="material-icons text-primary text-xl">info</span>
                <h2 class="font-bold text-sm uppercase tracking-tight text-emerald-800 dark:text-emerald-400">Identificación</h2>
            </div>
            <div class="p-4">
                <div class="bg-primary/5 dark:bg-primary/10 rounded-lg p-4 text-center">
                    <p class="text-[10px] text-emerald-600 dark:text-emerald-500 font-bold uppercase mb-1">ID de Sesión</p>
                    <p class="text-3xl font-bold text-primary">#<?= $detalle->getDetasigId() ?></p>
                </div>
            </div>
        </section>

        <!-- Asignación Card -->
        <section class="bg-white dark:bg-zinc-900 rounded-xl shadow-sm border border-emerald-100 dark:border-emerald-900/30 overflow-hidden">
            <div class="p-4 border-b border-emerald-50 dark:border-emerald-900/20 flex items-center gap-2">
                <span class="material-icons text-primary text-xl">assignment</span>
                <h2 class="font-bold text-sm uppercase tracking-tight text-emerald-800 dark:text-emerald-400">Asignación Vinculada</h2>
            </div>
            <div class="p-4">
                <div class="flex items-center gap-3">
                    <div class="bg-emerald-50 dark:bg-emerald-950 p-3 rounded-lg">
                        <span class="material-icons text-primary text-2xl">link</span>
                    </div>
                    <div>
                        <p class="text-[10px] text-emerald-600 dark:text-emerald-500 font-bold uppercase">ID Asignación</p>
                        <p class="text-xl font-bold text-primary">#<?= $detalle->getAsigId() ?></p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Horario Card -->
        <section class="bg-white dark:bg-zinc-900 rounded-xl shadow-sm border border-emerald-100 dark:border-emerald-900/30 overflow-hidden">
            <div class="p-4 border-b border-emerald-50 dark:border-emerald-900/20 flex items-center gap-2">
                <span class="material-icons text-primary text-xl">schedule</span>
                <h2 class="font-bold text-sm uppercase tracking-tight text-emerald-800 dark:text-emerald-400">Horario de Sesión</h2>
            </div>
            <div class="p-4">
                <div class="flex items-center justify-center gap-3 py-4">
                    <div class="text-center">
                        <p class="text-[10px] text-emerald-600 dark:text-emerald-500 font-bold uppercase mb-2">Inicio</p>
                        <div class="bg-primary/10 text-primary px-6 py-3 rounded-xl">
                            <p class="text-2xl font-bold tracking-tight"><?= date('h:i', strtotime($detalle->getDetasigHoraIni())) ?></p>
                            <p class="text-xs font-semibold"><?= date('A', strtotime($detalle->getDetasigHoraIni())) ?></p>
                        </div>
                    </div>
                    
                    <div class="flex flex-col items-center gap-1 px-4">
                        <span class="material-icons text-slate-300">arrow_forward</span>
                        <div class="h-0.5 w-12 bg-slate-200 dark:bg-slate-700"></div>
                    </div>
                    
                    <div class="text-center">
                        <p class="text-[10px] text-emerald-600 dark:text-emerald-500 font-bold uppercase mb-2">Fin</p>
                        <div class="bg-primary/10 text-primary px-6 py-3 rounded-xl">
                            <p class="text-2xl font-bold tracking-tight"><?= date('h:i', strtotime($detalle->getDetasigHoraFin())) ?></p>
                            <p class="text-xs font-semibold"><?= date('A', strtotime($detalle->getDetasigHoraFin())) ?></p>
                        </div>
                    </div>
                </div>
                
                <!-- Duration -->
                <div class="mt-4 pt-4 border-t border-emerald-50 dark:border-emerald-900/20 text-center">
                    <p class="text-[10px] text-emerald-600 dark:text-emerald-500 font-bold uppercase mb-1">Duración</p>
                    <?php
                    $inicio = strtotime($detalle->getDetasigHoraIni());
                    $fin = strtotime($detalle->getDetasigHoraFin());
                    $duracion = ($fin - $inicio) / 3600;
                    ?>
                    <p class="text-lg font-bold text-slate-700 dark:text-slate-300"><?= number_format($duracion, 1) ?> horas</p>
                </div>
            </div>
        </section>
    </main>

    <!-- Fixed Bottom Actions -->
    <div class="fixed bottom-16 left-0 right-0 p-4 bg-white/80 dark:bg-zinc-900/80 backdrop-blur-md border-t border-emerald-100 dark:border-emerald-900/30 z-40 space-y-3">
        <div class="grid grid-cols-2 gap-3">
            <a href="editar.php?id=<?= $detalle->getDetasigId() ?>"
                class="bg-white dark:bg-zinc-800 border border-primary text-primary font-bold py-3 px-4 rounded-xl text-sm transition-all active:scale-95 flex items-center justify-center gap-2">
                <span class="material-icons text-lg">edit</span>
                Editar
            </a>
            <a href="index.php"
                class="bg-primary text-white font-bold py-3 px-4 rounded-xl text-sm shadow-lg shadow-primary/20 transition-all active:scale-95 flex items-center justify-center gap-2">
                <span class="material-icons text-lg">list</span>
                Ver Lista
            </a>
        </div>
        <form method="POST" onsubmit="return confirm('¿Está seguro de eliminar esta sesión?')" class="w-full">
            <button type="submit" name="eliminar"
                class="w-full bg-red-500 text-white font-bold py-3 px-4 rounded-xl text-sm shadow-lg shadow-red-500/20 transition-all active:scale-95 flex items-center justify-center gap-2">
                <span class="material-icons text-lg">delete</span>
                Eliminar Sesión
            </button>
        </form>
    </div>

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
