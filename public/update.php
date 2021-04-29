<!DOCTYPE html>
<html lang="es">
<?php
if(!isset($_GET['nombre'])){
    header("Location:index.php");
    die();
}
    $nombre=$_GET['nombre'];
    session_start();

    require "../vendor/autoload.php";
    use Clases\Articulos;

    function mostrarError($m){
        global $nombre;
        $_SESSION['error']=$m;
        header("Location:{$_SERVER['PHP_SELF']}?nombre=$nombre");
        die();
    }

        $nuevoArticulo=new Articulos();
       $nuevoArticulo->setNombre($nombre);
       $datos=$nuevoArticulo->devolverArticulo();
       $datos1=$datos->fetch(PDO::FETCH_OBJ);

    if(isset($_POST['update'])){
       $nombre=trim($_POST['nombre']);
       $pvp=trim($_POST['pvp']);
       $stock=trim($_POST['stock']);
       if(strlen($nombre)==0 || strlen($pvp)==0 || strlen($stock)==0){
            mostrarError("Rellene los campos!!!");
       }
       

    }else{

    
    
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Editar Articulo</title>
</head>

<body style="background-color: lightblue;">
    <h3 class="text-center mt-3">Editando Articulo</h3>

    <div class="container mt-3">

        <form action="<?php echo $_SERVER['PHP_SELF']."?nombre=$nombre" ?>" method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $datos1->nombre ?>" required>
            </div>
            <div class="mb-3">
                <label for="pvp" class="form-label">PVP</label>
                <input type="number" class="form-control" id="pvp" name="pvp" value="<?php echo $datos1->pvp ?>" required>
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" class="form-control" id="stock" name="stock" value="<?php echo $datos1->stock ?>" required>
            </div>
            <button type="submit" class="btn btn-primary mr-4" name="update">Crear</button>
            <a href="index.php" class="btn btn-info">Inicio</a>
        </form>
    </div>
</body>
<?php  }?>
</html>