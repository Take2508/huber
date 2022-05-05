<?php
include('config.php');
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <?php require_once "menu.php" ?>
    <title>Clientes</title>
</head>

<body>

    <div class="container"><br>
        <div class="row justify-content-center">
            <div class="col-6 p-5 bg-white shadow-lg rounded">
                <h3>Nuevo Motorista</h3>
                <hr>
                <form method="post" action="registro_motorista.php">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input id="Nombre" class="form-control" type="text" name="Nombre">
                    </div>
                    <div class="form-group">
                        <label for="Fecha_de_Nacimiento">Fecha de Nacimiento:</label>
                        <input id="Fecha_de_Nacimiento" class="form-control" type="text" name="Fecha_de_Nacimiento">
                    </div>
                    <div class="form-group">
                        <label for="Fecha_de_Ingreso">Fecha de Ingreso:</label>
                        <input id="Fecha_de_Ingreso" class="form-control" type="text" name="Fecha_de_Ingreso">
                    </div> 
                    <div class="form-group">
                        <label for="Dui">Dui:</label>
                        <input id="Dui" class="form-control" type="text" name="Dui">
                    </div> <br>
                    <button class="btn btn-primary" name="registro" type="submit">Guardar</button>
                </form>
            </div>


        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>