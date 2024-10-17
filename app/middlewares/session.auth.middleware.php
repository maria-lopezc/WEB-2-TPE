<?php

function sessionAuthMiddleware($response){
    session_start();
    if(isset($_SESSION['ID_USER'])){
        $response->user= new stdClass();
        $response->user->id=$_SESSION['ID_USER'];
        $response->user->email=$_SESSION['EMAIL_USER'];
    } else{
        header('Location: /Web%202/TPE/showLogin');
        die();
    }
}
?>