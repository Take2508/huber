<?php
session_start();
include('config.php');
include_once 'class/platos.php';
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
$crud = new crud($conn);
//validacion del boton actualizar
if (isset($_POST['btn-update'])) {
    $id = $_GET['edit_id'];
    $nombre = $_POST['nombre'];
    $restaurante = $_POST['restaurante'];
    $precio = $_POST['precio'];
    //hace referencia a la funcion update
    if ($crud->update($id, $nombre, $restaurante, $precio)) {
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
                 <h3>ACTUALIZAR PLATO</h3>
                <hr>
                <form method="post">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input id="nombre" value="<?php echo $nombre; ?>" class="form-control" type="text" name="nombre">
                    </div>
                    <div class="form-group">
                        <label for="restaurante">Restaurante:</label>
                        <input id="restaurante" value="<?php echo $restaurante; ?>" class="form-control" type="text" name="restaurante">
                    </div>
                    <div class="form-group">
                        <label for="precio">Email:</label>
                        <input id="precio" value="<?php echo $precio; ?>" class="form-control" type="text" name="precio">
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