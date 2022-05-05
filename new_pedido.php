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
    <title>Pedidos</title>
</head>

<body>

    <div class="container"><br>
        <div class="row justify-content-center">
            <div class="col-6 p-5 bg-white shadow-lg rounded">
                <h3>Nuevo Pedido</h3>
                <hr>
                <form method="post" action="registro_pedido.php">
                    <div class="form-group">
                        <label for="cliente">Cliente:</label>
                        <input id="cliente" class="form-control" type="int" name="cliente">
                    </div>
                    <div class="form-group">
                        <label for="plato">Plato:</label>
                        <input id="plato" class="form-control" type="int" name="plato">
                    </div> 
                    <div class="form-group">
                        <label for="fecha">Fecha:</label>
                        <input id="fecha" class="form-control" type="date" name="fecha">
                    </div> 
                    <div class="form-group">
                        <label for="direccion_de_entrega">Direccion de Entrega:</label>
                        <input id="direccion_de_entrega" class="form-control" type="text" name="direccion_de_entrega">
                    </div> 
                    <div class="form-group">
                        <label for="motorista">Motorista:</label>
                        <input id="motorista" class="form-control" type="int" name="motorista">
                    </div> 
                    <div class="form-group">
                        <label for="precio">Precio:</label>
                        <input id="precio" class="form-control" type="double" name="precio">
                    </div> 
                    <div class="form-group">
                        <label for="isv">ISV:</label>
                        <input id="isv" class="form-control" type="double" name="isv">
                    </div> 
                    <div class="form-group">
                        <label for="total">Total:</label>
                        <input id="total" class="form-control" type="double" name="total">
                    </div>
                    <br>
                    <button class="btn btn-primary" name="registro" type="submit">Guardar</button>
                </form>
            </div>


        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>