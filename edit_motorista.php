<?php
session_start();
include('config.php');
include_once 'class/motoristas.php';
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
$crud = new crud($conn);
//validacion del boton actualizar
if (isset($_POST['btn-update'])) {
    $Id = $_GET['edit_id'];
    $Nombre = $_POST['Nombre'];
    $Fecha_de_Nacimiento = $_POST['Fecha_de_Nacimiento'];
    $Fecha_de_Ingreso = $_POST['Fecha_de_Ingreso'];
    $Dui = $_POST['Dui'];
    //hace referencia a la funcion update
    if ($crud->update($Id, $Nombre, $Fecha_de_Nacimiento,  $Fecha_de_Ingreso, $Dui)) {
        $msg = "<b>WOW, Actualizacion exitosa!</b>";
    } else {
        $msg = "<b>ERROR, algo anda mal</b>";
    }
}
if (isset($_GET['edit_id'])) {
    $Id = $_GET['edit_id'];
    extract($crud->getID($Id));
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
    <title>MOTORISTAS</title>
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
                 <h3>ACTUALIZAR MOTORISTA</h3>
                <hr>
                <form method="post">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input id="Nombre" value="<?php echo $Nombre; ?>" class="form-control" type="text" name="Nombre">
                    </div>
                    <div class="form-group">
                        <label for="Fecha_de_Nacimiento">Fecha de Nacimiento:</label>
                        <input id="Fecha_de_Nacimiento" value="<?php echo $Fecha_de_Nacimiento; ?>" class="form-control" type="text" name="Fecha_de_Nacimiento">
                    </div>
                    <div class="form-group">
                        <label for="Fecha_de_Ingreso">Fecha de Ingreso:</label>
                        <input id="Fecha_de_Ingreso" value="<?php echo $Fecha_de_Ingreso; ?>" class="form-control" type="text" name="Fecha_de_Ingreso">
                    </div>
                    <div class="form-group">
                        <label for="Dui">DUI:</label>
                        <input id="Dui" value="<?php echo $Dui; ?>" class="form-control" type="text" name="Dui">
                    </div> <br>
                    <button class="btn btn-primary" name="btn-update" type="submit">Actualizar</button>
                </form>
            </div>


        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>