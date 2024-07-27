<?php
class productosModel {
    private $ObjetoConexion;

    public function __construct() {
        require_once("App/config/BDConecction.php");
        $this->ObjetoConexion = new BDConecction();
    }

    public function getAll() {
        $ConsultaSQL = "SELECT * FROM productos";
        $conexion = $this->ObjetoConexion->getConeccion();
        $resultado = $conexion->query($ConsultaSQL);
        $datosProductos = [];
        while ($datosProducto = $resultado->fetch_assoc()) {
            $datosProductos[] = $datosProducto;
        }
        $this->ObjetoConexion->closeConeccion();
        return $datosProductos;
    }

    public function getById($id) {
        $ConsultaSQL = "SELECT * FROM productos WHERE ProductoID = $id";
        $conexion = $this->ObjetoConexion->getConeccion();
        $resultado = $conexion->query($ConsultaSQL);
        $datosProducto = $resultado->fetch_assoc();
        $this->ObjetoConexion->closeConeccion();
        return $datosProducto;
    }

    public function Actualizar($datosProducto) {
         // Validar la presencia de los campos requeridos
        if (!isset($datosProducto['ProductoID'], $datosProducto['Nombre'], $datosProducto['Precio'], $datosProducto['Stock'], $datosProducto['CategoriaID'], $datosProducto['SubcategoriaID'], $datosProducto['URL'])) {
            return false;
        }
        
        // Obtener los datos del producto
        $ProductoID = $datosProducto['ProductoID'];
        $Nombre = $datosProducto['Nombre'];
        $PrecioVenta = $datosProducto['Precio'];
        $Stock = $datosProducto['Stock'];
        $CategoriaID = $datosProducto['CategoriaID'];
        $SubcategoriaID = $datosProducto['SubcategoriaID'];
        $Imagen = $datosProducto['URL'];

        //Vamos a buscar el producto para sumar el stock
        $SQL = "SELECT * FROM productos WHERE ProductoID = $ProductoID";
        //Abrimos la conexion
        $conexion = $this->ObjetoConexion->getConeccion();
        //Ejecutamos la consulta
        $query = $conexion->query($SQL);
        //Obtenemos datos de la consulta
        $ResultadoProducto = $query->fetch_assoc();
        //Obtenemos el valor del stock actual
        $StockActual = $ResultadoProducto['Stock'];
        
        //Sumamos el agregado mas el actual
        $NuevoStock = $StockActual + $Stock;
    
        //Preparamos la consulta
        $ConsultaSQL = "UPDATE productos SET Nombre='$Nombre', PrecioVenta=$PrecioVenta, Stock=$NuevoStock, CategoriaID = $CategoriaID, SubcategoriaID = $SubcategoriaID,
        Imagen = '$Imagen' WHERE ProductoID=$ProductoID";
        //En este caso utilizamos la conexion abierta anteriormente
        $resultado = $conexion->query($ConsultaSQL);

        //Verificamos que la respuesta es verdadera o falsa
        $respuesta = $resultado ? true : false;

        $this->ObjetoConexion->closeConeccion();

        return $respuesta;

    }

    public function Agregar($Producto) {
        // Verifica que todas las claves estén presentes en el arreglo
        if (!isset($Producto['Nombre'], $Producto['Descripcion'], $Producto['PrecioVenta'], $Producto['PrecioCompra'], $Producto['MarcaID'], $Producto['Stock'], $Producto['CategoriaID'], $Producto['SubcategoriaID'], $Producto['URL'], $Producto['ProveedorID'])) {
            return false;
        }
    
        // Obtener los datos del producto en el array
        $Nombre = $Producto['Nombre'];
        $Descripcion = $Producto['Descripcion'];
        $PrecioVenta = $Producto['PrecioVenta'];
        $PrecioCompra = $Producto['PrecioCompra'];
        $Stock = $Producto['Stock'];
        $ProveedorID = $Producto['ProveedorID'];
        $MarcaID = $Producto['MarcaID'];
        $CategoriaID = $Producto['CategoriaID'];
        $SubcategoriaID = $Producto['SubcategoriaID'];
        $URL = $Producto['URL'];
    
        // Consulta SQL
        $ConsultaSQL = "INSERT INTO productos (Nombre, Descripcion, PrecioVenta, PrecioCompra, Stock, CategoriaID, MarcaID, SubcategoriaID, ProveedorID, Imagen) 
                        VALUES ('$Nombre', '$Descripcion', $PrecioVenta, $PrecioCompra, $Stock, $CategoriaID, $MarcaID, $SubcategoriaID, $ProveedorID, '$URL')";
        echo $ConsultaSQL;
        
        $conexion = $this->ObjetoConexion->getConeccion();
        
        $resultado = $conexion->query($ConsultaSQL);
    
        $respuesta = $resultado ? true : false;
    
        return $respuesta;
    }
    

    public function eliminar($id) {
        
        $ConsultaSQL = "DELETE FROM productos WHERE ProductoID = $id";

        $conexion = $this->ObjetoConexion->getConeccion();

        $resultado = $conexion->query($ConsultaSQL);

        $respuesta = $resultado ? true : false;

        $this->ObjetoConexion->closeConeccion();

        return $respuesta;
    }
}
?>


