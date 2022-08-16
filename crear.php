<?php
//crear un registro en la base de datos mediante pdo

include ('conexion.php');
//$PDO= new PDO("mysql:host=localhost;port=3306; dbname=crud_productos", "root", "");
$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$consulta = $PDO->prepare("INSERT INTO producto (Nombre, descripcion, imagen, precio, fecha_creacion) VALUES (:Nombre, :descripcion, :imagen, :precio, :fecha_creacion) order by ID asc");
$consulta->bindParam(':Nombre', $nombre);
$consulta->bindParam(':descripcion', $descripcion);
$consulta->bindParam(':imagen', $imagen);
$consulta->bindParam(':precio', $precio);
$consulta->bindParam(':fecha_creacion', $fecha_creacion);
$nombre = $_POST['Nombre'];
$descripcion = $_POST['descripcion'];
$imagen = $_POST['imagen'];
$precio = $_POST['precio'];
$fecha_creacion = $_POST['fecha_creacion'];
$consulta->execute();
header("Location: producto.php");


?>


