<?php
//actualizar un registro de la base de datos con pdo
include ('conexion.php');
$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$consulta = $PDO->prepare("UPDATE producto SET Nombre = :Nombre, descripcion = :descripcion, imagen = :imagen, precio = :precio, fecha_creacion = :fecha_creacion WHERE ID = :ID");
$consulta->bindParam(':ID', $id);
$consulta->bindParam(':Nombre', $nombre);
$consulta->bindParam(':descripcion', $descripcion);
$consulta->bindParam(':imagen', $imagen);
$consulta->bindParam(':precio', $precio);
$consulta->bindParam(':fecha_creacion', $fecha_creacion);
$id = $_GET['ID'];
$nombre = $_POST['Nombre'];
$descripcion = $_POST['descripcion'];
$imagen = $_POST['imagen'];
$precio = $_POST['precio'];
$fecha_creacion = $_POST['fecha_creacion'];
$consulta->execute();
header("Location: producto.php");
?>