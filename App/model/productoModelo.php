<?php
    class productoModelo{
        private $ObjetoConexion; //Este objeto nos ayudara a obtener la coneciox de la clase BDConnection

        public function __construct()
        {
            require_once("App/config/BDConecction.php");
            $this->ObjetoConexion=new BDConecction();
        }

        public function getAll(){
            $ConsultaSQL="SELECT * FROM v_productos";
            $conexion=$this->ObjetoConexion->getConeccion();
            $resultado=$conexion->query($ConsultaSQL);

            $productos=array();

            while($producto=$resultado->fetch_assoc()){ //Del resultado lo pasamos a una variable llamada producto
                $productos[]=$producto;
            }
            $this->ObjetoConexion->closeConeccion();

            return $productos;
        }

        public function ById($idproducto){

            $consulta="SELECT * FROM v_productos WHERE productoID = $idproducto";
            $conexion=$this->ObjetoConexion->getConeccion();
            $Resultado= $conexion->query($consulta);

            if($Resultado && $Resultado->num_rows > 0){

                $Detalles =  $Resultado->fetch_assoc();
            }else{
                $Detalles = false; 
            }
            
            $this->ObjetoConexion->closeConeccion();

            return $Detalles;
        }

        public function BuscarPorNombre($Nombre){

            $SQL = "SELECT * FROM v_productos WHERE Nombre LIKE '%$Nombre%'";
            $conexion=$this->ObjetoConexion->getConeccion();
            $resultado=$conexion->query($SQL);

            $Busqueda = array();

            while($productos=$resultado->fetch_assoc()){ 
                $Busqueda[] = $productos;
            }
            $this->ObjetoConexion->closeConeccion();

            return $Busqueda;
        }

        public function BuscarPorFiltros($Categoria, $Marca, $Precio){
            // Construir la consulta base
            $sql = "SELECT * FROM v_productos WHERE 1=1";

            // Añadir condiciones dinámicamente
            if (!empty($Categoria)) {
                $sql .= " AND Categoria = '$Categoria'";
            }

            if (!empty($Marca)) {
                $sql .= " AND Marca = '$Marca'";
            }

            if (!empty($Precio)) {
                $sql .= " ORDER BY PrecioVenta $Precio";
            }

            $conexion=$this->ObjetoConexion->getConeccion();
            $Resultado = $conexion->query($sql);

            $ResultadoFiltro = array();

            while($productos = $Resultado->fetch_assoc()){ 

                $ResultadoFiltro[] = $productos;
            }
            
            $this->ObjetoConexion->closeConeccion();

            return $ResultadoFiltro;
        }
    }
?>