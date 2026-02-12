<?php
require_once '../../modelo/TituloPrograModel.php';

$id = $_GET['id'];
$titulo = TituloPrograma::searchById($id);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $titulo->setTitproNombre($_POST['titpro_nombre']);
    TituloPrograma::update($titulo);
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Editar Título - SENA</title>
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
                        <h1 class="text-2xl font-bold text-gray-800">Editar Título</h1>
                        <p class="text-sm text-purple-600 font-semibold">ID: <?= $titulo->getTitproId() ?></p>
                    </div>
                </div>
                <div class="w-14 h-14 bg-gradient-to-br from-amber-500 to-orange-500 rounded-2xl flex items-center justify-center shadow-lg">
                    <span class="material-icons-outlined text-white text-3xl">edit</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="px-6 py-8 max-w-3xl mx-auto">
        <form method="POST" class="space-y-6">
            <!-- Main Card -->
            <div class="glass rounded-2xl overflow-hidden shadow-xl">
                <div class="bg-gradient-to-br from-amber-500 to-orange-500 p-6 text-white">
                    <div class="flex items-center space-x-3 mb-2">
                        <span class="material-icons-outlined text-3xl">school</span>
                        <h2 class="text-xl font-bold">Información del Título</h2>
                    </div>
                    <p class="text-orange-100 text-sm">Modifique los datos del título de programa</p>
                </div>
                
                <div class="p-8">
                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            Nombre del Título
                        </label>
                        <input type="text" name="titpro_nombre" value="<?= $titulo->getTitproNombre() ?>" required
                            class="w-full px-5 py-4 bg-white border-2 border-orange-100 rounded-xl focus:outline-none focus:border-orange-400 transition-colors text-lg">
                        <p class="text-xs text-gray-500 mt-2 flex items-center space-x-1">
                            <span class="material-icons-outlined text-sm">info</span>
                            <span>Actualice el nombre del título según sea necesario</span>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Current Info Card -->
            <div class="glass rounded-2xl p-6 shadow-lg border-2 border-amber-200">
                <div class="flex items-start space-x-3">
                    <div class="w-10 h-10 bg-amber-100 rounded-xl flex items-center justify-center flex-shrink-0">
                        <span class="material-icons-outlined text-amber-600">history</span>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-bold text-gray-800 mb-2">Nombre Actual</h3>
                        <p class="text-gray-600 bg-amber-50 px-4 py-3 rounded-lg border border-amber-200">
                            <?= $titulo->getTitproNombre() ?>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex space-x-4">
                <button type="submit" 
                    class="flex-1 bg-gradient-to-r from-amber-500 to-orange-500 text-white py-4 rounded-xl font-bold text-lg hover:shadow-xl transition-all hover:scale-105 flex items-center justify-center space-x-2">
                    <span class="material-icons-outlined">save</span>
                    <span>Actualizar Título</span>
                </button>
                <a href="index.php" 
                    class="px-8 py-4 bg-white border-2 border-gray-300 text-gray-700 rounded-xl font-bold hover:bg-gray-50 transition-colors flex items-center justify-center">
                    <span class="material-icons-outlined">close</span>
                </a>
            </div>
        </form>
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
