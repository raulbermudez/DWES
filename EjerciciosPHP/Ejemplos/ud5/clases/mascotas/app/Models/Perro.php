<?php
/**
 * Creamos la clase perro 
 * @author raul <email>
 */

 //Creamos el espacio de nombres
namespace App\Models;
class Perro{
    private $_color;
    private $_nombre;
    private $_habilidad;
    private $_sociabilidad;

    /**
     * Creamos el constructor
     * @param mixed $nombre
     * @param mixed $color
     */
    public function __construct($nombre, $color) {
        $this->_color = $color;
        $this->_nombre = $nombre;
        $this->_habilidad = 0;
        $this->_sociabilidad = 5;
    }

    public function entrenar(){
        echo "Dar la pata <br/>";
        if ($this->_habilidad < 100){
            $this->_habilidad ++;
        }
    }

    public function darPata(){
        $retorno = "<br/>¿Cómo?<br/>";
        if($this->_habilidad > 5 ){
            $retorno = "Levanta la pata <br/>";
        }
        echo $retorno;
    }
}