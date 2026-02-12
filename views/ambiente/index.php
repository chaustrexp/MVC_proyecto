<?php
require_once 'model/HistoriaUsuario.php';

$titulo = 'Ambiente - Historias de Usuario';
$titulo_pagina = 'Gestión de Ambiente';
$action = 'ambiente';

$historiaModel = new HistoriaUsuario($conn);
$resultado = $historiaModel->obtenerTodas();

include 'views/layout/header.php';
?>

<div class="card">
    <div class="card-header">
        <h2>Historias de Usuario - Ambiente</h2>
        <a href="index.php?action=ambiente_crear" class="btn btn-success">➕ Nueva Historia</a>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Rol</th>
                    <th>Funcionalidad</th>
                    <th>Descripción</th>
                    <th>Prioridad</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($resultado) > 0): ?>
                    <?php while ($historia = mysqli_fetch_assoc($resultado)): ?>
                        <tr>
                            <td><?php echo $historia['id']; ?></td>
                            <td><?php echo htmlspecialchars($historia['rol']); ?></td>
                            <td><?php echo htmlspecialchars($historia['funcionalidad']); ?></td>
                            <td><?php echo substr(htmlspecialchars($historia['descripcion']), 0, 50) . '...'; ?></td>
                            <td>
                                <span class="badge badge-<?php echo strtolower($historia['prioridad']); ?>">
                                    <?php echo $historia['prioridad']; ?>
                                </span>
                            </td>
                            <td>
                                <span class="badge badge-<?php echo strtolower($historia['estado']); ?>">
                                    <?php echo $historia['estado']; ?>
                                </span>
                            </td>
                            <td><?php echo date('d/m/Y', strtotime($historia['fecha_creacion'])); ?></td>
                            <td>
                                <div class="acciones">
                                    <a href="index.php?action=ambiente_ver&id=<?php echo $historia['id']; ?>" class="btn btn-primary btn-sm">Ver</a>
                                    <a href="index.php?action=ambiente_editar&id=<?php echo $historia['id']; ?>" class="btn btn-secondary btn-sm">Editar</a>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" style="text-align: center; padding: 30px;">
                            No hay historias de usuario registradas. 
                            <a href="index.php?action=ambiente_crear">Crear la primera historia</a>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'views/layout/footer.php'; ?>
