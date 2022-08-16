<?php
//conectar a la base de datos producto mediante pdo y mostrar los datos
$PDO= new PDO("mysql:host=localhost;port=3306; dbname=crud_productos", "root", "");
$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$consulta = $PDO->prepare("SELECT * FROM producto order by ID asc");
$consulta->execute();
$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRODUCTOS</title>
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
            <h1>DATOS DEL PRODUCTO</h1>
            <form action="crear.php" method="post" >
                
                   
                    <input type="text" class="form-control" name="Nombre" required placeholder="Nombre">
                    <br>
                    <input type="text" class="form-control" name="descripcion"  placeholder="Descripcion">
                    <br>
                    <input type="file" class="form-control" name="imagen"  placeholder="Imagen">
                    <br>
                    <input type="number"  class="form-control" name="precio" required  placeholder="Precio">
                    <br>
                    <input type="text" class="form-control" name="fecha_creacion" value="<?php echo $fecha_actual?>" placeholder="Fecha de creacion">
                <br> 
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>

        </div>
        <div class="col-md-8">
            <H1>TABLA DE PRODUCTOS</H1>
            <table class="table">
                <thead class="thead">
                    <tr>
                        <th>ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th>&nbsp;Nombre</th>
                        <th>Descripcion</th>
                        <th>Imagen</th>
                        <th>Precio</th>
                        <th>Fecha de creacion</th>
                        
                        
                        
                        <th>&nbsp;&nbsp;&nbsp;&nbsp;🖥️</th>
                        
                        
                        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;⚠️</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($resultado as  $fila): ?>
                    <tr>
                        <td><?php echo $fila['ID']; ?></td>
                        <td><?php echo $fila['Nombre']; ?></td>
                        <td><?php echo $fila['descripcion']; ?></td>
                        <td><?php echo $fila['imagen']; ?></td>
                        <td><?php echo $fila['precio']; ?></td>
                        <td><?php echo $fila['fecha_creacion']; ?></td>
                        <td><a href="editar.php?ID=<?php echo $fila['ID']; ?>"class="btn btn-info">Editar</a></td>
                        <td><a href="eliminar.php?ID=<?php echo $fila['ID']; ?>"class="btn btn-danger">Eliminar</a></td>
                        
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

