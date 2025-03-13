<?php

namespace App\Models;
use App\Models\DBAbstractModel;

class Animales extends DBAbstractModel{
    private static $instancia;
    // Patron singleton, no puedo tener dos objetos de la clase usuario
    public static function getInstancia()
    {
        if (!isset(self::$instancia)) {
            $miClase = __CLASS__;
            self::$instancia = new $miClase;
        }
        return self::$instancia;
    }

    public function __construct(){

    }

    private $id;

    private $nombre;

    private $categoria_id;

    private $foto;

    //Obtenemos los setters dde las variables
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setCategoria_id($categoria_id){
        $this->categoria_id = $categoria_id;
    }

    public function setFoto($foto){
        $this->foto = $foto;
    }

    public function get(){}

    public function set(){}

    public function edit(){}

    public function delete(){}

    public function getMascotasbyFilter($filtro){
        $this->query = "SELECT * FROM animales WHERE nombre LIKE :filter OR raza LIKE :filter";
        $this->parametros['filter'] = '%' . $filtro . '%';
        $this->get_results_from_query();
        if(count($this->rows) > 0){
            return $this->rows;
        }else{
            return false;
        }
    }
}