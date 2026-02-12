<?php
require_once '../../modelo/ProgramaModel.php';
require_once '../../modelo/TituloPrograModel.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $programa = new Programa(null, $_POST['prog_denominacion'], $_POST['titpro_id'], $_POST['prog_tipo']);
    Programa::save($programa);
    header('Location: index.php');
    exit;
}

$titulos = TituloPrograma::all();
?>
<!DOCTYPE html>
<html class="light" lang="es">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/>
<title>Crear Programa - SENA</title>
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
            <h1 class="text-white text-xl font-bold leading-tight">Crear Programa</h1>
            <p class="text-white/80 text-xs font-light">Nuevo programa académico</p>
        </div>
    </div>
</header>

<main class="px-5 py-6 pb-32">
    <form method="POST" class="space-y-6">
        <div class="bg-white dark:bg-slate-900 rounded-xl p-5 shadow-sm border border-slate-100 dark:border-slate-800">
            <h2 class="text-xs font-bold text-primary-dark uppercase tracking-wider mb-4">Información del Programa</h2>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
                        Denominación del Programa
                    </label>
                    <input 
                        type="text" 
                        name="prog_denominacion" 
                        required
                        class="w-full bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl py-3 px-4 text-sm focus:ring-2 focus:ring-primary-dark/50 focus:border-primary outline-none transition-all"
                        placeholder="Ej: Análisis y Desarrollo de Software"
                    />
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
                        Título del Programa
                    </label>
                    <select 
                        name="titpro_id" 
                        required
                        class="w-full bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl py-3 px-4 text-sm focus:ring-2 focus:ring-primary-dark/50 focus:border-primary outline-none transition-all"
                    >
                        <option value="">Seleccione un título</option>
                        <?php foreach($titulos as $titulo): ?>
                        <option value="<?= $titulo->getTitproId() ?>"><?= $titulo->getTitproNombre() ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
                        Tipo de Programa
                    </label>
                    <input 
                        type="text" 
                        name="prog_tipo" 
                        required
                        class="w-full bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl py-3 px-4 text-sm focus:ring-2 focus:ring-primary-dark/50 focus:border-primary outline-none transition-all"
                        placeholder="Ej: Tecnólogo, Técnico, Operario"
                    />
                </div>
            </div>
        </div>

        <div class="flex gap-3">
            <button 
                type="submit"
                class="flex-1 bg-primary text-white py-3.5 rounded-xl font-bold shadow-lg shadow-primary/30 active:scale-95 transition-transform"
            >
                Guardar Programa
            </button>
            <a 
                href="index.php"
                class="flex-1 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 py-3.5 rounded-xl font-bold text-center active:scale-95 transition-transform"
            >
                Cancelar
            </a>
        </div>
    </form>
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
