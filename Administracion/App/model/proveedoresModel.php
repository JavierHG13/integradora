<?php
class proveedoresModel {
    private $ObjetoConexion;

    public function __construct() {
        require_once("App/config/BDConecction.php");
        $this->ObjetoConexion = new BDConecction();
    }

    public function getAll() {
        $sql = "SELECT * FROM proveedores";
        $connection = $this->ObjetoConexion->getConeccion();
        $result = $connection->query($sql);
        $proveedores = [];
        while ($proveedor = $result->fetch_assoc()) {
            $proveedores[] = $proveedor;
        }
        $this->ObjetoConexion->closeConeccion();
        return $proveedores;
    }

    public function getByID($id){

        $consultaSQL = "SELECT * FROM proveedores WHERE ProveedorID =". $id;
      
        $connection = $this->ObjetoConexion->getConeccion();
       
        $resultado = $connection->query($consultaSQL);
     
        if($resultado && $resultado->num_rows>0){

            $proveedor =$resultado->fetch_assoc();

        }else{
            $proveedor =false;
        }

        $this->ObjetoConexion->closeConeccion();
      
        return $proveedor;

    }
    public function Add($proveedor){
        if (!isset($Proveedor['contacto'], $Proveedor['rfc'], $Proveedor['telefono'], $Proveedor['correo'], $Proveedor['direccion']) ||
            empty($Proveedor['contacto']) || empty($Proveedor['rfc']) || empty($Proveedor['telefono']) || empty($Proveedor['correo']) || empty($Proveedor['direccion'])) {
        
            return false;
        }

        $contacto = $datosProveedor['contacto'];
        $rfc = $datosProveedor['rfc'];
        $telefono = $datosProveedor['telefono'];
        $correo = $datosProveedor['correo'];
        $direccion = $datosProveedor['direccion'];

        $ConsultaSQL = "INSERT INTO proveedores(contacto, rfc, telefono, correo, direccion) VALUES('$contacto', '$rfc','$telefono', '$correo','$direccion')";

        $conexion = $this->objetoConexion->getConeccion();

        $resultado = $conexion->query($ConsultaSQL);

        $respuesta = $resultado ? true : false;

        $this->objetoConexion->closeConeccion();

        return $respuesta;

    }

    public function update($datosProveedor) {
        
        if (!isset($datosProveedor['id'], $datosProveedor['contacto'], $datosProveedor['rfc'], $datosProveedor['telefono'], $datosProveedor['correo'], $datosProveedor['direccion']) ||
            empty($datosProveedor['id']) || empty($datosProveedor['contacto']) || empty($datosProveedor['rfc']) || empty($datosProveedor['telefono']) || empty($datosProveedor['correo']) || empty($datosProveedor['direccion'])) {
                error_log("update: Faltan datos del proveedor o están vacíos");
                return false;
        }

        $id = $datosProveedor['id'];
        $contacto = $datosProveedor['contacto'];
        $rfc = $datosProveedor['rfc'];
        $telefono = $datosProveedor['telefono'];
        $correo = $datosProveedor['correo'];
        $direccion = $datosProveedor['direccion'];

        $ConsultaSQL = "UPDATE proveedores SET contacto = '$contacto', rfc = '$rfc', telefono = '$telefono', email = '$correo', direccion = '$direccion' WHERE ProveedorID = $id";

        $conexion= $this->ObjetoConexion->getConeccion();
        $resultado = $conexion->query($ConsultaSQL);
        $respuesta = $resultado ? true : false;
        $this->ObjetoConexion->closeConeccion();
        return $respuesta;
    }
}
?>
