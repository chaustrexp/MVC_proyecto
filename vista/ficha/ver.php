<?php
require_once '../../modelo/FichaModel.php';
require_once '../../modelo/ProgramaModel.php';
require_once '../../modelo/InstructorModel.php';

$id = $_GET['id'];
$ficha = Ficha::searchById($id);
$programa = Programa::searchById($ficha->getProgId());
$instructor = Instructor::searchById($ficha->getInstId());

if(isset($_POST['eliminar'])){
    Ficha::delete($id);
    header('Location: index.php');
    exit;
}
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
<title>Ver Ficha - SENA</title>
</head>
<body class="font-display bg-background-light dark:bg-background-dark text-neutral-dark dark:text-gray-100 min-h-screen flex flex-col">
<header class="bg-primary sticky top-0 z-50 px-4 pt-12 pb-6 shadow-md">
    <div class="flex items-center gap-3 mb-4">
        <a href="index.php" class="bg-white/20 p-2 rounded-lg hover:bg-white/30 transition-colors">
            <span class="material-icons text-white">arrow_back</span>
        </a>
        <h1 class="text-white text-xl font-bold tracking-tight">Detalle de Ficha</h1>
    </div>
</header>

<main class="flex-1 px-4 py-6 pb-24 space-y-4">
    <!-- Card Principal -->
    <div class="bg-white dark:bg-neutral-dark/30 rounded-xl p-5 shadow-sm border border-neutral-soft dark:border-white/5">
        <div class="flex justify-between items-start mb-4">
            <span class="text-xs font-bold text-primary bg-primary/10 dark:bg-primary/20 px-3 py-1.5 rounded">
                FICHA: <?= $ficha->getFichId() ?>
            </span>
        </div>
        
        <h2 class="text-2xl font-bold leading-tight mb-4">
            <?= $programa->getProgDenominacion() ?>
        </h2>
        
        <div class="space-y-3 pt-4 border-t border-neutral-soft dark:border-white/10">
            <div>
                <span class="text-xs uppercase font-bold text-neutral-dark/60 dark:text-gray-400 block mb-1">
                    ID de Ficha
                </span>
                <span class="text-lg font-semibold"><?= $ficha->getFichId() ?></span>
            </div>
            
            <div>
                <span class="text-xs uppercase font-bold text-neutral-dark/60 dark:text-gray-400 block mb-1">
                    Programa
                </span>
                <span class="text-base font-semibold"><?= $programa->getProgDenominacion() ?></span>
            </div>
            
            <div>
                <span class="text-xs uppercase font-bold text-neutral-dark/60 dark:text-gray-400 block mb-1">
                    Instructor Líder
                </span>
                <span class="text-base font-semibold">
                    <?= $instructor->getInstNombres() ?> <?= $instructor->getInstApellidos() ?>
                </span>
            </div>
            
            <div>
                <span class="text-xs uppercase font-bold text-neutral-dark/60 dark:text-gray-400 block mb-1">
                    Jornada
                </span>
                <div class="flex items-center gap-1 px-2 py-1 rounded-full bg-orange-100 dark:bg-orange-900/30 text-orange-700 dark:text-orange-400 text-xs font-bold uppercase tracking-wider inline-flex">
                    <span class="material-icons text-sm">wb_sunny</span>
                    <?= $ficha->getFichJornada() ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Botones de Acción -->
    <div class="space-y-3">
        <a 
            href="editar.php?id=<?= $ficha->getFichId() ?>"
            class="block w-full bg-primary text-white py-3.5 rounded-xl font-bold text-center shadow-lg active:scale-95 transition-transform"
        >
            Editar Ficha
        </a>
        
        <a 
            href="index.php"
            class="block w-full bg-white dark:bg-neutral-dark/30 border border-neutral-soft dark:border-white/10 text-neutral-dark dark:text-gray-100 py-3.5 rounded-xl font-bold text-center active:scale-95 transition-transform"
        >
            Volver al Listado
        </a>
        
        <form method="POST" onsubmit="return confirm('¿Está seguro de eliminar esta ficha?')">
            <button 
                type="submit" 
                name="eliminar"
                class="w-full bg-red-500 text-white py-3.5 rounded-xl font-bold shadow-lg active:scale-95 transition-transform"
            >
                Eliminar Ficha
            </button>
        </form>
    </div>
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
