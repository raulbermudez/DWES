<?php

namespace App\Controllers;

class NumerosControllers extends BaseController{
    public function NumerosAction()
    {
        $data[] = "<h1>Primeros 10 numeros pares</h1>";
        for ($i=1; $i <= 20; $i++){
            if ($i%2== 0){
                $data[]=$i;
            }
        }
        $this->renderHTML('../app/views/numeros_view.php',$data) ;
    }

    public function PersonalizParesAction($param)
    {
        // Obtengo el valor para el numero de pares que necesito
        $valor = explode("/", $param);
        $valor = end($valor);
        $data[] = "<h1>Primeros " . $valor . " numeros pares</h1>";
        $valor = $valor * 2;
        for ($i=1; $i <= $valor; $i++){
            if ($i%2== 0){
                $data[]=$i;
            }
        }
        $this->renderHTML('../app/views/numerosPersonaliz_view.php',$data) ;
    }
}