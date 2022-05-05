<?php
include_once 'config.php';
include_once 'class/motoristas.php';
$crud = new crud($conn);
if (isset($_POST['btn-del'])) {
    $Id = $_GET['delete_id'];
    $crud->delete($Id);
    header("Location:eliminar_motorista.php?alerta");
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
    <title>DELETE</title>
</head>

<body>
    <div class="container"><br>
        <?php
        if (isset($_GET['alerta'])) {
        ?>
            <div class="alert alert-success">
                <strong>Hecho!</strong> Motorista Eliminado Correcctamente!
            </div>
        <?php
        } else {
        ?>
            <div class="alert alert-danger">
                <strong>Alerta!</strong> Esta Seguro que requiere Eliminar el Motorista
            </div>
        <?php
        }
        ?>
        <?php
        if (isset($_GET['delete_id'])) {
        ?>
            <table class='table table-bordered'>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>FECHA DE NACIMINETO</th>
                    <th>FECHA DE INGRESO</th>
                    <th>DUI</th>
                </tr>
                <?php
                $stmt = $conn->prepare("SELECT * FROM motorista WHERE Id=:Id");
                $stmt->execute(array(":Id" => $_GET['delete_id']));
                while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
                ?>
                    <tr>
                        <td><?php echo ($row['Id']); ?></td>
                        <td><?php echo ($row['Nombre']); ?></td>
                        <td><?php echo ($row['Fecha_de_Nacimiento']); ?></td>
                        <td><?php echo ($row['Fecha_de_Ingreso']); ?></td>
                        <td><?php echo ($row['Dui']); ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        <?php
        }
        ?>
    </div>
    <div class="container">
        <p>
            <?php
            if (isset($_GET['delete_id'])) {
            ?>
        <form method="POST">
            <input type="hidden" name="Id" value="<?php echo $row['Id']; ?>" />
            <button class="btn btn-large btn-primary" type="submit" name="btn-del"><i class="glyphicon glyphicon-trash"></i> Yes</button>
            <a href="admin_motorista.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> No</a>
        </form>
    <?php
            } else {
    ?>
        <a href="admin_motorista.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i>Regresar</a>
    <?php
            }
    ?>
    </p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>