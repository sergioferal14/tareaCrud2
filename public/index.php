<?php

require "../vendor/autoload.php";

use Clases\Articulos;

$losArticulos = new Articulos();
$datos = $losArticulos->read();
$losArticulos = null;

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Artiulos</title>
</head>

<body style="background-color: lightblue;">
    <h3 class="text-center mt-3">Gestion Articulos</h3>

    <div class="container mt-3">
        <a href="crear.php" class="btn btn-success my-3">Crear Articulo</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">PVP</th>
                    <th scope="col">Stock</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($fila = $datos->fetch(PDO::FETCH_OBJ)) {


                    echo <<<TXT
                <tr>
                    <th scope="row">{$fila->nombre}</th>
                    <td>{$fila->pvp}</td>
                    <td>{$fila->stock}</td>
                    <td>
                    <form name='a' action="borrar.php" method='POST' class='form-inline'>
                    <input type="hidden" name="codigo" value="{$fila->nombre}"/>
                    <a href="update.php?id={$fila->nombre}" class="btn btn-warning mr-3">Editar</a>
                    <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                    </td>
                </tr>
                TXT;
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>