<?php
require_once '../../modelo/CompetenciaModel.php';

$competencias = Competencia::all();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Lista de Competencias</title>
</head>
<body>
    <h1>Competencias</h1>
    <a href="crear.php">Crear Nueva Competencia</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre Corto</th>
            <th>Horas</th>
            <th>Unidad de Competencia</th>
            <th>Acciones</th>
        </tr>
        <?php foreach($competencias as $competencia): ?>
        <tr>
            <td><?= $competencia->getCompId() ?></td>
            <td><?= $competencia->getCompNombreCorto() ?></td>
            <td><?= $competencia->getCompHoras() ?></td>
            <td><?= $competencia->getCompNombreUnidadCompetencia() ?></td>
            <td>
                <a href="ver.php?id=<?= $competencia->getCompId() ?>">Ver</a>
                <a href="editar.php?id=<?= $competencia->getCompId() ?>">Editar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
