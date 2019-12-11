<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<body>

    <div class="container">
        <h1 class="page-header">
            <?php echo $cliente->id != null ? $cliente->nombre : 'Nuevo Registro'; ?>
        </h1>
        <form id = "formulario" action="?c=cliente&a=guardar" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $cliente->id; ?>" />
            <div class="from-row">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name ="nombre" value="<?php echo $cliente->nombre; ?>" placeholder="Nombres" required> 
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" class="form-control" id="apellido" name ="apellido" value="<?php echo $cliente->apellido; ?>" placeholder="Apellidos" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="correo">Email</label>
                    <input type="email" class="form-control" id="correo" name ="correo" value="<?php echo $cliente->correo; ?>" placeholder="Correo" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="telefono">Telefono</label>
                    <input type="number" class="form-control" id="telefono" name ="telefono"  value="<?php echo $cliente->telefono; ?>" placeholder="Telefono" required>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="hijos" name ="hijos">
                        <label class="form-check-label" for="hijos">
                            Tiene hijos
                        </label>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="hijos">Hijos</label>
                    <select id="chijos" name ="chijos" class="form-control">
                        <option selected>Cantidad de hijos</option>
                        <option value = "1" >1</option>
                        <option value = "2" >2</option>
                        <option value = "3" >3</option>
                        <option value = "4" >4</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</body>
</html>

<script>
    $(document).ready(function(){
        $("#formulario").submit(function(){
            return $(this).validate();
        });
    })
</script>