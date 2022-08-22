<?php
//editando un registro de la base de datos con pdo

include ('conexion.php');
$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$id = $_GET['id'];
$consulta = $PDO->prepare("SELECT * FROM producto WHERE id = :id");
$consulta->bindValue(':id', $id);
$consulta->execute();
$fila = $consulta->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php

$fecha_actual= date("Y-m-d H:i:s");
?>
<div class="container mt-5">
    <div class="row"> 
        <div class="col-md-3">
            <h1>ACTUALIZAR</h1>
            <form action="update.php" method="post">
            <input type="hidden" class="form-control" id= "id" name="id" value="<?php echo $id; ?>">
                <input type="text" class="form-control" name="Nombre" value="<?php echo $fila['Nombre']; ?>" placeholder="Nombre">
                <br>
                <input type="text" class="form-control" name="descripcion" value="<?php echo $fila['descripcion']; ?>" placeholder="Descripcion">
                <br>
                <input type="file" class="form-control" name="imagen" value="<?php echo $fila['imagen']; ?>" placeholder="Imagen">
                <br>
                <input type="number"  class="form-control" name="precio" value="<?php echo $fila['precio']; ?>" placeholder="Precio">
                <br>
                <input type="date" class="form-control" name="fecha_creacion" value="<?php echo $fila['fecha_creacion']; ?>" placeholder="Fecha de creacion">
                <br>
                
                <button type="submit" class="btn btn-primary">Guardar</button>
        
    </form>
</body>
</html>










