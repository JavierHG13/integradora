<?php
class categoriasModel {
    private $ObjetoConexion;
    private $connection;

    public function __construct() {
        require_once("App/config/BDConecction.php");
        $this->ObjetoConexion = new BDConecction();
    }

    public function getAll() {
        //Preparamos la consulta
        $sql = "SELECT subcategorias.SubcategoriaID, subcategorias.Subcategoria, categorias.Categoria 
        FROM subcategorias 
        INNER JOIN categorias ON subcategorias.CategoriaID = categorias.CategoriaID";

        // Obtener la conexión a la base de datos
        $conexion = $this->ObjetoConexion->getConeccion();

        // Ejecutar la consulta
        $result = $conexion->query($sql);

        // Inicializar un array para almacenar las subcategorías
        $subcategorias = [];

        // Iterar sobre los resultados y almacenar cada subcategoría en el array
        while ($subcategoria = $result->fetch_assoc()) {
            $subcategorias[] = $subcategoria;
        }

        // Cerrar la conexión a la base de datos
        $conexion->close();

        // Devolver el array de subcategorías
        return $subcategorias;
    }

    public function ObtenerCategorias(){
        //Paso 1: Preparamos la consulta
        $consulta = "SELECT * FROM categorias";
        // Obtener la conexión a la base de datos
        $conexion = $this->ObjetoConexion->getConeccion();
        // Ejecutamos la consulta
        $resultado = $conexion->query($consulta);
        
        //Craemos un array donde almacenaremos los resultados
        $categorias = [];

        // Paso 4: Verificamos si se encontró al menos un resultado
        while ($categoria = $resultado->fetch_assoc()) {
            $categorias[] = $categoria;
        }
    
        
    
        // Paso 6: Retornamos los resultados obtenidos (datos del usuario encontrado o false si no se encontró)
        return $categorias;
    }

    public function ObtenerSubcategorias(){
         //Paso 1: Preparamos la consulta
         $consulta = "SELECT * FROM subcategorias";
         // Obtener la conexión a la base de datos
         $conexion = $this->ObjetoConexion->getConeccion();
         // Ejecutamos la consulta
         $resultado = $conexion->query($consulta);
         
         //Craemos un array donde almacenaremos los resultados
         $subcategorias = [];
 
         // Paso 4: Verificamos si se encontró al menos un resultado
         while ($subcategoria = $resultado->fetch_assoc()) {
             $subcategorias[] = $subcategoria;
         }
     
        // Paso 5: Cerramos la conexión a la base de datos
        $this->ObjetoConexion->closeConeccion();
     
         // Paso 6: Retornamos los resultados obtenidos (datos del usuario encontrado o false si no se encontró)
         return $subcategorias;
    }

    public function AddCategoria($Categoria){
        $ConsultaSQL = "INSERT INTO categorias(Categoria) VALUES('$Categoria')";

        $conexion = $this->ObjetoConexion->getConeccion();

        $resultado = $conexion->query($ConsultaSQL);

        $respuesta = $resultado ? true : false;

        $this->ObjetoConexion->closeConeccion();

        return $respuesta;
    }

    public function AddSubcategory($subcategoria, $categoria){

        $ConsultaSQL = "INSERT INTO subcategorias(Subcategoria, CategoriaID) VALUES('$subcategoria',$categoria)";

        $conexion = $this->ObjetoConexion->getConeccion();

        $resultado = $conexion->query($ConsultaSQL);

        $respuesta = $resultado ? true : false;

        $this->ObjetoConexion->closeConeccion();

        return $respuesta;

    }



}
?>
