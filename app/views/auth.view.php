<?php
require_once 'urls.php';
class AuthView{
    public function showLogin($error=' '){
        $base=baseurl();
        require 'templates/form_login.phtml';
    }

    public function showSignUp($error=' '){
        $base=baseurl();
        require 'templates/form_signup.phtml';
    }
}