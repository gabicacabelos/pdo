<?php
//actualizar un registro de la base de datos con pdo y con id autoincrementable
include ('conexion.php');
$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$id = $_GET['ID'] ?? null;
$nombre = $_POST['Nombre'];
$descripcion = $_POST['descripcion'];
$imagen = $_POST['imagen'];
$precio = $_POST['precio'];
$fecha_creacion = $_POST['fecha_creacion'];
$consulta = $PDO->prepare("UPDATE producto SET Nombre = :Nombre, descripcion = :descripcion, imagen = :imagen, precio = :precio, fecha_creacion = :fecha_creacion WHERE ID = :ID");
$consulta->bindParam(':Nombre', $nombre);
$consulta->bindParam(':descripcion', $descripcion);
$consulta->bindParam(':imagen', $imagen);
$consulta->bindParam(':precio', $precio);
$consulta->bindParam(':fecha_creacion', $fecha_creacion);
$consulta->bindParam(':ID', $id);
if ($nombre == "" ||   $precio == "") {
    echo "Por favor introduzca el nombre y el precio";
} else {
    $consulta->execute();
    header("Location: producto.php");
}  

?>