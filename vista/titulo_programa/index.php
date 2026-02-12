<?php
require_once '../../modelo/TituloPrograModel.php';

$titulos = TituloPrograma::all();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Títulos de Programa - SENA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <style>
        * { font-family: 'Poppins', sans-serif; }
        body { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .glass { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); }
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-5px); box-shadow: 0 20px 40px rgba(0,0,0,0.15); }
    </style>
</head>
<body class="min-h-screen pb-24">
    <!-- Header -->
    <div class="glass sticky top-0 z-50 shadow-lg">
        <div class="px-6 py-5">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center space-x-4">
                    <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg">
                        <span class="material-icons-outlined text-white text-3xl">school</span>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Títulos de Programa</h1>
                        <p class="text-sm text-purple-600 font-semibold">Gestión Académica SENA</p>
                    </div>
                </div>
                <button onclick="window.location.href='crear.php'" 
                    class="w-12 h-12 bg-gradient-to-br from-purple-500 to-indigo-600 text-white rounded-xl shadow-lg hover:shadow-xl transition-all hover:scale-110">
                    <span class="material-icons-outlined">add</span>
                </button>
            </div>
            
            <!-- Search Bar -->
            <div class="relative">
                <span class="material-icons-outlined absolute left-4 top-3.5 text-gray-400">search</span>
                <input type="text" id="searchInput" placeholder="Buscar título de programa..." 
                    class="w-full pl-12 pr-4 py-3.5 bg-white border-2 border-purple-100 rounded-xl focus:outline-none focus:border-purple-400 transition-colors">
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="px-6 py-8 max-w-7xl mx-auto">
        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
            <div class="glass rounded-2xl p-5 shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Total Títulos</p>
                        <p class="text-3xl font-bold text-purple-600"><?= count($titulos) ?></p>
                    </div>
                    <div class="w-14 h-14 bg-purple-100 rounded-xl flex items-center justify-center">
                        <span class="material-icons-outlined text-purple-600 text-2xl">workspace_premium</span>
                    </div>
                </div>
            </div>
            <div class="glass rounded-2xl p-5 shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Técnicos</p>
                        <p class="text-3xl font-bold text-indigo-600">--</p>
                    </div>
                    <div class="w-14 h-14 bg-indigo-100 rounded-xl flex items-center justify-center">
                        <span class="material-icons-outlined text-indigo-600 text-2xl">engineering</span>
                    </div>
                </div>
            </div>
            <div class="glass rounded-2xl p-5 shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Tecnólogos</p>
                        <p class="text-3xl font-bold text-pink-600">--</p>
                    </div>
                    <div class="w-14 h-14 bg-pink-100 rounded-xl flex items-center justify-center">
                        <span class="material-icons-outlined text-pink-600 text-2xl">military_tech</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Titles Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="titulosList">
            <?php foreach($titulos as $titulo): ?>
            <div class="glass rounded-2xl overflow-hidden shadow-lg card-hover">
                <div class="bg-gradient-to-br from-purple-500 to-indigo-600 p-6 text-white">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                            <span class="material-icons-outlined text-2xl">school</span>
                        </div>
                        <span class="bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold">
                            ID: <?= $titulo->getTitproId() ?>
                        </span>
                    </div>
                    <h3 class="text-lg font-bold leading-tight"><?= $titulo->getTitproNombre() ?></h3>
                </div>
                
                <div class="p-5">
                    <div class="flex items-center space-x-2 mb-4 text-sm text-gray-600">
                        <span class="material-icons-outlined text-lg">verified</span>
                        <span class="font-medium">Título Certificado SENA</span>
                    </div>
                    
                    <div class="flex space-x-2">
                        <a href="ver.php?id=<?= $titulo->getTitproId() ?>" 
                            class="flex-1 bg-gradient-to-r from-blue-500 to-blue-600 text-white py-2.5 rounded-xl font-semibold text-sm hover:shadow-lg transition-all flex items-center justify-center space-x-1">
                            <span class="material-icons-outlined text-lg">visibility</span>
                            <span>Ver</span>
                        </a>
                        <a href="editar.php?id=<?= $titulo->getTitproId() ?>" 
                            class="flex-1 bg-gradient-to-r from-amber-500 to-orange-500 text-white py-2.5 rounded-xl font-semibold text-sm hover:shadow-lg transition-all flex items-center justify-center space-x-1">
                            <span class="material-icons-outlined text-lg">edit</span>
                            <span>Editar</span>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <?php if(empty($titulos)): ?>
        <div class="glass rounded-2xl p-16 text-center shadow-lg">
            <span class="material-icons-outlined text-gray-300 text-8xl mb-4">school_off</span>
            <p class="text-gray-500 text-xl mb-6">No hay títulos de programa registrados</p>
            <button onclick="window.location.href='crear.php'" 
                class="bg-gradient-to-r from-purple-500 to-indigo-600 text-white px-8 py-4 rounded-xl font-bold text-lg hover:shadow-xl transition-all">
                Crear Primer Título
            </button>
        </div>
        <?php endif; ?>
    </div>

    <!-- Floating Action Button -->
    <button onclick="window.location.href='crear.php'" 
        class="fixed right-6 bottom-24 w-16 h-16 bg-gradient-to-br from-purple-500 to-indigo-600 text-white rounded-full shadow-2xl hover:shadow-3xl transition-all hover:scale-110 z-40">
        <span class="material-icons-outlined text-3xl">add</span>
    </button>

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

    <script>
        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const cards = document.querySelectorAll('#titulosList > div');
            
            cards.forEach(card => {
                const text = card.textContent.toLowerCase();
                card.style.display = text.includes(searchTerm) ? 'block' : 'none';
            });
        });
    </script>
</body>
</html>
