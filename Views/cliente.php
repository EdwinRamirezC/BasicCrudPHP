<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" >
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>


</head>
<body>
    <div class="container">
        <h1>Lista de usuarios</h1>
        <a href="?c=cliente&a=formulario" class="btn btn-primary" >Agregar usuario</a>
        </br></br></br>
        <table id="busqueda">
            <thead >
                <tr>
                    <th>DNI</th>
                    <th>nombre</th>
                    <th>apellido</th>
                    <th>correo</th>
                    <th>telefono</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
                <?php foreach($this->model->listar() as $registro):?>
                    <tr>
                        <td><?php echo $registro->dni; ?></td>
                        <td><?php echo $registro->nombre; ?></td>
                        <td><?php echo $registro->apellido; ?></td>
                        <td><?php echo $registro->correo; ?></td>
                        <td><?php echo $registro->telefono; ?></td>
                        <td><a class=" btn btn-warning" href="?c=cliente&a=formulario&id=<?php echo $registro->id; ?>"> Modificar</a></td>
                        <td><a class="btn btn-danger" href="?c=cliente&a=eliminar&id=<?php echo $registro->id; ?>">Eliminar</a</td> 
                    </tr>
                <?php endforeach;?>
            <tbody>
            </tbody>
        </table>
    </div>
</body>
</html>
<script>
    $(document).ready( function () {
    $('#busqueda').DataTable();
} );
</script>
