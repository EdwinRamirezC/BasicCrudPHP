<?php
// se llama el modelo de la conexion a la base de datos
require_once 'Models/database.php';
// se define el controlador por defecto
$controller = 'cliente';

if (!isset($_REQUEST['c']))
{
    require_once "Controllers/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->index();
}else {

    $controller  = $_REQUEST['c'];
    $action =   isset($_REQUEST['a'])?$_REQUEST['a']: "index";

    require_once "Controllers/$controller.controller.php";
    $controller = ucwords($controller."Controller");
    $controller = new $controller;
    call_user_func( array($controller,$action) );
}
