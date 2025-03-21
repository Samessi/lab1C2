<?php 
include("base.php"); 

$id = $_GET['id'];
$resultado = $conexion->query("SELECT * FROM equipos WHERE id=$id");
$jugador = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Jugador</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
    <h1>Editar Jugador</h1>
</header>

<main>
    <form action="" method="post" class="form-container">
        <label for="nom">Nombre</label>
        <input type="text" name="nom" id="nom" value="<?php echo $jugador['jug_Nom']; ?>" required>

        <label for="ed">Edad</label>
        <input type="number" name="ed" id="ed" value="<?php echo $jugador['Jug_edad']; ?>" required>

        <label for="pos">Posición</label>
        <input type="text" name="pos" id="pos" value="<?php echo $jugador['Jug_posicion']; ?>" required>

        <label for="nac">Nacionalidad</label>
        <input type="text" name="nac" id="nac" value="<?php echo $jugador['Jug_nacion']; ?>" required>

        <button type="submit" class="save">Guardar</button>
        <a href="index.php" class="btn cancel">Cancelar</a>
    </form>
</main>



<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nombre = $_POST["nom"];
    $edad = $_POST["ed"];
    $posicion = $_POST["pos"];
    $nacionalidad = $_POST["nac"];

    $actualizacion = $conexion->prepare("UPDATE equipos SET jug_Nom=?, Jug_edad=?, Jug_posicion=?, Jug_nacion=? WHERE id=?");
    $actualizacion->bind_param("ssssi", $nombre, $edad, $posicion, $nacionalidad, $id);
    $actualizacion->execute();

    header("Location: index.php");
    exit();
}
?>
<footer>
    <p>&copy; <?php echo date("Y"); ?> FC Barcelona - Todos los derechos reservados.</p>
</footer>
</body>
</html>
