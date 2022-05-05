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
                <td><?php echo $row['cliente']; ?></td>
                <td><?php echo $row['plato']; ?></td>
                <td><?php echo $row['fecha']; ?></td>
                <td><?php echo $row['direccion_de_entrega']; ?></td>
                <td><?php echo $row['motorista']; ?></td>
                <td><?php echo $row['precio']; ?></td>
                <td><?php echo $row['isv']; ?></td>
                <td><?php echo $row['total']; ?></td>
                <td>
                    <a class="btn btn-large btn-success" href="edit_pedido.php?edit_id=<?php echo $row['id'] ?>"> Editar</a>
                </td>
                <td>
                    <a class="btn btn-large btn-danger" href="eliminar_pedido.php?delete_id=<?php echo $row['id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</a>
                </td>
            </tr>

<?php

        }
    }

    public function update($id,$cliente,$plato,$fecha,$direccion_de_entrega,$motorista,$precio,$isv,$total)
    {
        try {
            $stmt = $this->db->prepare("UPDATE pedidos SET cliente=:cliente,plato=:plato,fecha=:fecha,direccion_de_entrega=:direccion_de_entrega,motorista=:motorista,precio=:precio,isv=:isv,total=:total
            WHERE id=:id");
            $stmt->bindparam(":cliente", $cliente);
            $stmt->bindparam(":plato", $plato);
            $stmt->bindparam(":fecha", $fecha);
            $stmt->bindparam(":direccion_de_entrega", $direccion_de_entrega);
            $stmt->bindparam(":motorista", $motorista);
            $stmt->bindparam(":precio", $precio);
            $stmt->bindparam(":isv", $isv);
            $stmt->bindparam(":total", $total);
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
        $stmt = $this->db->prepare("SELECT * FROM pedidos WHERE id=:id");
        $stmt->execute(array(":id" => $id));
        $editRow = $stmt->fetch(PDO::FETCH_ASSOC);
        return $editRow;
    }
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM pedidos WHERE id=:id");
        $stmt->bindparam(":id", $id);
        $stmt->execute();
        return true;
    }
}
