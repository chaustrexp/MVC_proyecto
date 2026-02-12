<?php
require_once '../../modelo/AsignacioDetalleModel.php';

$detalles = AsignacionDetalle::all();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Detalles de Asignación</title>
</head>
<body>
    <h1>Detalles de Asignación</h1>
    <a href="crear.php">Crear Nuevo Detalle</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>ID Asignación</th>
            <th>Hora Inicio</th>
            <th>Hora Fin</th>
            <th>Acciones</th>
        </tr>
        <?php foreach($detalles as $detalle): ?>
        <tr>
            <td><?= $detalle->getDetasigId() ?></td>
            <td><?= $detalle->getAsigId() ?></td>
            <td><?= $detalle->getDetasigHoraIni() ?></td>
            <td><?= $detalle->getDetasigHoraFin() ?></td>
            <td>
                <a href="ver.php?id=<?= $detalle->getDetasigId() ?>">Ver</a>
                <a href="editar.php?id=<?= $detalle->getDetasigId() ?>">Editar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
