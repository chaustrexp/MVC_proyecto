<?php
require_once '../../modelo/TituloPrograModel.php';

$id = $_GET['id'];
$titulo = TituloPrograma::searchById($id);

if(isset($_POST['eliminar'])){
    TituloPrograma::delete($id);
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Detalle Título - SENA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <style>
        * { font-family: 'Poppins', sans-serif; }
        body { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .glass { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); }
    </style>
</head>
<body class="min-h-screen pb-24">
    <!-- Header -->
    <div class="glass sticky top-0 z-50 shadow-lg">
        <div class="px-6 py-5">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <button onclick="window.location.href='index.php'" 
                        class="w-12 h-12 bg-white border-2 border-purple-200 rounded-xl flex items-center justify-center hover:bg-purple-50 transition-colors">
                        <span class="material-icons-outlined text-purple-600">arrow_back</span>
                    </button>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Detalle del Título</h1>
                        <p class="text-sm text-purple-600 font-semibold">Información Completa</p>
                    </div>
                </div>
                <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center shadow-lg">
                    <span class="material-icons-outlined text-white text-3xl">visibility</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="px-6 py-8 max-w-3xl mx-auto space-y-6">
        <!-- Main Card -->
        <div class="glass rounded-2xl overflow-hidden shadow-xl">
            <div class="bg-gradient-to-br from-purple-500 to-indigo-600 p-8 text-white text-center">
                <div class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <span class="material-icons-outlined text-5xl">school</span>
                </div>
                <h2 class="text-2xl font-bold mb-2"><?= $titulo->getTitproNombre() ?></h2>
                <div class="inline-flex items-center space-x-2 bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full">
                    <span class="material-icons-outlined text-sm">verified</span>
                    <span class="text-sm font-semibold">Título Certificado SENA</span>
                </div>
            </div>
        </div>

        <!-- ID Card -->
        <div class="glass rounded-2xl p-6 shadow-lg">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="w-14 h-14 bg-purple-100 rounded-xl flex items-center justify-center">
                        <span class="material-icons-outlined text-purple-600 text-2xl">tag</span>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Identificador</p>
                        <p class="text-2xl font-bold text-purple-600">#<?= $titulo->getTitproId() ?></p>
                    </div>
                </div>
                <div class="bg-purple-100 text-purple-700 px-4 py-2 rounded-xl font-bold text-sm">
                    ACTIVO
                </div>
            </div>
        </div>

        <!-- Info Card -->
        <div class="glass rounded-2xl p-6 shadow-lg">
            <div class="flex items-start space-x-3 mb-4">
                <div class="w-10 h-10 bg-indigo-100 rounded-xl flex items-center justify-center flex-shrink-0">
                    <span class="material-icons-outlined text-indigo-600">info</span>
                </div>
                <div class="flex-1">
                    <h3 class="font-bold text-gray-800 mb-1">Nombre Completo del Título</h3>
                    <p class="text-gray-600 text-lg leading-relaxed">
                        <?= $titulo->getTitproNombre() ?>
                    </p>
                </div>
            </div>
        </div>

        <!-- Stats Card -->
        <div class="glass rounded-2xl p-6 shadow-lg">
            <h3 class="font-bold text-gray-800 mb-4 flex items-center space-x-2">
                <span class="material-icons-outlined text-purple-600">analytics</span>
                <span>Estadísticas</span>
            </h3>
            <div class="grid grid-cols-3 gap-4">
                <div class="text-center p-4 bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl">
                    <p class="text-3xl font-bold text-blue-600">--</p>
                    <p class="text-xs text-blue-700 font-medium mt-1">Programas</p>
                </div>
                <div class="text-center p-4 bg-gradient-to-br from-green-50 to-green-100 rounded-xl">
                    <p class="text-3xl font-bold text-green-600">--</p>
                    <p class="text-xs text-green-700 font-medium mt-1">Fichas</p>
                </div>
                <div class="text-center p-4 bg-gradient-to-br from-pink-50 to-pink-100 rounded-xl">
                    <p class="text-3xl font-bold text-pink-600">--</p>
                    <p class="text-xs text-pink-700 font-medium mt-1">Estudiantes</p>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="space-y-3">
            <a href="editar.php?id=<?= $titulo->getTitproId() ?>" 
                class="w-full bg-gradient-to-r from-amber-500 to-orange-500 text-white py-4 rounded-xl font-bold text-lg hover:shadow-xl transition-all hover:scale-105 flex items-center justify-center space-x-2">
                <span class="material-icons-outlined">edit</span>
                <span>Editar Título</span>
            </a>
            
            <a href="index.php" 
                class="w-full bg-white border-2 border-gray-300 text-gray-700 py-4 rounded-xl font-bold text-lg hover:bg-gray-50 transition-colors flex items-center justify-center space-x-2">
                <span class="material-icons-outlined">arrow_back</span>
                <span>Volver al Listado</span>
            </a>

            <form method="POST" onsubmit="return confirm('¿Está seguro de eliminar este título? Esta acción no se puede deshacer.')" class="w-full">
                <button type="submit" name="eliminar"
                    class="w-full bg-gradient-to-r from-red-500 to-red-600 text-white py-4 rounded-xl font-bold text-lg hover:shadow-xl transition-all hover:scale-105 flex items-center justify-center space-x-2">
                    <span class="material-icons-outlined">delete</span>
                    <span>Eliminar Título</span>
                </button>
            </form>
        </div>
    </div>

    <!-- Bottom Navigation -->
    <div class="fixed bottom-0 left-0 right-0 glass border-t border-purple-100 shadow-2xl" style="padding-bottom: env(safe-area-inset-bottom);">
        <div class="grid grid-cols-4 max-w-7xl mx-auto">
            <a href="../programa/index.php" class="flex flex-col items-center py-3 text-gray-400 hover:text-purple-600 transition-colors">
                <span class="material-icons-outlined text-2xl">apps</span>
                <span class="text-xs mt-1 font-medium">Programas</span>
            </a>
            <a href="index.php" class="flex flex-col items-center py-3 text-purple-600 transition-colors">
                <span class="material-icons-outlined text-2xl">workspace_premium</span>
                <span class="text-xs mt-1 font-bold">Títulos</span>
            </a>
            <a href="../competencia/index.php" class="flex flex-col items-center py-3 text-gray-400 hover:text-purple-600 transition-colors">
                <span class="material-icons-outlined text-2xl">emoji_events</span>
                <span class="text-xs mt-1 font-medium">Competencias</span>
            </a>
            <a href="../ficha/index.php" class="flex flex-col items-center py-3 text-gray-400 hover:text-purple-600 transition-colors">
                <span class="material-icons-outlined text-2xl">badge</span>
                <span class="text-xs mt-1 font-medium">Fichas</span>
            </a>
        </div>
    </div>
</body>
</html>
