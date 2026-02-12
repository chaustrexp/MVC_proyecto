<?php
require_once '../../modelo/InstructorModel.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $instructor = new Instructor(null, $_POST['inst_nombres'], $_POST['inst_apellidos'], $_POST['inst_correo'], $_POST['inst_telefono']);
    Instructor::save($instructor);
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Crear Instructor - SENA</title>
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
                },
                fontFamily: {
                    "display": ["Public Sans", "sans-serif"]
                },
            },
        },
    }
</script>
<style>
    body {
        font-family: 'Public Sans', sans-serif;
        -webkit-tap-highlight-color: transparent;
    }
</style>
</head>
<body class="bg-background-light dark:bg-background-dark font-display text-slate-800 dark:text-slate-100 flex flex-col min-h-screen max-w-md mx-auto shadow-2xl">
<header class="bg-primary text-white pt-4 pb-6 px-5 sticky top-0 z-30 shadow-md">
    <div class="flex items-center gap-3 mb-4">
        <a href="index.php" class="p-1 rounded-full hover:bg-white/10 transition-colors">
            <span class="material-icons">arrow_back</span>
        </a>
        <h1 class="text-xl font-bold tracking-tight">Nuevo Instructor</h1>
    </div>
</header>

<main class="flex-1 overflow-y-auto px-4 pt-4 pb-24">
    <form method="POST" class="space-y-4">
        <div class="bg-white dark:bg-slate-800/50 p-5 rounded-xl shadow-sm border border-slate-200/50 dark:border-slate-700/50">
            <h2 class="text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-4">
                Información Personal
            </h2>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
                        Nombres
                    </label>
                    <input 
                        type="text" 
                        name="inst_nombres" 
                        required
                        class="w-full bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-lg py-2.5 px-4 text-sm focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all"
                        placeholder="Ej: María Lucía"
                    />
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
                        Apellidos
                    </label>
                    <input 
                        type="text" 
                        name="inst_apellidos" 
                        required
                        class="w-full bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-lg py-2.5 px-4 text-sm focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all"
                        placeholder="Ej: Ramírez González"
                    />
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
                        Correo Electrónico
                    </label>
                    <input 
                        type="email" 
                        name="inst_correo" 
                        required
                        class="w-full bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-lg py-2.5 px-4 text-sm focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all"
                        placeholder="instructor@sena.edu.co"
                    />
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
                        Teléfono
                    </label>
                    <input 
                        type="text" 
                        name="inst_telefono" 
                        required
                        class="w-full bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-lg py-2.5 px-4 text-sm focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all"
                        placeholder="300 123 4567"
                    />
                </div>
            </div>
        </div>

        <div class="flex gap-3">
            <button 
                type="submit"
                class="flex-1 bg-primary text-white py-3 rounded-xl font-semibold shadow-lg active:scale-95 transition-transform"
            >
                Guardar
            </button>
            <a 
                href="index.php"
                class="flex-1 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 py-3 rounded-xl font-semibold text-center active:scale-95 transition-transform"
            >
                Cancelar
            </a>
        </div>
    </form>
</main>

<nav class="fixed bottom-0 left-0 right-0 max-w-md mx-auto bg-white dark:bg-slate-900 border-t border-slate-200 dark:border-slate-800 px-6 py-2 flex justify-between items-center z-50 shadow-[0_-4px_10px_rgba(0,0,0,0.05)]">
    <button class="flex flex-col items-center gap-1">
        <span class="material-icons text-primary">groups</span>
        <span class="text-[10px] font-bold text-primary uppercase tracking-tighter">Directorio</span>
    </button>
    <button class="flex flex-col items-center gap-1 text-slate-400 dark:text-slate-500">
        <span class="material-icons">calendar_today</span>
        <span class="text-[10px] font-medium uppercase tracking-tighter">Horario</span>
    </button>
    <button class="flex flex-col items-center gap-1 text-slate-400 dark:text-slate-500">
        <span class="material-icons">inventory_2</span>
        <span class="text-[10px] font-medium uppercase tracking-tighter">Recursos</span>
    </button>
    <button class="flex flex-col items-center gap-1 text-slate-400 dark:text-slate-500">
        <span class="material-icons">settings</span>
        <span class="text-[10px] font-medium uppercase tracking-tighter">Ajustes</span>
    </button>
</nav>
</body>
</html>
