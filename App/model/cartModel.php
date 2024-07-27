<?php 
class cartModel {

    private $objetoConexion;

    public function __construct() {
        // Incluimos el archivo de configuración de la conexión a la base de datos
        require_once("App/config/BDConecction.php");

        // Creamos una nueva instancia de la conexión a la base de datos
        $this->objetoConexion = new BDConecction();
    }

    public function ViewCart() {
        // Método vacío. Implementar funcionalidad para ver el carrito aquí.
    }

    public function AddProduct($idProducto, $idUsuario) {
        // Conexión a la base de datos
        $conexion = $this->objetoConexion->getConeccion();
        
        // Preparamos la consulta para obtener los detalles del producto
        $consultaProducto = "SELECT * FROM v_productos WHERE ProductoID = $idProducto";
        $ResultadoProducto = $conexion->query($consultaProducto);
    
        if ($ResultadoProducto && $ResultadoProducto->num_rows > 0) {
            // Obtenemos los detalles del producto
            $Producto = $ResultadoProducto->fetch_assoc();
            $ProductoID = $Producto['ProductoID'];
            $Stock = $Producto['Stock'];
            
            // Verificamos si el stock es suficiente
            if ($Stock <= 0) {
                return false; // El stock no es suficiente
            }
    
            // Preparamos la consulta para seleccionar el carrito del usuario
            $sql = "SELECT * FROM carritos WHERE UsuarioID = $idUsuario";
            $Respuesta = $conexion->query($sql);
    
            if ($Respuesta && $Respuesta->num_rows > 0) {
                // Si el usuario ya tiene un carrito, obtenemos su ID del carrito
                $infoCart = $Respuesta->fetch_assoc();
                $CartID = $infoCart['CarritoID'];
    
                // Preparamos la consulta para obtener los datos del producto en el carrito
                $consultaDetalle = "SELECT * FROM detallescarritos WHERE CarritoID = $CartID AND ProductoID = $idProducto";
                $ResultadoDetalle = $conexion->query($consultaDetalle);
    
                if ($ResultadoDetalle && $ResultadoDetalle->num_rows > 0) {
                   // Si el producto ya está en el carrito, verificamos la cantidad actual
                    $detalle = $ResultadoDetalle->fetch_assoc();
                    $cantidadActual = $detalle['Cantidad'];
                    $nuevaCantidad = $cantidadActual + 1;

                    // Verificamos que la nueva cantidad no exceda el límite de 5
                    if ($nuevaCantidad > 5) {
                        //Terminamos la operacion si el la nueva cantidad esta excediendo del limite
                        return false; 
                    }

                    // Actualizamos la cantidad del producto en el carrito
                    $Sentencia = "UPDATE detallescarritos SET Cantidad = Cantidad + 1 WHERE CarritoID = $CartID AND ProductoID = $idProducto";
                    $conexion->query($Sentencia);

                } else {
                    // Si el producto no está en el carrito, lo añadimos
                    $Sentencia = "INSERT INTO detallescarritos(CarritoID, ProductoID, Cantidad) VALUES($CartID, $ProductoID, 1)";
                    $conexion->query($Sentencia);
                }
    
                // Actualizamos el stock del producto
                $actualizacionStock = "UPDATE productos SET Stock = Stock - 1 WHERE ProductoID = $ProductoID";
                $conexion->query($actualizacionStock);
    
            } else {
                // Si el usuario no tiene un carrito, creamos un nuevo registro
                $sql = "INSERT INTO carritos(UsuarioID) VALUES($idUsuario)";
                $conn = $this->objetoConexion->getConeccion();
                $conn->query($sql);
    
                // Obtenemos el ID del nuevo carrito
                $sql = "SELECT * FROM carritos WHERE UsuarioID = $idUsuario";
                $Respuesta = $conexion->query($sql);
                $CartNuevo = $Respuesta->fetch_assoc();
                $CartID = $CartNuevo['CarritoID'];
    
                // Insertamos el producto en la tabla detalles carrito
                $Sentencia = "INSERT INTO detallescarritos(CarritoID, ProductoID, Cantidad) VALUES($CartID, $ProductoID, 1)";
                $conexion->query($Sentencia);
    
                // Actualizamos el stock del producto
                $actualizacionStock = "UPDATE productos SET Stock = Stock - 1 WHERE ProductoID = $ProductoID";
                $conexion->query($actualizacionStock);
            }
            
            // Cerramos la conexión a la base de datos
            $this->objetoConexion->closeConeccion();
            return $Producto;
        } else {
            // El producto no existe
            return false;
        }
    }
    
    

    public function verAgregado($idUsuario) {
        // Preparamos la consulta para obtener los productos agregados del usuario
        $sql = "SELECT * FROM v_cartUser WHERE UsuarioID =" . $idUsuario;
        $conex = $this->objetoConexion->getConeccion();
        $Resultado = $conex->query($sql);

        // Creamos un array para almacenar los productos agregados
        $ProductosAgregados = array();

        // Recorremos los resultados y los almacenamos en el array
        while ($Productos = $Resultado->fetch_assoc()) {
            $ProductosAgregados[] = $Productos;
        }

        // No cerramos la conexión porque se va a utilizar en el modelo TotalAgregado
        return $ProductosAgregados;
    }

    public function TotalAgregado($idUsuario) {
        // Preparamos la consulta para obtener el total agregado del usuario
        $sql = "SELECT * FROM v_totalCartUser WHERE UsuarioID =" . $idUsuario;
        $conex = $this->objetoConexion->getConeccion();
        $Resultado = $conex->query($sql);

        if ($Resultado) {
            // Si hay resultados, los almacenamos en una variable
            $TotalAgregado = $Resultado->fetch_assoc();
        }

        // Cerramos la conexión a la base de datos
        $this->objetoConexion->closeConeccion();

        // Retornamos el total agregado
        return $TotalAgregado;
    }

    public function SumCart($iDDetalleCart, $idproducto) {
        // Preparamos la consulta para sumar al carrito
        $sql = "CALL SumarAlcarrito($iDDetalleCart, $idproducto)";
        $conex = $this->objetoConexion->getConeccion();
        $resultado = $conex->query($sql);

        // Verificamos si la consulta fue exitosa
        $Respuesta = $resultado ? true : false;

        // Retornamos la respuesta
        return $Respuesta;
    }

    public function RestCart($iDDetalleCart, $idproducto) {
        // Preparamos la consulta para restar o eliminar producto del carrito
        $sql = "CALL RestarOEliminarProductoDelCarrito($iDDetalleCart, $idproducto)";
        $conex = $this->objetoConexion->getConeccion();
        $resultado = $conex->query($sql);

        // Verificamos si la consulta fue exitosa
        $Respuesta = $resultado ? true : false;

        // Retornamos la respuesta
        return $Respuesta;
    }
}
?>
