<?php include "base.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <label for="">Nombre</label>
    <input type="" name="nom" id="">
    <label for="">Edad</label>
    <input type="" name="ed" id="">
    <label for="">Posicion</label>
    <input type="" name="pos" id="">
    <label for="">Nacionalidad</label>
    <input type="" name="nac" id="">


    <button type="submit">Registrar</button>
</form>
<?php
  if($_SERVER['REQUEST_METHOD']=="POST"){
    $nombre = $_POST["nom"];
    $Edad = $_POST["ed"];
    $Posicion = $_POST["pos"];
    $Nacionalidad = $_POST["nac"];

    $insercion = $conexion->prepare("INSERT INTO equipos(jug_Nom, Jug_edad, Jug_posicion, Jug_nacion) 
                     VALUES(?,?,?,?)");
                     $insercion->bind_param("ssss", $nombre, $Edad, $Posicion,$Nacionalidad);
                     $insercion->execute();
                     header(header: "Location:index.php");
  }


?>
</body>
</html>