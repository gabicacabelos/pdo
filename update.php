<?php
//actualizar un registro de la base de datos con pdo y con id autoincrementable
include ('conexion.php');
$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$id = $_GET['id'];
$nombre = $_GET['Nombre'];
$descripcion = $_GET['descripcion'];
$imagen = $_GET['imagen'];
$precio = $_GET['precio'];
$fecha_creacion = $_GET['fecha_creacion'];
$consulta = $PDO->prepare("UPDATE producto SET Nombre = :Nombre, descripcion = :descripcion, imagen = :imagen, precio = :precio, fecha_creacion = :fecha_creacion WHERE id = :id");
$consulta->bindParam(':Nombre', $nombre);
$consulta->bindParam(':descripcion', $descripcion);
$consulta->bindParam(':imagen', $imagen);
$consulta->bindParam(':precio', $precio);
$consulta->bindParam(':fecha_creacion', $fecha_creacion);
$consulta->bindParam(':id', $id);
if ($nombre == "" ||   $precio == "") {
    echo "Por favor introduzca el nombre y el precio";
} else {
    $consulta->execute();
    header("Location: producto.php");
}  

?>