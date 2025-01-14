<?php
/**
 * Clase Persona
 * @author = Raul Bermudez Gonzalez
 */

class Persona
{
    private $_nombre;
    private $_apellido1;
    private $_apellido2;

    public function __construct($nombre, $apellido1, $apellido2){
        $this->_nombre = $nombre; // $this pseudovariable para referenciar al objeto
        $this->_apellido1 = $apellido1;
        $this->_apellido2 = $apellido2;
    }

    /**
     * Funcion que devuelve el nombre completo
     * @return string
     */
    public function nombre(){
        return $this->_nombre . " " . $this->_apellido1 . " " . $this->_apellido2;
    }

    /**
     * Hago la funcion saludo
     * @return void
     */
    public function saludo(){
        echo "Hola mundo";
    }
}
?>