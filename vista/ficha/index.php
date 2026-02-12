<?php
require_once '../../modelo/FichaModel.php';
$titulo = "Lista de Fichas";
$fichas = Ficha::all();
include_once '../layout/header.php';
?>

<h1>Fichas</h1>
<a href="crear.php" class="button">Crear Nueva Ficha</a>
<table>
    <tr>
        <th>ID</th>
        <th>Programa</th>
        <th>Instructor</th>
        <th>Jornada</th>
        <th>Acciones</th>
    </tr>
    <?php foreach($fichas as $ficha): ?>
    <tr>
        <td><?= $ficha->getFichId() ?></td>
        <td><?= $ficha->getProgId() ?></td>
        <td><?= $ficha->getInstId() ?></td>
        <td><?= $ficha->getFichJornada() ?></td>
        <td>
            <a href="ver.php?id=<?= $ficha->getFichId() ?>">Ver</a> |
            <a href="editar.php?id=<?= $ficha->getFichId() ?>">Editar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php include_once '../layout/footer.php'; ?>
