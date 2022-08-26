<?php
//buscar un registro de la base de datos y traerlo a un formulario con pdo

 include ('conexion.php');
 
if(isset($_GET['buscador'])){
    $buscador = $_GET['buscador'];
    $buscar = $_GET['buscar'];
    $consulta = $PDO->prepare("SELECT * FROM producto WHERE Nombre LIKE '%$buscar%'");
    $consulta->execute();
    $resultado = $consulta->fetchAll();
    if($resultado){
        foreach($resultado as $dato){
             $dato['id'] . ' - ' . $dato['Nombre'] . ' - ' . $dato['descripcion'] . ' - ' . $dato['imagen'] . ' - ' . $dato['precio'] . ' - ' . $dato['fecha_creacion'] . '<br>';
           
        }
    }else{
       //mostar mensaje de error con html
        echo "<script>alert('No se encontraron resultados'); window.location.href='producto.php';</script>";

    }

}

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


<div class="container mt-5">
    
        <div class="col-md-7">
            <h1>BUSQUEDAS</h1>
            <form action="producto.php" method="post">
            <table>
                <tr>
                    <td>
                    <tbody>
                    <?php foreach($resultado as  $dato): ?>
                    <tr>
                        <td><?php echo $dato['id']; ?></td>
                        <td><?php echo $dato['Nombre']; ?></td>
                        <td><?php echo $dato['descripcion']; ?></td>
                        <td><?php echo $dato['imagen']; ?></td>
                        <td><?php echo $dato['precio']; ?></td>
                        <td><?php echo $dato['fecha_creacion']; ?></td>
                        
                        
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </td>
        </tr>
    </table>
    <button type="submit" class="btn btn-primary">Volver</button>
            </form>
        
    </div>
</div>
</body>
</html>

                
        
    
   
