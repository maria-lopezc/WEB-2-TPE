<?php
require_once './app/models/user.model.php';
require_once './app/views/auth.view.php';
require_once 'urls.php';

class AuthController{
    private $model;
    private $view;

    public function __construct(){
        $this->model= new UserModel();
        $this->view= new AuthView();
    }

    public function showLogin(){
        baseurl();
        return $this->view->showLogin();
    }

    public function login(){
        if(!isset ($_POST['email'])||empty($_POST['email'])){
            return $this->view->showLogin('Falta completar el email del usuario');
        }
        if(!isset ($_POST['contrasenia'])||empty($_POST['contrasenia'])){
            return $this->view->showLogin('Falta completar la contraseña');
        }

        $email=$_POST['email'];
        $contrasenia=$_POST['contrasenia'];

        $userFromDB=$this->model->getUserByEmail($email);
        
        if($userFromDB&&password_verify($contrasenia, $userFromDB->contrasenia)){
            session_start();
            $_SESSION['ID_USER']=$userFromDB->id;
            $_SESSION['EMAIL_USER']=$userFromDB->email;
            $_SESSION['LAST_ACTIVITY']=time();
            
            $base=baseurl().'home';
            header('Location: '.$base);
        } else{
            return $this->view->showLogin('Email o contraseña incorrectas');
        }
    }

    public function logout(){
        session_start();
        session_destroy();

        $base=baseurl().'home';
        header('Location: '.$base);
    }

    public function showSignUp(){
        return $this->view->showSignUp();
    }

    public function signUp(){
        if(!isset ($_POST['email'])||empty($_POST['email'])){
            return $this->view->showSignUp('Falta completar el email del usuario');
        }
        if(!isset ($_POST['contrasenia'])||empty($_POST['contrasenia'])){
            return $this->view->showSignUp('Falta completar la contraseña');
        }

        $email=$_POST['email'];
        $contrasenia=$_POST['contrasenia'];
        
        $passHash=$this->model->encriptar($contrasenia);

        $this->model->registrar($email, $passHash);

        $base=baseurl().'showLogin';
        header('Location: '.$base);
    }
}