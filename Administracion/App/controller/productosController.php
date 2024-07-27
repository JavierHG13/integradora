<?php
include_once('App/model/productosModel.php');
include_once('App/model/categoriasModel.php');
include_once('App/model/proveedoresModel.php');
include_once('App/model/marcasModel.php');

class productosController {
    private $vista;
    private $productosmodelo;
    private $modelocategoria;
    private $modelomarca;
    private $modeloproveedor;

    public function index() {

        // Inicia la sesión
        session_start();
        // Verifica si la sesión de administrador está activa
        if (isset($_SESSION['SesionAdministrador']) && !empty($_SESSION['SesionAdministrador'])) {
            
            $this->productosmodelo = new productosModel();
            //Recepcionamos los datos de la consulta
            $Productos = $this->productosmodelo->getAll();
    
            
            $ListaDeEstilos = [
            'App/styles/plantilla.css',
            'App/styles/productos/indexProductos.css'];
    
            $Titulo = "Gestión de productos";
            
            $vista = "App/view/productos/indexProductosView.php";
            include_once("App/view/plantillaView.php");
        } else{

            header('Location: http://localhost/Administracion/'); // O la URL que corresponda
            exit;
        }
        
    }


    public function FormularioEditar(){
        session_start();
        if(isset($_SESSION['logedin']) && $_SESSION['logedin'] == true){
            
            if($_SERVER['REQUEST_METHOD'] == 'GET') {

                $id = $_GET['idproducto'];
                //Instanciamos el modelo para obtenero los datos del producto
                $this->productosmodelo = new productosModel();
                $Producto = $this->productosmodelo->getById($id);
    
                //Instanciamos el modelo para cargar algunos datos de la categoria
                $this->modelocategoria = new categoriasModel();
                $categorias = $this->modelocategoria->ObtenerCategorias();
                $subcategorias = $this->modelocategoria->ObtenerSubcategorias();
                
    
                $ListaDeEstilos = [
                    'App/styles/plantilla.css',
                    'App/styles/productos/EditarProducto.css'
                ];
    
                $Titulo = "Editar producto";
    
                $vista = "App/view/productos/EditarView.php";
                include_once("App/view/plantillaView.php");
            }

            
        }else{
            header('Location: http://localhost/Administracion/');
            exit;
        }
    }

    public function Actualizar() {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            print_r($_POST);
            echo "............";
            $datosProducto = array(
                'ProductoID' => $_POST['idproducto'],
                'Nombre' =>  $_POST['nombre'],
                'Precio' => $_POST['precio'],
                'Stock' => $_POST['stock'],
                'CategoriaID' => $_POST['categoria'],
                'SubcategoriaID' => $_POST['subcategoria'],
                'URL' => $_POST['URL'] 
            );

            //Instanciamos el modelo
            $this->productosmodelo = new productosModel();
            //Invocamos el modelo pasandole el array preparado anteriormente
            $respuesta = $this->productosmodelo->Actualizar($datosProducto);
            //
            if($respuesta){
                header('Location: http://localhost/Administracion?C=productosController&M=index');
            }else{
                echo "No actualizo";
                //header('Location: http://localhost/Administracion?C=productosController&M=index');
            }  
        }
    }

    public function AgregarNuevo() {
        //Instanciamos el modelo de la categoria
        $this->modelocategoria = new categoriasModel();
        $categorias = $this->modelocategoria->ObtenerCategorias();
        $subcategorias = $this->modelocategoria->ObtenerSubcategorias();
        
        //Instanciamos el modelo del proveedor
        $this->modeloproveedor = new proveedoresModel();
        $proveedores = $this->modeloproveedor->getAll();
        
        //Instanciamos el modelo de la marca
        $this->modelomarca = new marcasModel();
        $marcas = $this->modelomarca->getAll();

        //Incluir todos los estilos de la pagina
        $ListaDeEstilos = [
            'App/styles/plantilla.css',
             'App/styles/productos/AgregarProducto.css'
        ];

        $Titulo = "Agregar producto";

        $vista = "App/view/productos/agregarView.php";
        include_once("App/view/plantillaView.php");
    }


    public function AgregarProducto() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $Producto = array(
                'Nombre' => $_POST['nombre'],
                'Descripcion' => $_POST['descripcion'],
                'PrecioVenta' => $_POST['precioventa'],
                'PrecioCompra' => $_POST['preciocompra'],
                'Stock' => $_POST['stock'],
                'ProveedorID' => $_POST['proveedor'],
                'MarcaID' => $_POST['marca'],
                'CategoriaID' => $_POST['categoria'],
                'SubcategoriaID' => $_POST['subcategoria'],
                'URL' => $_POST['URL']
            );
    
            // Instanciamos el modelo
            $this->productosmodelo = new productosModel();
            
            // Invocamos el modelo pasandole el array preparado anteriormente
            $respuesta = $this->productosmodelo->Agregar($Producto);
            
            if ($respuesta) {
                header('Location: http://localhost/Administracion?C=productosController&M=index');
            } else {
                echo "No se pudo actualizar";
                header('Location: http://localhost/Administracion?C=productosController&M=index');
            }  
        }
    }

    public function Eliminar(){
        if($_SERVER['REQUEST_METHOD'] == 'GET') {

            $id = $_GET['idproducto'];
            //Instanciamos el modelo para obtenero los datos del producto
            $this->productosmodelo = new productosModel();

            $respuesta = $this->productosmodelo->eliminar($id);

            if($respuesta){
                header('Location: http://localhost/Administracion?C=productosController&M=index');
            }else{
                header('Location: http://localhost/Administracion?C=productosController&M=index');
            }
        }        
    }
    

}
?>
