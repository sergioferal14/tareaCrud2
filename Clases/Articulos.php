<?php

namespace Clases;

use PDO;
use PDOException;
require "../vendor/autoload.php";
class Articulos extends Conexion
{
    private $nombre;
    private $pvp;
    private $stock;

    public function __construct()
    {
        parent::__construct();
    }

    //-------------CRUD-----------

    public function create()
    {

        $c="insert into articulos(nombre,pvp,stock) value(:n,:p,:s )";
        $stmt = parent::$conexion->prepare($c);
        try {
            $stmt->execute([
                ':n'=>$this->nombre,
                ':p'=>$this->pvp,
                ':s'=>$this->stock
            ]);
        } catch (PDOException $ex) {
            die("Error al crear el articulo:" . $ex->getMessage());
        }
        return $stmt;
    }
    

    public function read()
    {
        $c = "select * from articulos";
        $stmt = parent::$conexion->prepare($c);
        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Error al recuperar todos los datos:" . $ex->getMessage());
        }
        return $stmt;
    }

    public function update()
    {
    }

    public function delete()
    {
        $c = "delete from articulos where nombre=:n";
        $stmt = parent::$conexion->prepare($c);
        try {
            $stmt->execute([
                ':n'=>$this->nombre
            ]);
        } catch (PDOException $ex) {
            die("Error al borrar el articulo:" . $ex->getMessage());
        }
        
    }

    //setters--------------


    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }


    /**
     * Set the value of pvp
     *
     * @return  self
     */
    public function setPvp($pvp)
    {
        $this->pvp = $pvp;

        return $this;
    }

    /**
     * Set the value of stock
     *
     * @return  self
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    public function devolverArticulo(){
        $c="select * from articulos where nombre=:n";
        $stmt = parent::$conexion->prepare($c);
        try {
            $stmt->execute([
                ':n'=>$this->nombre
            ]);
        } catch (PDOException $ex) {
            die("Error al devolver el articulo:" . $ex->getMessage());
        }
        return $stmt;
    }
}
