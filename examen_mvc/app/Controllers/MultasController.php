<?php

namespace App\Controllers;
use App\Models\Multas;
use App\Models\Sanciones;

class MultasController extends BaseController{
    public function multasAction(){
        // Llamo al get de las multas del conductor
        $data = Multas::getInstancia()->getAllbyIdConductor($_SESSION["id"]);

        $this->renderHTML('../app/views/multas_view.php', $data);
    }

    public function pagarMultasAction($categoria){
        // Obtengo el id de la multa que me viene en la url
        $data = "";
        $elementos = explode('/', $categoria);
        $categ = end($elementos);
        $multa = Multas::getInstancia();
        $multas = $multa->getIdConductorPagar($categ);
        // if ($multas["id"] !== $_SESSION["id"]){
        //     header("Location: /");
        // }
        $data = array();
        $multa->setId($categ);
        $multa->get();
        $data["multa"] = $multa;

        if(isset($_POST["pagar"])){
            $multa->pagarMulta($categ);
            header("Location: /multas");
        }

        $this->renderHTML('../app/views/multas_pagar_view.php', $data);
    }

    public function multasAgenteAction(){
        // Llamo al get de las multas del agente
        $data = Multas::getInstancia()->getAllbyIdAgente($_SESSION["id"]);

        $data["coeficiente"] = Multas::getInstancia()->getCoeficiente();

        $this->renderHTML('../app/views/multas_agente_view.php', $data);
    }

    public function multasAgenteAddAction(){
        // Guardo los posibles valores en $data y los mensaje de error
        $lProcesaFormulario = false;
        $data["matricula"] = $data["fecha"] = $data["sancion"] = $data["descripcion"] = "";
        $data["matriculaError"] = $data["fechaError"] = $data["sancionError"] = $data["descripcionError"] = "";
        // Si se ha pulsado el boton enviar
        if (isset($_POST["enviar"])){
            // Recojo los campos del formulario
            $data["matricula"] = $_POST["matricula"];
            $data["fecha"] = $_POST["fecha"];
            if (isset($_POST["tipo"])){
                $data["sancion"] = $_POST["tipo"];
            }
            $data["descripcion"] = $_POST["descripcion"];
            $lProcesaFormulario = true;
            // Compruebo que los campos no esten vacios
            if (empty($data["matricula"])){
                $data["matriculaError"] = "La matricula no puede estar vacia";
                $lProcesaFormulario = false;
            }

            if (empty($data["fecha"])){
                $data["fechaError"] = "La fecha no puede estar vacia";
                $lProcesaFormulario = false;
            }

            if (empty($data["sancion"])){
                $data["sancionError"] = "La sancion no puede estar vacia";
                $lProcesaFormulario = false;
            }

            if (empty($data["descripcion"])){
                $data["descripcionError"] = "La descripcion no puede estar vacia";
                $lProcesaFormulario = false;
            }
            if ($lProcesaFormulario){
                // Creo una instancia de multa
                $multas = Multas::getInstancia();
                $multas->setIdAgente($_SESSION["id"]);
                $multas->setIdConductor(4);
                $multas->setMatricula($data["matricula"]);

                // Si la sancion es leve
                if ($data["sancion"] == "Leve"){
                    $id = 1;
                    $importe = 100;
                } else if ($data["sancion"] == "Grave"){
                    $id = 2;
                    $importe = 200;
                } else if ($data["sancion"] == "Muy grave"){
                    $id = 3;
                    $importe = 500;
                }
                
                $multas->setFecha($data["fecha"]);
                $multas->setIdTipoSanciones($id);
                $multas->setDescripcion($data["descripcion"]);
                $multas->setImporte($importe);
                // Si no pasado un mes desde la fecha actual el descuento es del 50%
                if (strtotime($data["fecha"]) > strtotime("-1 month")){
                    $multas->setDescuento(50);
                } else{
                    $multas->setDescuento(0);
                }
                $multas->set();
                header("Location: /");
            }
            $this->renderHTML('../app/views/multas_agente_add_view.php', $data);
        } else{
            $this->renderHTML('../app/views/multas_agente_add_view.php', $data);
        }
    }
}