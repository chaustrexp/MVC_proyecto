<?php
require_once '../../modelo/InstructorModel.php';

$instructores = Instructor::all();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Lista de Instructores</title>
</head>
<body>
    <h1>Instructores</h1>
    <a href="crear.php">Crear Nuevo Instructor</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </tr>
        <?php foreach($instructores as $instructor): ?>
        <tr>
            <td><?= $instructor->getInstId() ?></td>
            <td><?= $instructor->getInstNombres() ?></td>
            <td><?= $instructor->getInstApellidos() ?></td>
            <td><?= $instructor->getInstCorreo() ?></td>
            <td><?= $instructor->getInstTelefono() ?></td>
            <td>
                <a href="ver.php?id=<?= $instructor->getInstId() ?>">Ver</a>
                <a href="editar.php?id=<?= $instructor->getInstId() ?>">Editar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
