<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <?php require_once "menu.php" ?>
    <title>NUEVO MOTORISTA</title>
</head>

<body>
    <div class="container"><br>
        <div class="row justify-content-center">
            <div class="col-8 p-5 bg-white shadow-lg rounded">
                <?php
                include('config.php');
                if (isset($_POST['registro'])) {

                    $Nombre = $_POST['Nombre'];
                    $Fecha_de_Nacimiento = $_POST['Fecha_de_Nacimiento'];
                    $Fecha_de_Ingreso = $_POST['Fecha_de_Ingreso'];
                    $Dui = $_POST['Dui'];
                    $query = $conn->prepare("SELECT * FROM motorista WHERE Dui=:Dui");
                    $query->bindParam("Dui", $Dui, PDO::PARAM_STR);
                    $query->execute();

                    if ($query->rowCount() > 0) {
                        echo '
                        <div class="alert alert-danger" role="alert">
                        ¡El DUI ya está registrada!
                        </div>';
                    }

                    if ($query->rowCount() == 0) {
                        $query = $conn->prepare("INSERT INTO motorista(Nombre,Fecha_de_Nacimiento,Fecha_de_Ingreso,Dui) VALUES (:Nombre,:Fecha_de_Nacimiento,:Fecha_de_Ingreso,:Dui)");
                        $query->bindParam("Nombre", $Nombre, PDO::PARAM_STR);
                        $query->bindParam("Fecha_de_Nacimiento", $Fecha_de_Nacimiento, PDO::PARAM_STR);
                        $query->bindParam("Fecha_de_Ingreso", $Fecha_de_Ingreso, PDO::PARAM_STR);
                        $query->bindParam("Dui", $Dui, PDO::PARAM_STR);
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