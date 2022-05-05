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
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['direccion']; ?></td>
                <td><?php echo $row['telefono']; ?></td>
                <td><?php echo $row['dui']; ?></td>
                <td>
                    <a class="btn btn-large btn-success" href="edit_cliente.php?edit_id=<?php echo $row['id'] ?>"> Editar</a>
                </td>
                <td>
                    <a class="btn btn-large btn-danger" href="eliminar_cliente.php?delete_id=<?php echo $row['id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</a>
                </td>
            </tr>

<?php

        }
    }

    public function update($id, $nombre,$direccion,$telefono,$dui)
    {
        try {
            $stmt = $this->db->prepare("UPDATE clientes SET nombre=:nombre, direccion=:direccion, telefono=:telefono, dui=:dui
            WHERE id=:id");
            $stmt->bindparam(":nombre", $nombre);
            $stmt->bindparam(":direccion", $direccion);
            $stmt->bindparam(":telefono", $telefono);
            $stmt->bindparam(":dui", $dui);
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getID($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM clientes WHERE id=:id");
        $stmt->execute(array(":id" => $id));
        $editRow = $stmt->fetch(PDO::FETCH_ASSOC);
        return $editRow;
    }
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM clientes WHERE id=:id");
        $stmt->bindparam(":id", $id);
        $stmt->execute();
        return true;
    }
}
