<?php

namespace App\Models;
require "DBAbstractModel.php";

class Multas extends DBAbstractModel{
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
    private $id_agente;
    private $id_conductor;
    private $matricula;
    private $id_tipo_sanciones;
    private $descripcion;
    private $fecha;
    private $importe;
    private $descuento;

    private $estado;

    // Creo los getters
    public function getId(){
        return $this->id;
    }

    public function getIdAgente(){
        return $this->id_agente;
    }

    public function getIdConductor(){
        return $this->id_conductor;
    }

    public function getMatricula(){
        return $this->matricula;
    }

    public function getIdTipoSanciones(){
        return $this->id_tipo_sanciones;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function getImporte(){
        return $this->importe;
    }

    public function getDescuento(){
        return $this->descuento;
    }

    public function getEstado(){
        return $this->estado;
    }

    // Creo los setters

    public function setId($id){
        $this->id = $id;
    }

    public function setIdAgente($id_agente){
        $this->id_agente = $id_agente;
    }

    public function setIdConductor($id_conductor){
        $this->id_conductor = $id_conductor;
    }

    public function setMatricula($matricula){
        $this->matricula = $matricula;
    }

    public function setIdTipoSanciones($id_tipo_sanciones){
        $this->id_tipo_sanciones = $id_tipo_sanciones;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    public function setImporte($importe){
        $this->importe = $importe;
    }

    public function setDescuento($descuento){
        $this->descuento = $descuento;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }

    public function get(){
        $this->query = "SELECT * FROM multas WHERE id = :id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
        if(count($this->rows) == 1){
            foreach ($this->rows[0] as $propiedad=>$valor){
                $this->$propiedad = $valor;
            }
            $this->mensaje = "Multa encontrada";
        }else{
            $this->mensaje = "Multa no encontrada";
        }
        return $this->rows;
    }

    public function edit(){}

    public function set(){
        $this->query = "INSERT INTO multas (id_agente, id_conductor, matricula, id_tipo_sanciones, descripcion, fecha, importe, descuento, estado) VALUES (:id_agente, :id_conductor, :matricula, :id_tipo_sanciones, :descripcion, :fecha, :importe, :descuento, 'Pendiente')";
        $this->parametros['id_agente'] = $this->id_agente;
        $this->parametros['id_conductor'] = $this->id_conductor;
        $this->parametros['matricula'] = $this->matricula;
        $this->parametros['id_tipo_sanciones'] = $this->id_tipo_sanciones;
        $this->parametros['descripcion'] = $this->descripcion;
        $this->parametros['fecha'] = $this->fecha;
        $this->parametros['importe'] = $this->importe;
        $this->parametros['descuento'] = $this->descuento;
        $this->get_results_from_query();
        $this->mensaje = "Multa creada";
    }
    public function delete(){}

    public function getAllbyIdConductor($idConductor){
        $this->query = "SELECT * FROM multas WHERE id_conductor = :id_conductor";
        $this->parametros['id_conductor'] = $idConductor;
        $this->get_results_from_query();
        if(count($this->rows) == 1){
            foreach ($this->rows[0] as $propiedad=>$valor){
                $this->$propiedad = $valor;
            }
            $this->mensaje = "Multa encontrada";
        }else{
            $this->mensaje = "Multa no encontrada";
        }
        return $this->rows;
    }

    public function pagarMulta($id){
        // Actualizo el estado a pagada 
        $this->query = "UPDATE multas SET estado = 'Pagada' WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        $this->mensaje = "Multa pagada";
    }

    public function getAllbyIdAgente($idAgente){
        $this->query = "SELECT * FROM multas WHERE id_agente = :id_agente";
        $this->parametros['id_agente'] = $idAgente;
        $this->get_results_from_query();
        if(count($this->rows) == 1){
            foreach ($this->rows[0] as $propiedad=>$valor){
                $this->$propiedad = $valor;
            }
            $this->mensaje = "Multa encontrada";
        }else{
            $this->mensaje = "Multa no encontrada";
        }
        return $this->rows;
    }

    public function getIdConductorPagar($idmulta){
        $this->query = "SELECT id_conductor FROM multas WHERE id = :id";
        $this->parametros['id'] = $idmulta;
        $this->get_results_from_query();
        if(count($this->rows) == 1){
            foreach ($this->rows[0] as $propiedad=>$valor){
                $this->$propiedad = $valor;
            }
            $this->mensaje = "Multa encontrada";
        }else{
            $this->mensaje = "Multa no encontrada";
        }
        return $this->rows;
    }

    public function getCoeficiente(){
        // Obtengo el numero de multas totales
        $this->query = "SELECT COUNT(*) FROM multas";
        $this->get_results_from_query();
        // Me quedo con el numero que me ha devuelto la consulta anteiror
        $valor = $this->rows[0]["COUNT(*)"];
        // Luego obtengo el numero del agente
        $this->query = "SELECT COUNT(*) FROM multas WHERE id_agente = :id_agente";
        $this->parametros['id_agente'] = $_SESSION["id"];
        $this->get_results_from_query();
        $agente = $this->rows[0]["COUNT(*)"];

        // Por ultimo divido el segundo numero entre el primero y me sale el porcentaje y lo redonde a 2 digitos
        $coeficiente = round(($agente / $valor) * 100, 2);
        return $coeficiente;
    }

    public function numeroMultas($idconductor){
        $this->query = "SELECT COUNT(*) FROM multas WHERE id_conductor = :id_conductor";
        $this->parametros['id_conductor'] = $idconductor;
        $this->get_results_from_query();
        return $this->rows[0]["COUNT(*)"];
    }
}