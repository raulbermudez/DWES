<?php
/**
 * Creacion de la clase Contador
 * @author raul <email>
 */

class Contador
{
    private $contador; // Variable privada
    private static $instancia = 0; // Variable de clase

    /**
     * Creacion del constructor
     * @param mixed $cont
    */
    public function __construct($cont = 0) {
        $this->contador = $cont;
        self::$instancia ++;
    }

    /**
     *Creacion de contar para aumentar la variable contador
     * @return static
     */
    public function contar(){
        $this->contador++;
        return $this;
    }

    /**
     * Devolucion del numerod e instancias creadas
     * @return mixed
     */
    public static function nInstancias(){
        return self::$instancia;
    }

    /**
     * Creacion de una cadena con el metodo mágico __toString
     * @return string
     */
    public function __tostring(){
        return (string) $this->contador;
    }
}