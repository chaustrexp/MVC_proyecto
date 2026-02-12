<?php
require_once '../../modelo/ProgramaModel.php';
require_once '../../modelo/TituloPrograModel.php';

$id = $_GET['id'];
$programa = Programa::searchById($id);
$titulo = TituloPrograma::searchById($programa->getTitproId());

if(isset($_POST['eliminar'])){
    Programa::delete($id);
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html class="light" lang="es">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/>
<title>Ver Programa - SENA</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
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
        -webkit-tap-highlight-color: transparent;
    }
</style>
</head>
<body class="font-display bg-background-light dark:bg-background-dark text-slate-800 dark:text-slate-100 min-h-screen">
<header class="bg-primary sticky top-0 z-50 shadow-md">
    <div class="px-6 py-4 flex items-center gap-3">
        <a href="index.php" class="bg-white/20 p-2 rounded-full text-white hover:bg-white/30 transition-colors">
            <span class="material-icons">arrow_back</span>
        </a>
        <div>
            <h1 class="text-white text-xl font-bold leading-tight">Detalle del Programa</h1>
            <p class="text-white/80 text-xs font-light">Información completa</p>
        </div>
    </div>
</header>

<main class="px-5 py-6 pb-32 space-y-6">
    <!-- Card Principal -->
    <div class="bg-white dark:bg-slate-900 rounded-xl p-5 shadow-sm border border-slate-100 dark:border-slate-800 relative overflow-hidden">
        <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-primary-dark"></div>
        
        <div class="flex justify-between items-start mb-4">
            <span class="bg-primary-dark/10 text-primary-dark dark:text-primary px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider">
                <?= $programa->getProgTipo() ?>
            </span>
            <span class="text-slate-400 text-[11px] font-medium flex items-center gap-1">
                <span class="material-icons text-xs">fingerprint</span>
                <?= $programa->getProgCodigo() ?>
            </span>
        </div>
        
        <h2 class="text-slate-800 dark:text-slate-100 font-bold text-xl leading-tight mb-2">
            <?= $programa->getProgDenominacion() ?>
        </h2>
        
        <p class="text-slate-500 dark:text-slate-400 text-sm mb-4">
            Título: <?= $titulo->getTitproNombre() ?>
        </p>
        
        <div class="space-y-3 pt-4 border-t border-slate-50 dark:border-slate-800">
            <div>
                <span class="text-xs uppercase font-bold text-slate-400 block mb-1">Código</span>
                <span class="text-base font-semibold text-slate-800 dark:text-white">#<?= $programa->getProgCodigo() ?></span>
            </div>
            
            <div>
                <span class="text-xs uppercase font-bold text-slate-400 block mb-1">Denominación</span>
                <span class="text-base font-semibold text-slate-800 dark:text-white"><?= $programa->getProgDenominacion() ?></span>
            </div>
            
            <div>
                <span class="text-xs uppercase font-bold text-slate-400 block mb-1">Tipo</span>
                <span class="bg-primary/10 text-primary text-xs font-bold px-3 py-1.5 rounded-lg border border-primary/20 inline-block">
                    <?= $programa->getProgTipo() ?>
                </span>
            </div>
        </div>
    </div>

    <!-- Botones de Acción -->
    <div class="space-y-3">
        <a 
            href="editar.php?id=<?= $programa->getProgCodigo() ?>"
            class="block w-full bg-primary text-white py-3.5 rounded-xl font-bold text-center shadow-lg shadow-primary/30 active:scale-95 transition-transform"
        >
            Editar Programa
        </a>
        
        <a 
            href="index.php"
            class="block w-full bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 py-3.5 rounded-xl font-bold text-center active:scale-95 transition-transform"
        >
            Volver al Listado
        </a>
        
        <form method="POST" onsubmit="return confirm('¿Está seguro de eliminar este programa?')">
            <button 
                type="submit" 
                name="eliminar"
                class="w-full bg-red-500 text-white py-3.5 rounded-xl font-bold shadow-lg shadow-red-500/30 active:scale-95 transition-transform"
            >
                Eliminar Programa
            </button>
        </form>
    </div>
</main>

<nav class="fixed bottom-0 left-0 right-0 bg-white/90 dark:bg-slate-900/90 backdrop-blur-lg border-t border-slate-200 dark:border-slate-800 z-50">
    <div class="flex items-center justify-around h-20 px-4">
        <button class="flex flex-col items-center gap-1 text-primary">
            <span class="material-icons">school</span>
            <span class="text-[10px] font-medium">Programas</span>
        </button>
        <button class="flex flex-col items-center gap-1 text-slate-400 dark:text-slate-500">
            <span class="material-icons">event_note</span>
            <span class="text-[10px] font-medium">Horarios</span>
        </button>
        <button class="flex flex-col items-center gap-1 text-slate-400 dark:text-slate-500">
            <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-white -mt-10 shadow-lg shadow-primary/40 border-4 border-white dark:border-slate-900">
                <span class="material-icons">add</span>
            </div>
            <span class="text-[10px] font-medium">Nuevo</span>
        </button>
        <button class="flex flex-col items-center gap-1 text-slate-400 dark:text-slate-500">
            <span class="material-icons">analytics</span>
            <span class="text-[10px] font-medium">Recursos</span>
        </button>
        <button class="flex flex-col items-center gap-1 text-slate-400 dark:text-slate-500">
            <span class="material-icons">person_outline</span>
            <span class="text-[10px] font-medium">Perfil</span>
        </button>
    </div>
</nav>
</body>
</html>
