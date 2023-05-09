<?php

include_once './../Controllers/controllersView.php';
include_once './../db/database.php';


class Login extends DATABASE
{

    private $Controllers;

    function __construct()
    {
        $this->Controllers = new ControllerViews();
    }


    function session_login()
    {
        session_start();

        if (isset($_SESSION['rol'])) {
                    $this->Controllers->Cards();
            
        } else {
            $this->recibe_Datos();
        }
    }

    function recibe_Datos()
    {
        if (isset($_POST['username']) && isset($_POST['password'])) {

            if ($this->verificar_User()) {
                echo "
                <div class='alert alert-danger' role='alert'>
                Nombre de usuario o contraseña correcto
                </div> ";

                $_SESSION['rol'] = $this->verificar_User()[4];
                $_SESSION['user'] = $this->verificar_User()[1];

                $this->Controllers->Cards();
            } else {
  
                echo "
        <div class='alert alert-danger' role='alert'>
        Nombre de usuario o contraseña incorrecto
        </div> ";
            }
        }
    }

    function verificar_User()
    {

        $db = new Database();

        $query = $db->getConnection()->prepare('SELECT *FROM usuario WHERE USUARIO = ? AND CONTRASEÑA = ?');

        $query->execute([
            $_POST['username'],
            $_POST['password']
        ]);

        $row = $query->fetch(PDO::FETCH_NUM);

        return $row;
    }
}
