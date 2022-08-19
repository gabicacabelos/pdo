<?php
//eliminar un registro de la base de datos con pdo
include ('conexion.php');

$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$id = $_GET['id'];
$consulta = $PDO->prepare("DELETE FROM producto WHERE id = :id;");
$consulta->bindParam(':id', $id);
$consulta->execute();
$consulta= $PDO->prepare ("ALTER TABLE producto AUTO_INCREMENT = 1");
$consulta->execute();
header("Location: producto.php");
?>