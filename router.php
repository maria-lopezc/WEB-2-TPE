<?php
require_once './app/controllers/task.controller.php';
require_once './app/controllers/auth.controller.php';
require_once './app/libs/response.php';
require_once './app/middlewares/session.auth.middleware.php';
require_once './templates/layout/header.php';

$res=new Response();

if(!empty ($_GET['action'])){
    $action=$_GET['action'];
} else {
    $action='login';
}

$params=explode("/",$action);

switch($params[0]){
    case 'home':{
        $taskController=new TaskController();
        $taskController->showHome();
        break;
    }
    case 'verVuelo':{
        $taskController=new TaskController();
        $taskController->showMas($params[1]);
        break;
    }
    case 'verPilotos': {
        $taskController=new TaskController();
        $taskController->showPilotos();
        break;
    }
    case 'vuelosPiloto':{
        $taskController=new TaskController();
        $taskController->showVuelosPiloto($params[1]);
        break;
    }
    case 'agregar': {
        sessionAuthMiddleware($res);
        $taskController=new TaskController();
        $taskController->showAgregarVuelo();
        break;
    }
    case 'agregarPiloto':{
        sessionAuthMiddleware($res);
        $taskController=new TaskController();
        $taskController->showAgregarPiloto();
        break;
    }
    case 'eliminarVuelo': {
        sessionAuthMiddleware($res);
        $taskController=new TaskController();
        $taskController->removeVuelo($params[1]);
        break;
    }
    case 'eliminarPiloto': {
        sessionAuthMiddleware($res);
        $taskController=new TaskController();
        $taskController->removePiloto($params[1]);
        break;
    }
    case 'editarVuelo': {
        sessionAuthMiddleware($res);
        $taskController=new TaskController();
        $taskController->editVuelo($params[1]);
        break;
    }
    case 'editoVuelo': {
        sessionAuthMiddleware($res);
        $taskController=new TaskController();
        $taskController->editeVuelo($params[1]);
        break;
    }
    case 'editarPiloto': {
        sessionAuthMiddleware($res);
        $taskController=new TaskController();
        $taskController->editPiloto($params[1]);
        break;
    }
    case 'editoPiloto': {
        sessionAuthMiddleware($res);
        $taskController=new TaskController();
        $taskController->editePiloto($params[1]);
        break;
    }
    case 'showLogin': {
        $authController=new AuthController();
        $authController->showLogin();
        break;
    }
    case 'login': {
        $authController=new AuthController();
        $authController->login();
        break;
    }
    case 'logout': {
        $authController=new AuthController();
        $authController->logout();
        break;
    }
    case 'showSignUp': {
        $authController=new AuthController();
        $authController->showSignUp();
        break;
    }
    case 'signUp': {
        $authController=new AuthController();
        $authController->signUp();
        break;
    }
    default: {
        $authController=new AuthController();
        $authController->showLogin();
        break;
    }
}
?>