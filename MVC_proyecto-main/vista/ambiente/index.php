<?php
require_once '../../modelo/AmbienteModel.php';
require_once '../../modelo/SedeModel.php';
$titulo = "Lista de Ambientes";
$ambientes = Ambiente::all();
$sedes = Sede::all();
include_once '../layout/header.php';
?>

<h1>Ambientes</h1>
<a href="crear.php" class="button">Crear Nuevo Ambiente</a>
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Sede</th>
        <th>Acciones</th>
    </tr>
    <?php foreach($ambientes as $ambiente): ?>
    <tr>
        <td><?= $ambiente->getAmbId() ?></td>
        <td><?= $ambiente->getAmbNombre() ?></td>
        <td><?= $ambiente->getSedeId() ?></td>
        <td>
            <a href="ver.php?id=<?= $ambiente->getAmbId() ?>">Ver</a> |
            <a href="editar.php?id=<?= $ambiente->getAmbId() ?>">Editar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php include_once '../layout/footer.php'; ?>
