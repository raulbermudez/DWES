<?php

namespace App\Controllers;
use App\Models\Usuarios;

class AuthController extends BaseController{
    public function indexAction(){
        $data = Usuarios::getInstancia()->getAllConductores();
        $this->renderHTML('../app/views/admin_view.php', $data);
    }
}