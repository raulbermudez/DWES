<?php
namespace App\Models;

require "DBAbstractModel.php";

class Sanciones extends DBAbstractModel{
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

    private $id;

    private $tipo;

    private $importe;

    private $puntos;

    // Creo los getters

    public function getId(){
        return $this->id;
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function getImporte(){
        return $this->importe;
    }

    public function getPuntos(){
        return $this->puntos;
    }

    // Creo los setters

    public function setId($id){
        $this->id = $id;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }

    public function setImporte($importe){
        $this->importe = $importe;
    }

    public function setPuntos($puntos){
        $this->puntos = $puntos;
    }

    public function delete(){}

    public function get(){}

    public function set(){}

    public function edit(){}

    public function getSancionbyName($name){
        $this->query = "SELECT * FROM tipo_sanciones WHERE tipo = :nombre";
        $this->parametros['nombre'] = $name;
        $this->get_results_from_query();
        if(count($this->rows) == 1){
            foreach ($this->rows[0] as $propiedad=>$valor){
                $this->$propiedad = $valor;
            }
            $this->mensaje = "Sancion encontrada";
        }else{
            $this->mensaje = "Sancion no encontrada";
        }
        return $this->rows[0];
    }

}