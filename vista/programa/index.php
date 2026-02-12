<?php
require_once '../../modelo/ProgramaModel.php';
require_once '../../modelo/TituloPrograModel.php';

$programas = Programa::all();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Lista de Programas</title>
</head>
<body>
    <h1>Programas</h1>
    <a href="crear.php">Crear Nuevo Programa</a>
    <table border="1">
        <tr>
            <th>Código</th>
            <th>Denominación</th>
            <th>Título</th>
            <th>Tipo</th>
            <th>Acciones</th>
        </tr>
        <?php foreach($programas as $programa): ?>
        <tr>
            <td><?= $programa->getProgCodigo() ?></td>
            <td><?= $programa->getProgDenominacion() ?></td>
            <td><?= $programa->getTitproId() ?></td>
            <td><?= $programa->getProgTipo() ?></td>
            <td>
                <a href="ver.php?id=<?= $programa->getProgCodigo() ?>">Ver</a>
                <a href="editar.php?id=<?= $programa->getProgCodigo() ?>">Editar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
