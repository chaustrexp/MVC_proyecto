<?php
require_once '../../modelo/AsignacionModel.php';
require_once '../../modelo/InstructorModel.php';
require_once '../../modelo/FichaModel.php';
require_once '../../modelo/AmbienteModel.php';
require_once '../../modelo/CompetenciaModel.php';

$id = $_GET['id'];
$asignacion = Asignacion::searchById($id);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $asignacion->setInstructorInstId($_POST['instructor_inst_id']);
    $asignacion->setAsigFechaIni($_POST['asig_fecha_ini']);
    $asignacion->setAsigFechaFin($_POST['asig_fecha_fin']);
    $asignacion->setFichaFichId($_POST['ficha_fich_id']);
    $asignacion->setAmbienteAmbId($_POST['ambiente_amb_id']);
    $asignacion->setCompetenciaCompId($_POST['competencia_comp_id']);
    Asignacion::update($asignacion);
    header('Location: index.php');
    exit;
}

$instructores = Instructor::all();
$fichas = Ficha::all();
$ambientes = Ambiente::all();
$competencias = Competencia::all();
?>
<!DOCTYPE html>
<html class="light" lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Asignación - SENA</title>
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
                    <h1 class="text-xl font-bold tracking-tight">Editar Asignación</h1>
                    <p class="text-[10px] uppercase font-bold text-primary tracking-widest">ID: <?= $asignacion->getAsigId() ?></p>
                </div>
            </div>
            <div class="w-10 h-10 bg-secondary-green rounded-lg flex items-center justify-center text-white">
                <span class="material-icons-round">edit</span>
            </div>
        </div>
    </header>

    <main class="px-5 pt-6 pb-8 max-w-2xl mx-auto">
        <form method="POST" class="space-y-6">
            <!-- Instructor Section -->
            <div class="bg-white dark:bg-slate-800 rounded-xl overflow-hidden shadow-sm border-l-4 border-primary">
                <div class="p-5">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center">
                            <span class="material-icons-round text-primary">person</span>
                        </div>
                        <h2 class="text-lg font-bold">Instructor</h2>
                    </div>
                    <select name="instructor_inst_id" required 
                        class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                        <?php foreach($instructores as $instructor): ?>
                        <option value="<?= $instructor->getInstId() ?>" <?= $instructor->getInstId() == $asignacion->getInstructorInstId() ? 'selected' : '' ?>>
                            <?= $instructor->getInstNombres() ?> <?= $instructor->getInstApellidos() ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <!-- Dates Section -->
            <div class="bg-white dark:bg-slate-800 rounded-xl overflow-hidden shadow-sm border-l-4 border-secondary-green">
                <div class="p-5">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 bg-secondary-green/10 rounded-lg flex items-center justify-center">
                            <span class="material-icons-round text-secondary-green">event</span>
                        </div>
                        <h2 class="text-lg font-bold">Fechas</h2>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-slate-600 dark:text-slate-400 mb-2">
                                Fecha Inicio
                            </label>
                            <input type="date" name="asig_fecha_ini" value="<?= $asignacion->getAsigFechaIni() ?>" required
                                class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 rounded-lg focus:ring-2 focus:ring-secondary-green focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-600 dark:text-slate-400 mb-2">
                                Fecha Fin
                            </label>
                            <input type="date" name="asig_fecha_fin" value="<?= $asignacion->getAsigFechaFin() ?>" required
                                class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 rounded-lg focus:ring-2 focus:ring-secondary-green focus:border-transparent">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Assignment Details Section -->
            <div class="bg-white dark:bg-slate-800 rounded-xl overflow-hidden shadow-sm border-l-4 border-primary">
                <div class="p-5 space-y-4">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center">
                            <span class="material-icons-round text-primary">assignment</span>
                        </div>
                        <h2 class="text-lg font-bold">Detalles de Asignación</h2>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-600 dark:text-slate-400 mb-2 flex items-center gap-2">
                            <span class="material-icons-round text-sm">badge</span>
                            Ficha
                        </label>
                        <select name="ficha_fich_id" required
                            class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                            <?php foreach($fichas as $ficha): ?>
                            <option value="<?= $ficha->getFichId() ?>" <?= $ficha->getFichId() == $asignacion->getFichaFichId() ? 'selected' : '' ?>>
                                <?= $ficha->getFichId() ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-600 dark:text-slate-400 mb-2 flex items-center gap-2">
                            <span class="material-icons-round text-sm">meeting_room</span>
                            Ambiente
                        </label>
                        <select name="ambiente_amb_id" required
                            class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                            <?php foreach($ambientes as $ambiente): ?>
                            <option value="<?= $ambiente->getAmbId() ?>" <?= $ambiente->getAmbId() == $asignacion->getAmbienteAmbId() ? 'selected' : '' ?>>
                                <?= $ambiente->getAmbNombre() ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-600 dark:text-slate-400 mb-2 flex items-center gap-2">
                            <span class="material-icons-round text-sm">school</span>
                            Competencia
                        </label>
                        <select name="competencia_comp_id" required
                            class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                            <?php foreach($competencias as $competencia): ?>
                            <option value="<?= $competencia->getCompId() ?>" <?= $competencia->getCompId() == $asignacion->getCompetenciaCompId() ? 'selected' : '' ?>>
                                <?= $competencia->getCompNombreCorto() ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-3">
                <button type="submit" 
                    class="flex-1 bg-secondary-green text-white py-4 rounded-xl font-bold text-base hover:bg-secondary-green/90 transition-colors shadow-lg shadow-secondary-green/30 flex items-center justify-center gap-2">
                    <span class="material-icons-round">save</span>
                    Actualizar Asignación
                </button>
                <a href="index.php" 
                    class="px-6 py-4 bg-slate-200 dark:bg-slate-700 text-slate-700 dark:text-slate-300 rounded-xl font-bold hover:bg-slate-300 dark:hover:bg-slate-600 transition-colors flex items-center justify-center">
                    <span class="material-icons-round">close</span>
                </a>
            </div>
        </form>
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
