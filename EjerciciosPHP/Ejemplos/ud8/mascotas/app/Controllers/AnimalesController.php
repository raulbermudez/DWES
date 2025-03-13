<?php
namespace App\Controllers;
use App\Models\Animales;

class AnimalesController extends BaseController{
    public function IndexAction($filtro){
        $data = array();
        $animal = Animales::getInstancia();
        $data['animales'] = $animal->getMascotasbyFilter($filtro);
        if (empty($data['animales'])){
            require_once "../app/views/index_view.php";
        } else{
            require_once "../app/views/lista_view.php";
        }
    }
}