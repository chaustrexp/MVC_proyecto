<?php
require_once '../../modelo/AsignacionModel.php';

$asignaciones = Asignacion::all();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Asignaciones - SENA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <style>
        * { font-family: 'Inter', sans-serif; }
        body { background: linear-gradient(135deg, #f5f7fa 0%, #e8ecf1 100%); }
        .card { backdrop-filter: blur(10px); }
        .status-badge { animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite; }
        @keyframes pulse { 0%, 100% { opacity: 1; } 50% { opacity: .8; } }
    </style>
</head>
<body class="min-h-screen pb-24">
    <!-- Header -->
    <div class="bg-gradient-to-r from-[#39A900] to-[#2d8400] text-white sticky top-0 z-50 shadow-lg">
        <div class="px-4 py-4">
            <div class="flex items-center justify-between mb-3">
                <div class="flex items-center space-x-3">
                    <span class="material-icons-round text-3xl">calendar_month</span>
                    <div>
                        <h1 class="text-xl font-bold">Asignaciones</h1>
                        <p class="text-xs text-green-100">Gestión de horarios</p>
                    </div>
                </div>
                <button onclick="window.location.href='crear.php'" class="bg-white text-[#39A900] rounded-full p-2 shadow-lg hover:scale-110 transition-transform">
                    <span class="material-icons-round">add</span>
                </button>
            </div>
            <!-- Search Bar -->
            <div class="relative">
                <span class="material-icons-round absolute left-3 top-2.5 text-gray-400">search</span>
                <input type="text" id="searchInput" placeholder="Buscar asignación..." 
                    class="w-full pl-10 pr-4 py-2.5 rounded-xl bg-white/20 backdrop-blur-sm text-white placeholder-green-100 border border-white/30 focus:outline-none focus:ring-2 focus:ring-white/50">
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="px-4 py-6 max-w-6xl mx-auto">
        <div class="grid gap-4" id="asignacionesList">
            <?php foreach($asignaciones as $asignacion): ?>
            <div class="card bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100">
                <div class="p-5">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center space-x-3">
                            <div class="bg-gradient-to-br from-[#39A900] to-[#2d8400] rounded-xl p-3 shadow-md">
                                <span class="material-icons-round text-white text-2xl">assignment</span>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800 text-lg">Asignación #<?= $asignacion->getAsigId() ?></h3>
                                <p class="text-sm text-gray-500">Instructor ID: <?= $asignacion->getInstructorInstId() ?></p>
                            </div>
                        </div>
                        <span class="status-badge bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">Activa</span>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div class="bg-blue-50 rounded-xl p-3">
                            <div class="flex items-center space-x-2 mb-1">
                                <span class="material-icons-round text-blue-600 text-sm">event</span>
                                <span class="text-xs font-semibold text-blue-700">Fecha Inicio</span>
                            </div>
                            <p class="text-sm font-bold text-blue-900"><?= date('d/m/Y', strtotime($asignacion->getAsigFechaIni())) ?></p>
                        </div>
                        <div class="bg-purple-50 rounded-xl p-3">
                            <div class="flex items-center space-x-2 mb-1">
                                <span class="material-icons-round text-purple-600 text-sm">event_available</span>
                                <span class="text-xs font-semibold text-purple-700">Fecha Fin</span>
                            </div>
                            <p class="text-sm font-bold text-purple-900"><?= date('d/m/Y', strtotime($asignacion->getAsigFechaFin())) ?></p>
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-3 mb-4">
                        <div class="text-center bg-gray-50 rounded-lg p-2">
                            <span class="material-icons-round text-gray-600 text-lg">badge</span>
                            <p class="text-xs text-gray-500 mt-1">Ficha</p>
                            <p class="text-sm font-bold text-gray-800"><?= $asignacion->getFichaFichId() ?></p>
                        </div>
                        <div class="text-center bg-gray-50 rounded-lg p-2">
                            <span class="material-icons-round text-gray-600 text-lg">meeting_room</span>
                            <p class="text-xs text-gray-500 mt-1">Ambiente</p>
                            <p class="text-sm font-bold text-gray-800"><?= $asignacion->getAmbienteAmbId() ?></p>
                        </div>
                        <div class="text-center bg-gray-50 rounded-lg p-2">
                            <span class="material-icons-round text-gray-600 text-lg">school</span>
                            <p class="text-xs text-gray-500 mt-1">Competencia</p>
                            <p class="text-sm font-bold text-gray-800"><?= $asignacion->getCompetenciaCompId() ?></p>
                        </div>
                    </div>

                    <div class="flex space-x-2">
                        <a href="ver.php?id=<?= $asignacion->getAsigId() ?>" 
                            class="flex-1 bg-gradient-to-r from-blue-500 to-blue-600 text-white py-2.5 rounded-xl font-semibold text-sm hover:shadow-lg transition-all duration-300 flex items-center justify-center space-x-2">
                            <span class="material-icons-round text-lg">visibility</span>
                            <span>Ver Detalle</span>
                        </a>
                        <a href="editar.php?id=<?= $asignacion->getAsigId() ?>" 
                            class="flex-1 bg-gradient-to-r from-amber-500 to-amber-600 text-white py-2.5 rounded-xl font-semibold text-sm hover:shadow-lg transition-all duration-300 flex items-center justify-center space-x-2">
                            <span class="material-icons-round text-lg">edit</span>
                            <span>Editar</span>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <?php if(empty($asignaciones)): ?>
        <div class="text-center py-16">
            <span class="material-icons-round text-gray-300 text-6xl mb-4">assignment_late</span>
            <p class="text-gray-500 text-lg">No hay asignaciones registradas</p>
            <button onclick="window.location.href='crear.php'" class="mt-4 bg-[#39A900] text-white px-6 py-3 rounded-xl font-semibold hover:bg-[#2d8400] transition-colors">
                Crear Primera Asignación
            </button>
        </div>
        <?php endif; ?>
    </div>

    <!-- Bottom Navigation -->
    <div class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 shadow-lg" style="padding-bottom: env(safe-area-inset-bottom);">
        <div class="grid grid-cols-4 max-w-6xl mx-auto">
            <a href="../instructor/index.php" class="flex flex-col items-center py-3 text-gray-400 hover:text-[#39A900] transition-colors">
                <span class="material-icons-round text-2xl">person</span>
                <span class="text-xs mt-1">Instructores</span>
            </a>
            <a href="../ficha/index.php" class="flex flex-col items-center py-3 text-gray-400 hover:text-[#39A900] transition-colors">
                <span class="material-icons-round text-2xl">badge</span>
                <span class="text-xs mt-1">Fichas</span>
            </a>
            <a href="index.php" class="flex flex-col items-center py-3 text-[#39A900] transition-colors">
                <span class="material-icons-round text-2xl">assignment</span>
                <span class="text-xs mt-1 font-semibold">Asignaciones</span>
            </a>
            <a href="../ambiente/index.php" class="flex flex-col items-center py-3 text-gray-400 hover:text-[#39A900] transition-colors">
                <span class="material-icons-round text-2xl">meeting_room</span>
                <span class="text-xs mt-1">Ambientes</span>
            </a>
        </div>
    </div>

    <script>
        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const cards = document.querySelectorAll('#asignacionesList > div');
            
            cards.forEach(card => {
                const text = card.textContent.toLowerCase();
                card.style.display = text.includes(searchTerm) ? 'block' : 'none';
            });
        });
    </script>
</body>
</html>
