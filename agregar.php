<?php include "base.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Jugador</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
    <h1>Agregar Nuevo Jugador</h1>
</header>

<main>
    <form action="" method="post" class="form-container">
        <label for="nom">Nombre</label>
        <input type="text" name="nom" id="nom" required>

        <label for="ed">Edad</label>
        <input type="number" name="ed" id="ed" required>

        <label for="pos">Posición</label>
        <input type="text" name="pos" id="pos" required>

        <label for="nac">Nacionalidad</label>
        <input type="text" name="nac" id="nac" required>

        <button type="submit" class="btn add">Registrar</button>
        <a href="index.php" class="btn cancel">Cancelar</a>
    </form>
</main>

<footer>
    <p>&copy; <?php echo date("Y"); ?> FC Barcelona - Todos los derechos reservados.</p>
</footer>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nombre = $_POST["nom"];
    $edad = $_POST["ed"];
    $posicion = $_POST["pos"];
    $nacionalidad = $_POST["nac"];

    $insercion = $conexion->prepare("INSERT INTO equipos(jug_Nom, Jug_edad, Jug_posicion, Jug_nacion) 
                                     VALUES(?,?,?,?)");
    $insercion->bind_param("ssss", $nombre, $edad, $posicion, $nacionalidad);
    $insercion->execute();
    header("Location: index.php");
    exit();
}
?>

</body>
</html>
