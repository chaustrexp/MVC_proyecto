<?php
require_once '../../modelo/InstructorModel.php';

$id = $_GET['id'];
$instructor = Instructor::searchById($id);

if(isset($_POST['eliminar'])){
    Instructor::delete($id);
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Ver Instructor - SENA</title>
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
        <h1 class="text-xl font-bold tracking-tight">Perfil del Instructor</h1>
    </div>
</header>

<main class="flex-1 overflow-y-auto px-4 pt-4 pb-24 space-y-4">
    <!-- Card Principal -->
    <div class="bg-white dark:bg-slate-800/50 p-5 rounded-xl shadow-sm border border-slate-200/50 dark:border-slate-700/50">
        <div class="flex gap-4 mb-4">
            <div class="w-16 h-16 rounded-lg bg-primary/10 flex items-center justify-center text-primary flex-shrink-0">
                <span class="material-icons text-4xl">person</span>
            </div>
            <div class="flex-1">
                <h2 class="font-bold text-lg text-slate-900 dark:text-white leading-tight">
                    <?= $instructor->getInstNombres() ?> <?= $instructor->getInstApellidos() ?>
                </h2>
                <p class="text-[10px] text-slate-500 mt-1 uppercase font-semibold">
                    ID: <?= $instructor->getInstId() ?>
                </p>
            </div>
        </div>
        
        <div class="space-y-3 pt-4 border-t border-slate-100 dark:border-slate-700">
            <div>
                <span class="text-xs uppercase font-bold text-slate-400 block mb-1">Nombres</span>
                <span class="text-base font-semibold text-slate-800 dark:text-white">
                    <?= $instructor->getInstNombres() ?>
                </span>
            </div>
            
            <div>
                <span class="text-xs uppercase font-bold text-slate-400 block mb-1">Apellidos</span>
                <span class="text-base font-semibold text-slate-800 dark:text-white">
                    <?= $instructor->getInstApellidos() ?>
                </span>
            </div>
            
            <div>
                <span class="text-xs uppercase font-bold text-slate-400 block mb-1">Correo Electrónico</span>
                <a href="mailto:<?= $instructor->getInstCorreo() ?>" class="text-base font-semibold text-primary hover:underline">
                    <?= $instructor->getInstCorreo() ?>
                </a>
            </div>
            
            <div>
                <span class="text-xs uppercase font-bold text-slate-400 block mb-1">Teléfono</span>
                <a href="tel:<?= $instructor->getInstTelefono() ?>" class="text-base font-semibold text-primary hover:underline">
                    <?= $instructor->getInstTelefono() ?>
                </a>
            </div>
        </div>
    </div>

    <!-- Botones de Contacto -->
    <div class="flex gap-2">
        <a 
            href="mailto:<?= $instructor->getInstCorreo() ?>"
            class="flex-1 flex items-center justify-center gap-2 py-3 bg-slate-50 dark:bg-slate-700 rounded-lg text-sm font-medium text-slate-600 dark:text-slate-300 active:scale-95 transition-transform"
        >
            <span class="material-icons text-base">email</span>
            Email
        </a>
        <a 
            href="tel:<?= $instructor->getInstTelefono() ?>"
            class="flex-1 flex items-center justify-center gap-2 py-3 bg-slate-50 dark:bg-slate-700 rounded-lg text-sm font-medium text-slate-600 dark:text-slate-300 active:scale-95 transition-transform"
        >
            <span class="material-icons text-base">phone</span>
            Llamar
        </a>
    </div>

    <!-- Botones de Acción -->
    <div class="space-y-3">
        <a 
            href="editar.php?id=<?= $instructor->getInstId() ?>"
            class="block w-full bg-primary text-white py-3 rounded-xl font-semibold text-center shadow-lg active:scale-95 transition-transform"
        >
            Editar Instructor
        </a>
        
        <a 
            href="index.php"
            class="block w-full bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 py-3 rounded-xl font-semibold text-center active:scale-95 transition-transform"
        >
            Volver al Directorio
        </a>
        
        <form method="POST" onsubmit="return confirm('¿Está seguro de eliminar este instructor?')">
            <button 
                type="submit" 
                name="eliminar"
                class="w-full bg-red-500 text-white py-3 rounded-xl font-semibold shadow-lg active:scale-95 transition-transform"
            >
                Eliminar Instructor
            </button>
        </form>
    </div>
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
