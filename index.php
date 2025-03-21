<?php include "base.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FC Barcelona</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
    <h1>Lista de jugadores</h1>
</header>

<main>
    <a href="agregar.php" class="add">Agregar nuevo jugador</a>

    <table>
        <thead>
            <tr>
                <th>Nombre del jugador</th>
                <th>Edad</th>
                <th>Posición</th>
                <th>Nacionalidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $listado = $conexion->query("SELECT * FROM equipos");
            while ($dato = $listado->fetch_assoc()) {
                echo "<tr>
                        <td>{$dato['jug_Nom']}</td>
                        <td>{$dato['Jug_edad']}</td>
                        <td>{$dato['Jug_posicion']}</td>
                        <td>{$dato['Jug_nacion']}</td>
                        <td>
                            <a href='editar.php?id={$dato['id']}' class='btn edit'>Editar</a>
                            <a href='eliminar.php?id={$dato['id']}' class='btn delete'>Eliminar</a>
                        </td>
                    </tr>";
            } 
            ?>
        </tbody>
    </table>
</main>

<footer>
    <p>&copy; <?php echo date("Y"); ?> FC Barcelona - Todos los derechos reservados.</p>
</footer>

</body>
</html>
