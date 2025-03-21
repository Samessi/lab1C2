<?php include("base.php"); 

   $id = $_GET['id'];
   $conexion->query(query: "DELETE FROM equipos
                    WHERE id=$id");
    header(header: "Location:index.php");
?>