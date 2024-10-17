<?php

class AuthView{
    public function showLogin($error=' '){
        echo '<h1>Inicie sessión para continuar:</h1>';
        require 'templates/form_login.php';
        echo '<h3>¿No tiene cuenta?</h3><a href="/Web%202/TPE/showSignUp">Registrase</a>';
    }

    public function showSignUp($error=' '){
        echo '<h1>Registrarse:</h1>';
        require 'templates/form_signup.php';
    }
}