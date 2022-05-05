<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <?php require_once "menu.php" ?>
    <title>NUEVO PEDIDO</title>
</head>

<body>
    <div class="container"><br>
        <div class="row justify-content-center">
            <div class="col-8 p-5 bg-white shadow-lg rounded">
                <?php
                include('config.php');
                if (isset($_POST['registro'])) {

                    $cliente = $_POST['cliente'];
                    $plato = $_POST['plato'];
                    $fecha = $_POST['fecha'];
                    $direccion_de_entrega = $_POST['direccion_de_entrega'];
                    $motorista = $_POST['motorista'];
                    $precio = $_POST['precio'];
                    $isv = $_POST['isv'];
                    $total = $_POST['total'];
                    $query = $conn->prepare("SELECT * FROM pedidos WHERE cliente=:cliente");
                    $query->bindParam("cliente", $cliente, PDO::PARAM_STR);
                    $query->execute();

                    if ($query->rowCount() > 0) {
                        echo '
                        <div class="alert alert-danger" role="alert">
                        ¡Este Cliente ya está registrada!
                        </div>';
                    }

                    if ($query->rowCount() == 0) {
                        $query = $conn->prepare("INSERT INTO pedidos (cliente,plato,fecha,direccion_de_entrega,motorista,precio,isv,total) VALUES (:cliente,:plato,:fecha,:direccion_de_entrega,:motorista,:precio,:isv,:total)");
                        $query->bindParam("cliente", $cliente, PDO::PARAM_STR);
                        $query->bindParam("plato", $plato, PDO::PARAM_STR);
                        $query->bindParam("fecha", $fecha, PDO::PARAM_STR);
                        $query->bindParam("direccion_de_entrega", $direccion_de_entrega, PDO::PARAM_STR);
                        $query->bindParam("motorista", $motorista, PDO::PARAM_STR);
                        $query->bindParam("precio", $precio, PDO::PARAM_STR);
                        $query->bindParam("isv", $isv, PDO::PARAM_STR);
                        $query->bindParam("total", $total, PDO::PARAM_STR);
                        $result = $query->execute();

                        if ($result) {
                            echo '
                <div class="alert alert-success" role="alert">
                ¡Tu registro fue exitoso!
                </div>';
                        } else {
                            echo '
                <div class="alert alert-danger" role="alert">
                ¡Algo salió mal!
                </div>';
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>