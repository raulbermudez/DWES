<?php

namespace App\Controllers;
use \App\Models\Usuarios;

class UsuarioController {
    public function loginAction(){
        // Obtengo los valores de usuariio y password del formulario
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        // Creo un objeto de la clase Usuarios
        $in_usuario = new Usuarios();
        // Llamo al metodo get de la clase Usuarios
        $in_usuario->getUserbyUserName($usuario, $password);

        // Si el usuario es correcto
        if($in_usuario->getNombre() != null){
            // Compruebo que el valor que ha mandado en el radio button coincide con el del captcha
            if($_POST['captcha'] == $_SESSION['captcha']){
                // Creo una sesion con el nombre del usuario
                $_SESSION['usuario'] = $in_usuario->getNombre();
                $_SESSION['perfil'] = $in_usuario->getPerfil();
                $_SESSION["id"] = $in_usuario->getId();
                // Redirijo a la pagina de multas
                header("Location: /");
            } else{
                header("Location: /");
            }

        }else{
            // Si el usuario no es correcto redirijo a la pagina de login
            header("Location: /");
        }

    }

    public function logoutAction() {
         // Iniciar sesión
         session_start();

         // Destruir la sesión
         session_destroy();
 
         header('Location: /');
    }
}
