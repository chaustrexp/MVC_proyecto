<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($titulo) ? $titulo : 'Sistema de Gestión' ?></title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <h2>Sistema de Gestión</h2>
            </div>
            <ul class="menu">
                <li><a href="../../index.php">Inicio</a></li>
                <li><a href="../ambiente/index.php">Ambientes</a></li>
                <li><a href="../sede/index.php">Sedes</a></li>
                <li><a href="../instructor/index.php">Instructores</a></li>
                <li><a href="../competencia/index.php">Competencias</a></li>
                <li><a href="../programa/index.php">Programas</a></li>
                <li><a href="../ficha/index.php">Fichas</a></li>
                <li><a href="../asignacion/index.php">Asignaciones</a></li>
            </ul>
        </nav>
    </header>
    <main>
