<?php
session_start();
include('config.php');
include_once 'class/pedidos.php';
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
$crud = new crud($conn);
//validacion del boton actualizar
if (isset($_POST['btn-update'])) {
    $id = $_GET['edit_id'];
    $cliente = $_POST['cliente'];
    $plato = $_POST['plato'];
    $fecha = $_POST['fecha'];
    $direccion_de_entrega = $_POST['direccion_de_entrega'];
    $motorista = $_POST['motorista'];
    $precio = $_POST['precio'];
    $isv = $_POST['isv'];
    $total = $_POST['total'];
    //hace referencia a la funcion update
    if ($crud->update($id, $cliente, $plato, $fecha,$direccion_de_entrega,$motorista,$precio,$isv,$total)) {
        $msg = "<b>WOW, Actualizacion exitosa!</b>";
    } else {
        $msg = "<b>ERROR, algo anda mal</b>";
    }
}
if (isset($_GET['edit_id'])) {
    $id = $_GET['edit_id'];
    extract($crud->getID($id));
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
    <title>PLATILLOS</title>
</head>

<body>

    <div class="container"><br>
        <div class="row justify-content-center">
            <div class="col-6 p-5 bg-white shadow-lg rounded">
                <?php
                if (isset($msg)) {
                    echo $msg;
                }
                ?>
                 <h3>ACTUALIZAR PEDIDO</h3>
                <hr>
                <form method="post">
                    <div class="form-group">
                        <label for="cliente">Cliente:</label>
                        <input id="cliente" value="<?php echo $cliente; ?>" class="form-control" type="int" name="cliente">
                    </div>
                    <div class="form-group">
                        <label for="plato">Plato:</label>
                        <input id="plato" value="<?php echo $plato; ?>" class="form-control" type="int" name="plato">
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha:</label>
                        <input id="fecha" value="<?php echo $fecha; ?>" class="form-control" type="date" name="fecha">
                    </div>
                    <div class="form-group">
                        <label for="direccion_de_entrega">Direccion de Entrega:</label>
                        <input id="direccion_de_entrega" value="<?php echo $direccion_de_entrega; ?>" class="form-control" type="text" name="direccion_de_entrega">
                    </div>
                    <div class="form-group">
                        <label for="motorista">Motorista:</label>
                        <input id="motorista" value="<?php echo $motorista; ?>" class="form-control" type="int" name="motorista">
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio:</label>
                        <input id="precio" value="<?php echo $precio; ?>" class="form-control" type="double" name="precio">
                    </div>
                    <div class="form-group">
                        <label for="isv">ISV:</label>
                        <input id="isv" value="<?php echo $isv; ?>" class="form-control" type="double" name="isv">
                    </div>
                    <div class="form-group">
                        <label for="total">Total:</label>
                        <input id="total" value="<?php echo $total; ?>" class="form-control" type="double" name="total">
                    </div>
                    <br>
                    <button class="btn btn-primary" name="btn-update" type="submit">Actualizar</button>
                </form>
            </div>


        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>