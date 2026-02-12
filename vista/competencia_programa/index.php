<?php
require_once '../../modelo/CompetenciaPrograModel.php';

$competenciasPrograma = CompetenciaPrograma::all();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Competencias por Programa</title>
</head>
<body>
    <h1>Competencias por Programa</h1>
    <a href="crear.php">Asignar Competencia a Programa</a>
    <table border="1">
        <tr>
            <th>ID Programa</th>
            <th>ID Competencia</th>
            <th>Acciones</th>
        </tr>
        <?php foreach($competenciasPrograma as $cp): ?>
        <tr>
            <td><?= $cp->getProgId() ?></td>
            <td><?= $cp->getCompId() ?></td>
            <td>
                <a href="ver.php?prog_id=<?= $cp->getProgId() ?>&comp_id=<?= $cp->getCompId() ?>">Ver</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
