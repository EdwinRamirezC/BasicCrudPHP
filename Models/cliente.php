<?php
class cliente 
{
    private $pdo;

    public $id;
    public $dni;
    public $nombre;
    public $apellido;
    public $correo;
    public $telefono;

    public function __construct()
    {
        try
        {
            $this->pdo = Database::StartUp();
        }
        catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
    // funcion utilizada para consultar un solo registro de la base de datos
    public function consultar($id){
        try {
            $sql = "SELECT *  from cliente WHERE id = ?";
            $query = $this->pdo->prepare($sql);
            $query->execute(array($id));

            return $query->fetch(PDO::FETCH_OBJ);

        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    // funcion utilizada para mostrar todos los registros de la base de datos
    public function listar()
    {
        try
        {
            $query = "SELECT * from cliente ";
            $sql = $this->pdo->prepare($query);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_OBJ);

        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    // funcion utilizada para guardar un registro en la base de datos
    public function guardar(cliente $cliente){
        
        try{
            $sql = "INSERT INTO cliente (nombre,apellido,correo,telefono) values (?, ?, ?, ?)";
            $query = $this->pdo->prepare($sql);
            $query->execute(
                array(
                    $cliente->nombre,
                    $cliente->apellido,
                    $cliente->correo,
                    $cliente->telefono
                )
            );
            header('Location: index.php');
        }catch (Exception $e){
            die($e->getMessage());
        }
    }
    // funcion utilizada para actualizar un registro en la base de datos
    public function actualizar (cliente $cliente){
        try{
            $sql = "UPDATE cliente SET 
                    nombre = ?,
                    correo = ?,
                    apellido = ?,
                    telefono = ?
                    WHERE id = ?";

            $query = $this->pdo->prepare($sql);

            $query->execute(array(
                $cliente->nombre,
                $cliente->correo,
                $cliente->apellido,
                $cliente->telefono,
                $cliente->id
            ));
            header('Location: index.php');
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    // funcion utilizada para eliminar un registro de la base de datos
    public function eliminar($id){
        
        $sql = "DELETE FROM cliente WHERE id = ?";
        try{
            $query = $this->pdo->prepare($sql);
            $query->execute(array($id));
            header('Location: index.php');
        }catch(Exception $e){
            die($e->getMessage()."\n".$sql);
        }
    }
    
}