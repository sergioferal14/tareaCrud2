<?php

session_start();
if(!isset($_POST['codigo'])){
    header("Location:index.php");
    die();
}

require "../vendor/autoload.php";
use Clases\Articulos;

$nombre=$_POST['codigo'];
$articulo=new Articulos();
$articulo->setNombre($nombre);
$articulo->delete();
$articulo=null;
$_SESSION["mensaje"]="Articulo borrado correctamente";
header("Location:index.php");


