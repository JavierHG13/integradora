<?php
class marcasModel {
    private $dbConnection;

    public function __construct() {
        require_once("App/config/BDConecction.php");
        $this->dbConnection = new BDConecction();
    }

    public function getAll() {
        $sql = "SELECT * FROM marcas";
        $connection = $this->dbConnection->getConeccion();
        $result = $connection->query($sql);
        $marcas = [];
        while ($marca = $result->fetch_assoc()) {
            $marcas[] = $marca;
        }
        $this->dbConnection->closeConeccion();
        return $marcas;
    }
}
?>
