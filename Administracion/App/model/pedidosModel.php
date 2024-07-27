<?php
class pedidosModel {
    private $dbConnection;

    public function __construct() {
        require_once("App/config/BDConecction.php");
        $this->dbConnection = new BDConecction();
    }

    public function getAll() {
        $sql = "SELECT * FROM pedidos";
        $connection = $this->dbConnection->getConeccion();
        $result = $connection->query($sql);
        $pedidos = [];
        while ($pedido = $result->fetch_assoc()) {
            $pedidos[] = $pedido;
        }
        $this->dbConnection->closeConeccion();
        return $pedidos;
    }
}
?>
