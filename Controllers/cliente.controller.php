<?php

include_once "Models/cliente.php";

class clienteController 
{
    private $model;

    public function __construct()
    {   
        $this->model =  new cliente();
    }
    // se asocia la vista por defecto
    public function index(){
        require_once "Views/cliente.php";
    }

    public function formulario(){

        $cliente = new cliente();
        if(isset($_REQUEST['id'])){
            $cliente = $this->model->consultar($_REQUEST['id']);
        }

        require_once "Views/cliente_formulario.php";
    }

    public function guardar(){

        $cliente = new cliente();

        $cliente->id = $_REQUEST['id'];
        $cliente->nombre= $_REQUEST['nombre'];
        $cliente->apellido = $_REQUEST['apellido'];
        $cliente->correo = $_REQUEST['correo'];
        $cliente->telefono = $_REQUEST['telefono'];

        ($cliente->id > 0)?$this->model->actualizar($cliente):$this->model->guardar($cliente);
    }

    public function eliminar(){
        if (isset($_REQUEST['id']))
            $this->model->eliminar($_REQUEST['id']);
    }
}