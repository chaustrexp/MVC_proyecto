<?php
require_once '../../modelo/FichaModel.php';
require_once '../../modelo/ProgramaModel.php';
require_once '../../modelo/InstructorModel.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $ficha = new Ficha(null, $_POST['prog_id'], $_POST['inst_id'], $_POST['fich_jornada']);
    Ficha::save($ficha);
    header('Location: index.php');
    exit;
}

$programas = Programa::all();
$instructores = Instructor::all();
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
<script id="tailwind-config">
    tailwind.config = {
        darkMode: "class",
        theme: {
            extend: {
                colors: {
                    "primary": "#38a800",
                    "primary-dark": "#007832",
                    "background-light": "#f6f8f5",
                    "background-dark": "#16230f",
                    "neutral-soft": "#e9eee7",
                    "neutral-dark": "#2d3a26",
                },
                fontFamily: {
                    "display": ["Public Sans", "sans-serif"]
                },
            },
        },
    }
</script>
<title>Crear Ficha - SENA</title>
</head>
<body class="font-display bg-background-light dark:bg-background-dark text-neutral-dark dark:text-gray-100 min-h-screen flex flex-col">
<header class="bg-primary sticky top-0 z-50 px-4 pt-12 pb-6 shadow-md">
    <div class="flex items-center gap-3 mb-4">
        <a href="index.php" class="bg-white/20 p-2 rounded-lg hover:bg-white/30 transition-colors">
            <span class="material-icons text-white">arrow_back</span>
        </a>
        <h1 class="text-white text-xl font-bold tracking-tight">Nueva Ficha</h1>
    </div>
</header>

<main class="flex-1 px-4 py-6 pb-24">
    <form method="POST" class="space-y-4">
        <div class="bg-white dark:bg-neutral-dark/30 rounded-xl p-5 shadow-sm border border-neutral-soft dark:border-white/5">
            <h2 class="text-sm font-semibold uppercase tracking-wider text-neutral-dark/60 dark:text-gray-400 mb-4">
                Información de la Ficha
            </h2>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold mb-2">
                        Programa
                    </label>
                    <select 
                        name="prog_id" 
                        required
                        class="w-full bg-neutral-soft dark:bg-background-dark border-none rounded-lg py-3 px-4 focus:ring-4 focus:ring-primary-dark/20 outline-none transition-all"
                    >
                        <option value="">Seleccione un programa...</option>
                        <?php foreach($programas as $programa): ?>
                        <option value="<?= $programa->getProgCodigo() ?>"><?= $programa->getProgDenominacion() ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div>
                    <label class="block text-sm font-semibold mb-2">
                        Instructor Líder
                    </label>
                    <select 
                        name="inst_id" 
                        required
                        class="w-full bg-neutral-soft dark:bg-background-dark border-none rounded-lg py-3 px-4 focus:ring-4 focus:ring-primary-dark/20 outline-none transition-all"
                    >
                        <option value="">Seleccione un instructor...</option>
                        <?php foreach($instructores as $instructor): ?>
                        <option value="<?= $instructor->getInstId() ?>">
                            <?= $instructor->getInstNombres() ?> <?= $instructor->getInstApellidos() ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div>
                    <label class="block text-sm font-semibold mb-2">
                        Jornada
                    </label>
                    <input 
                        type="text" 
                        name="fich_jornada" 
                        required
                        class="w-full bg-neutral-soft dark:bg-background-dark border-none rounded-lg py-3 px-4 focus:ring-4 focus:ring-primary-dark/20 outline-none transition-all"
                        placeholder="Ej: Diurna, Nocturna, Mixta"
                    />
                </div>
            </div>
        </div>

        <div class="flex gap-3">
            <button 
                type="submit"
                class="flex-1 bg-primary text-white py-3.5 rounded-xl font-bold shadow-lg active:scale-95 transition-transform"
            >
                Guardar
            </button>
            <a 
                href="index.php"
                class="flex-1 bg-white dark:bg-neutral-dark/30 border border-neutral-soft dark:border-white/10 text-neutral-dark dark:text-gray-100 py-3.5 rounded-xl font-bold text-center active:scale-95 transition-transform"
            >
                Cancelar
            </a>
        </div>
    </form>
</main>

<nav class="fixed bottom-0 left-0 right-0 bg-white/80 dark:bg-background-dark/80 backdrop-blur-md border-t border-neutral-soft dark:border-white/10 px-6 py-3 pb-8 flex justify-between items-center z-50">
    <button class="flex flex-col items-center gap-1 text-primary">
        <span class="material-icons">grid_view</span>
        <span class="text-[10px] font-bold uppercase tracking-tighter">Fichas</span>
    </button>
    <button class="flex flex-col items-center gap-1 text-neutral-dark/40 dark:text-gray-500">
        <span class="material-icons">class</span>
        <span class="text-[10px] font-bold uppercase tracking-tighter">Programas</span>
    </button>
    <button class="flex flex-col items-center gap-1 text-neutral-dark/40 dark:text-gray-500">
        <span class="material-icons">event</span>
        <span class="text-[10px] font-bold uppercase tracking-tighter">Horario</span>
    </button>
    <button class="flex flex-col items-center gap-1 text-neutral-dark/40 dark:text-gray-500">
        <span class="material-icons">person_outline</span>
        <span class="text-[10px] font-bold uppercase tracking-tighter">Perfil</span>
    </button>
</nav>
</body>
</html>
