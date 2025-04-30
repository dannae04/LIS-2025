<?php
require_once 'Model.php';

class VentasModel extends Model {
    private $model;

    public function get($id = '') {
        if ($id == '') {
            $query = "SELECT * FROM ventas";
            return $this->get_query($query);
        } else {
            $query = "SELECT * FROM ventas WHERE codigo_ventas=:id_venta";
            return $this->get_query($query, ['id_venta' => $id]);
        }

    }

    public function insert($venta = array()){
        $query = "INSERT INTO ventas (codigo_ventas, codigo_cliente, total)
          VALUES (:codigo_ventas, :codigo_cliente, :total)";
        return $this->set_query($query, $venta);
    }

    //borra venta
    public function delete($id = '') {
        $query = "DELETE FROM ventas WHERE codigo_ventas=:codigo_ventas";
        return $this->set_query($query, ['codigo_ventas' => $id]);
    }

    // Obtiene una venta por ID, incluyendo datos del cliente
public function getById($id) {
    $query = "SELECT v.codigo_ventas AS id, v.total, v.fecha, c.nombre AS cliente
              FROM ventas v
              JOIN clientes c ON v.codigo_cliente = c.codigo_cliente
              WHERE v.codigo_ventas = :id_venta";
    $result = $this->get_query($query, ['id_venta' => $id]);
    return $result[0] ?? null; // Devuelve el primer resultado o null si no hay
}

// Obtiene el detalle de los productos de una venta
public function getDetalleVenta($idVenta) {
    $query = "SELECT p.nombre, dv.cantidad, dv.precio_unitario AS precio
              FROM detalle_venta dv
              JOIN productos p ON p.codigo_productos = dv.codigo_productos
              WHERE dv.codigo_ventas = :id_venta";
    return $this->get_query($query, ['id_venta' => $idVenta]);
}


}


?>