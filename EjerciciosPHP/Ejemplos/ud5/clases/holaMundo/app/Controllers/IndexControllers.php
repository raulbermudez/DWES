<?php

namespace App\Controllers;

class IndexControllers extends BaseController{
    public function IndexAction()
    {
        $data = array('message'=>'Hola mundo');
        $this->renderHTML('../app/views/index_view.php',$data) ;
    }

    public function SaludoAction($param)
    {
        $valor = explode("/", $param);
        $valor = end($valor);
        $data = array('mensaje' => 'Hola ' .  $valor);
        $this->renderHTML('../app/views/saludo_view.php',$data);
    }
}