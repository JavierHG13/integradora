<?php
class usuariosModel {
    private $ObjetoConecion;

    public function __construct() {
        require_once("App/config/BDConecction.php");
        $this->ObjetoConecion = new BDConecction();
    }

    public function getAll() {
        $sql = "SELECT * FROM usuarios";
        $connection = $this->ObjetoConecion->getConeccion();
        $result = $connection->query($sql);
        $usuarios = [];
        while ($usuario = $result->fetch_assoc()) {
            $usuarios[] = $usuario;
        }
        $this->ObjetoConecion->closeConeccion();
        return $usuarios;
    }

    public function getByID() {
        $sql = "SELECT * FROM usuarios ";
        $connection = $this->ObjetoConecion->getConeccion();
        $result = $connection->query($sql);
        $usuarios = [];
        while ($usuario = $result->fetch_assoc()) {
            $usuarios[] = $usuario;
        }
        $this->ObjetoConecion->closeConeccion();
        return $usuarios;
    }

    public function getDireccionByID($id) {
        $sql = "SELECT *FROM usuarios WHERE UsuarioID = $id";
        $connection = $this->ObjetoConecion->getConeccion();
        $resultado = $connection->query($sql);

        $direccion = $resultado->fetch_assoc();

        $this->ObjetoConecion->closeConeccion();

        return $direccion;
    }

    public function ObtenerComprasCliente($idusuario){
        $sql = "SELECT * FROM v_ventas WHERE UsuarioID = $idusuario";
        $connection = $this->ObjetoConecion->getConeccion();
        $resultado = $connection->query($sql);

        $compras = [];

        while ($compra = $resultado->fetch_assoc()) {
            $compras[] = $compra;
        }

        $this->ObjetoConecion->closeConeccion();

        return $compras;
    }


}
?>
