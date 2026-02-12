<?php
require_once '../../modelo/AsignacionModel.php';

$id = $_GET['id'];
$asignacion = Asignacion::searchById($id);

if(isset($_POST['eliminar'])){
    Asignacion::delete($id);
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html class="light" lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle Asignación - SENA</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <script>
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
                        "display": ["Public Sans"]
                    },
                },
            },
        }
    </script>
</head>
<body class="font-display bg-background-light dark:bg-background-dark text-slate-800 dark:text-slate-100 min-h-screen pb-24">
    <!-- Top Header -->
    <header class="sticky top-0 z-30 bg-white/80 dark:bg-background-dark/80 backdrop-blur-md border-b border-primary/10">
        <div class="px-5 py-4 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <button onclick="window.location.href='index.php'" class="w-10 h-10 flex items-center justify-center rounded-full hover:bg-primary/10 transition-colors">
                    <span class="material-icons-round text-slate-600 dark:text-slate-300">arrow_back</span>
                </button>
                <div>
                    <h1 class="text-xl font-bold tracking-tight">Detalle Asignación</h1>
                    <p class="text-[10px] uppercase font-bold text-primary tracking-widest">ID: <?= $asignacion->getAsigId() ?></p>
                </div>
            </div>
            <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center text-white">
                <span class="material-icons-round">assignment</span>
            </div>
        </div>
    </header>

    <main class="px-5 pt-6 pb-8 max-w-2xl mx-auto">
        <!-- Status Badge -->
        <div class="mb-6 flex justify-center">
            <div class="bg-primary/10 text-primary text-xs font-bold px-4 py-2 rounded-full border-2 border-primary/20 flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                ASIGNACIÓN ACTIVA
            </div>
        </div>

        <!-- Main Card -->
        <div class="bg-white dark:bg-slate-800 rounded-xl overflow-hidden shadow-sm border-l-4 border-primary mb-6">
            <div class="p-5">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center">
                        <span class="material-icons-round text-primary text-2xl">person</span>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-primary uppercase tracking-wider">Instructor</p>
                        <h2 class="text-lg font-bold">ID: <?= $asignacion->getInstructorInstId() ?></h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dates Section -->
        <div class="bg-white dark:bg-slate-800 rounded-xl overflow-hidden shadow-sm border-l-4 border-secondary-green mb-6">
            <div class="p-5">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 bg-secondary-green/10 rounded-lg flex items-center justify-center">
                        <span class="material-icons-round text-secondary-green">event</span>
                    </div>
                    <h2 class="text-lg font-bold">Período</h2>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-slate-50 dark:bg-slate-900 rounded-lg p-4">
                        <p class="text-xs font-bold text-slate-500 uppercase mb-1">Fecha Inicio</p>
                        <p class="text-base font-bold text-secondary-green"><?= date('d/m/Y', strtotime($asignacion->getAsigFechaIni())) ?></p>
                    </div>
                    <div class="bg-slate-50 dark:bg-slate-900 rounded-lg p-4">
                        <p class="text-xs font-bold text-slate-500 uppercase mb-1">Fecha Fin</p>
                        <p class="text-base font-bold text-secondary-green"><?= date('d/m/Y', strtotime($asignacion->getAsigFechaFin())) ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Details Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <!-- Ficha -->
            <div class="bg-white dark:bg-slate-800 rounded-xl overflow-hidden shadow-sm border-l-4 border-primary">
                <div class="p-4 text-center">
                    <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mx-auto mb-3">
                        <span class="material-icons-round text-primary text-xl">badge</span>
                    </div>
                    <p class="text-xs font-bold text-slate-500 uppercase mb-1">Ficha</p>
                    <p class="text-lg font-bold text-primary"><?= $asignacion->getFichaFichId() ?></p>
                </div>
            </div>

            <!-- Ambiente -->
            <div class="bg-white dark:bg-slate-800 rounded-xl overflow-hidden shadow-sm border-l-4 border-secondary-green">
                <div class="p-4 text-center">
                    <div class="w-12 h-12 bg-secondary-green/10 rounded-lg flex items-center justify-center mx-auto mb-3">
                        <span class="material-icons-round text-secondary-green text-xl">meeting_room</span>
                    </div>
                    <p class="text-xs font-bold text-slate-500 uppercase mb-1">Ambiente</p>
                    <p class="text-lg font-bold text-secondary-green"><?= $asignacion->getAmbienteAmbId() ?></p>
                </div>
            </div>

            <!-- Competencia -->
            <div class="bg-white dark:bg-slate-800 rounded-xl overflow-hidden shadow-sm border-l-4 border-primary">
                <div class="p-4 text-center">
                    <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mx-auto mb-3">
                        <span class="material-icons-round text-primary text-xl">school</span>
                    </div>
                    <p class="text-xs font-bold text-slate-500 uppercase mb-1">Competencia</p>
                    <p class="text-lg font-bold text-primary"><?= $asignacion->getCompetenciaCompId() ?></p>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="space-y-3">
            <a href="editar.php?id=<?= $asignacion->getAsigId() ?>" 
                class="w-full bg-secondary-green text-white py-4 rounded-xl font-bold text-base hover:bg-secondary-green/90 transition-colors shadow-lg shadow-secondary-green/30 flex items-center justify-center gap-2">
                <span class="material-icons-round">edit</span>
                Editar Asignación
            </a>
            
            <a href="index.php" 
                class="w-full bg-slate-200 dark:bg-slate-700 text-slate-700 dark:text-slate-300 py-4 rounded-xl font-bold text-base hover:bg-slate-300 dark:hover:bg-slate-600 transition-colors flex items-center justify-center gap-2">
                <span class="material-icons-round">arrow_back</span>
                Volver al Listado
            </a>

            <form method="POST" onsubmit="return confirm('¿Está seguro de eliminar esta asignación?')" class="w-full">
                <button type="submit" name="eliminar"
                    class="w-full bg-red-500 text-white py-4 rounded-xl font-bold text-base hover:bg-red-600 transition-colors shadow-lg shadow-red-500/30 flex items-center justify-center gap-2">
                    <span class="material-icons-round">delete</span>
                    Eliminar Asignación
                </button>
            </form>
        </div>
    </main>

    <!-- Bottom Navigation -->
    <nav class="fixed bottom-0 inset-x-0 bg-white dark:bg-slate-900 border-t border-slate-200 dark:border-slate-800 px-6 py-3 pb-8 flex justify-between items-center z-50">
        <div class="flex flex-col items-center gap-1 text-primary">
            <span class="material-icons-round">grid_view</span>
            <span class="text-[10px] font-bold uppercase tracking-tighter">Inicio</span>
        </div>
        <div class="flex flex-col items-center gap-1 text-slate-400">
            <span class="material-icons-round">calendar_today</span>
            <span class="text-[10px] font-bold uppercase tracking-tighter">Calendario</span>
        </div>
        <div class="flex flex-col items-center gap-1 text-slate-400">
            <span class="material-icons-round">meeting_room</span>
            <span class="text-[10px] font-bold uppercase tracking-tighter">Ambientes</span>
        </div>
        <div class="flex flex-col items-center gap-1 text-slate-400">
            <span class="material-icons-round">person_outline</span>
            <span class="text-[10px] font-bold uppercase tracking-tighter">Perfil</span>
        </div>
    </nav>
</body>
</html>
