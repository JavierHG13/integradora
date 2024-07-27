<?php
class detalleComprasModel {
    private $dbConnection;
    private $connection; // Declara la propiedad explícitamente

    public function __construct() {
        require_once("App/config/BDConecction.php");
        $this->dbConnection = new BDConecction();
        $this->connection = $this->dbConnection->getConeccion();
    }

    public function getAll() {
        $sql = "SELECT DetalleCompraID AS id, CompraID, ProductoID, Cantidad, PrecioUnitario, proveedorID FROM detallescompras";
        $result = $this->connection->query($sql);
        $detalleCompras = [];
        while ($detalleCompra = $result->fetch_assoc()) {
            $detalleCompras[] = $detalleCompra;
        }
        return $detalleCompras;
    }

    public function getProductoNombre($productoID) {
        $sql = "SELECT Nombre FROM productos WHERE ProductoID = $productoID";
        $result = $this->connection->query($sql);
        $producto = $result->fetch_assoc();
        return $producto ? $producto['Nombre'] : 'Desconocido';
    }

    public function getProveedorNombre($proveedorID) {
        $sql = "SELECT contacto FROM proveedores WHERE proveedorID = $proveedorID";
        $result = $this->connection->query($sql);
        $proveedor = $result->fetch_assoc();
        return $proveedor ? $proveedor['contacto'] : 'Desconocido';
    }

    public function closeConnection() {
        $this->dbConnection->closeConeccion();
    }
}
?>

