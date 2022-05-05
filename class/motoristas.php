<?php
class crud
{
    private $db;
    function __construct($conn)
    {
        $this->db = $conn;
    }
    //Muestra los datos en la tabla
    public function dataview($query)
    {
        $stmt = $this->db->prepare($query);
        $stmt->execute() > 0;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
            <tr>
                <td><?php echo $row['Id']; ?></td>
                <td><?php echo $row['Nombre']; ?></td>
                <td><?php echo $row['Fecha_de_Nacimiento']; ?></td>
                <td><?php echo $row['Fecha_de_Ingreso']; ?></td>
                <td><?php echo $row['Dui']; ?></td>
                <td>
                    <a class="btn btn-large btn-success" href="edit_motorista.php?edit_id=<?php echo $row['Id'] ?>"> Editar</a>
                </td>
                <td>
                    <a class="btn btn-large btn-danger" href="eliminar_motorista.php?delete_id=<?php echo $row['Id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</a>
                </td>
            </tr>

<?php

        }
    }

    public function update($Id, $Nombre,$Fecha_de_Nacimiento,$Fecha_de_Ingreso,$Dui)
    {
        try {
            $stmt = $this->db->prepare("UPDATE motorista SET Nombre=:Nombre,Fecha_de_Nacimiento=:Fecha_de_Nacimiento, Fecha_de_Ingreso=:Fecha_de_Ingreso, Dui=:Dui
            WHERE Id=:Id");
            $stmt->bindparam(":Nombre", $Nombre);
            $stmt->bindparam(":Fecha_de_Nacimiento", $Fecha_de_Nacimiento);
            $stmt->bindparam(":Fecha_de_Ingreso", $Fecha_de_Ingreso);
            $stmt->bindparam(":Dui", $Dui);
            $stmt->bindparam(":Id", $Id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getID($Id)
    {
        $stmt = $this->db->prepare("SELECT * FROM motorista WHERE Id=:Id");
        $stmt->execute(array(":Id" => $Id));
        $editRow = $stmt->fetch(PDO::FETCH_ASSOC);
        return $editRow;
    }
    public function delete($Id)
    {
        $stmt = $this->db->prepare("DELETE FROM motorista WHERE Id=:Id");
        $stmt->bindparam(":Id", $Id);
        $stmt->execute();
        return true;
    }
}
