<!DOCTYPE html>
<html lang="es">
<?php
    session_start();

    require "../vendor/autoload.php";
    use Clases\Articulos;
    function mostrarError($m){
        $_SESSION['error']=$m;
        header("Location:crear.php");
    }
    if(isset($_POST['crear'])){
       $nombre=trim($_POST['nombre']);
       $pvp=trim($_POST['pvp']);
       $stock=trim($_POST['stock']);
       if(strlen($nombre)==0 || strlen($pvp)==0 || strlen($stock)==0){
            mostrarError("Rellene los campos!!!");
       }
       $nuevoArticulo=new Articulos();
       $nuevoArticulo->setNombre($nombre);
       $nuevoArticulo->setPvp($pvp);
       $nuevoArticulo->setStock($stock);


    }else{

    
    
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Crear Articulo</title>
</head>

<body style="background-color: lightblue;">
    <h3 class="text-center mt-3">Articulo Nuevo</h3>

    <div class="container mt-3">

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="pvp" class="form-label">PVP</label>
                <input type="number" class="form-control" id="pvp" name="pvp" required>
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" class="form-control" id="stock" name="stock" required>
            </div>
            <button type="submit" class="btn btn-primary mr-4" name="crear">Crear</button>
            <a href="index.php" class="btn btn-info">Inicio</a>
        </form>
    </div>
</body>
<?php  }?>
</html>