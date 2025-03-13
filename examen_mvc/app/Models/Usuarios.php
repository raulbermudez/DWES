<?php

namespace App\Models;
require "DBAbstractModel.php";

class Usuarios extends DBAbstractModel{
    
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
   private $usuario;
   private $password;
   private $nombre;
   private $perfil;

   private $nMultas;

   // Creo los setters 
   public function setId($id){
         $this->id = $id;
   }

    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setPerfil($perfil){
        $this->perfil = $perfil;
    }

    // Creo los getters
    public function getId(){
        return $this->id;
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getPerfil(){
        return $this->perfil;
    }

    // Obtengo un usuario de la base de datos usando parametros
   public function get(){
        $this->query = "SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password";
        $this->parametros['usuario'] = $this->usuario;
        $this->parametros['password'] = $this->password;
        $this->get_results_from_query();
        if(count($this->rows) == 1){
            foreach ($this->rows[0] as $propiedad=>$valor){
                $this->$propiedad = $valor;
            }
            $this->mensaje = "Usuario encontrado";
        }else{
            $this->mensaje = "Usuario no encontrado";
        }
    }

    // Creo un nuevo usuario en la base de datos
    public function set(){    
    }

    // Actualizo un usuario en la base de datos
    public function edit(){    
    }

    // Elimino un usuario de la base de datos
    public function delete(){
    }

    // Obtengo el usuario por su nombre de usuario. Para el login
    public function getUserbyUserName($usuario, $password){
        $this->query = "SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password";
        $this->parametros['usuario'] = $usuario;
        $this->parametros['password'] = $password;
        $this->get_results_from_query();
        if(count($this->rows) == 1){
            foreach ($this->rows[0] as $propiedad=>$valor){
                $this->$propiedad = $valor;
            }
            $this->mensaje = "Usuario encontrado";
        }else{
            $this->mensaje = "Usuario no encontrado";
        }
    }

    public function getAllConductores(){
        $this->query = "SELECT * FROM usuarios WHERE perfil = 'conductor'";
        $this->get_results_from_query();
        if(count($this->rows) == 1){
            foreach ($this->rows[0] as $propiedad=>$valor){
                $this->$propiedad = $valor;
            }
            $this->mensaje = "Conductor encontrado";
        }else{
            $this->mensaje = "Conductor no encontrado";
        }
        return $this->rows;
    }
}