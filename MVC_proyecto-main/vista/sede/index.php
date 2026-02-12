<?php
require_once '../../modelo/SedeModel.php';

$sedes = Sede::all();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Lista de Sedes</title>
</head>
<body>
    <h1>Sedes</h1>
    <a href="crear.php">Crear Nueva Sede</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
        <?php foreach($sedes as $sede): ?>
        <tr>
            <td><?= $sede->getSedeId() ?></td>
            <td><?= $sede->getSedeNombre() ?></td>
            <td>
                <a href="ver.php?id=<?= $sede->getSedeId() ?>">Ver</a>
                <a href="editar.php?id=<?= $sede->getSedeId() ?>">Editar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
