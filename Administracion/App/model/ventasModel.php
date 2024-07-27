<?php
class ventasModel {
    private $dbConnection;

    public function __construct() {
        require_once("App/config/BDConecction.php");
        $this->dbConnection = new BDConecction();
    }

    public function getAll() {
        $sql = "SELECT * FROM ventas";
        $connection = $this->dbConnection->getConeccion();
        $result = $connection->query($sql);
        $ventas = [];
        while ($venta = $result->fetch_assoc()) {
            $ventas[] = $venta;
        }
        $this->dbConnection->closeConeccion();

        return $ventas;
    }

    public function getCompras($idventa) {
        $sql = "SELECT * FROM v_detallesventa WHERE VentaID = $idventa";
        $connection = $this->dbConnection->getConeccion();
        $result = $connection->query($sql);
        $detalles = [];
        while ($venta = $result->fetch_assoc()) {
            $detalles[] = $venta;
        }
        $this->dbConnection->closeConeccion();
        
        return $detalles;
    }

    public function eliminarDetalleVenta($idventaDetalle) {
        $consultaSQL = "DELETE FROM detallesventas WHERE DetalleVentaID = $idventaDetalle";
        $connection = $this->dbConnection->getConeccion();
        $resultado = $connection->query($consultaSQL);

        $respuesta = $resultado ? true : false;

        $this->dbConnection->closeConeccion();

        return $respuesta;
    }
    
    public function deleteVenta($idventa){
        $consultaSQL = "DELETE FROM ventas WHERE VentaID= $idventa";
        
        $connection = $this->dbConnection->getConeccion();
        
        $resultado = $connection->query($consultaSQL);

        $respuesta = $resultado ? true : false;

        $this->dbConnection->closeConeccion();

        return $respuesta;
    }
}
?>
