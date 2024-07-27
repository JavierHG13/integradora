<?php
include_once('App/model/categoriasModel.php');

class categoriasController {
    private $model;
    private $vista;

    public function index() {

        $this->model = new categoriasModel();
        
        $subcategorias = $this->model->getAll();

        $ListaDeEstilos = [
        'App/styles/plantilla.css',
        'App/styles/categorias/indexCategorias.css'
        ];
        $Titulo = "Gestión de Categorías";

        $vista = "App/view/categorias/indexCategoriasview.php";
        
        include_once("App/view/plantillaView.php");
    }

    public function Categorias(){
         //Instanciamos el modelo de la categoria
         $this->model = new categoriasModel();
         $categorias = $this->model->ObtenerCategorias();

         $ListaDeEstilos = [
            'App/styles/plantilla.css',
            'App/styles/categorias/indexCategorias.css'
            ];
            $Titulo = "Gestión de Categorías";
    
            $vista = "App/view/categorias/categorieView.php";
            
            include_once("App/view/plantillaView.php");
    }



    public function AgregarCategoria(){
        
        $ListaDeEstilos = [
            'App/styles/plantilla.css',
            'App/styles/categorias/agregarSubcategoria.css'
        ];
        $Titulo = "Agregar Categoria";
            
        $vista = "App/view/categorias/AgregarCategoria.php";
        include_once("App/view/plantillaView.php");
    }
        
    public function AddCategory(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $Categoria = $_POST['categoria'];
    
            $this->model = new categoriasModel();}

            $respuesta = $this->model->AddCategoria($Categoria);

            if ($respuesta) {
                header('Location: http://localhost/Administracion?C=categoriasController&M=Categorias');
            } else {
                header('Location: http://localhost/Administracion?C=categoriasController&M=AgregarCategoria');
            }
        } 

    public function AgregarSubcategoria() {

        $ListaDeEstilos = [
        'App/styles/plantilla.css',
        'App/styles/categorias/agregarSubcategoria.css'
        ];
        $Titulo = "Agregar Subcategoria";

        $this->model = new categoriasModel();
        $categorias = $this->model->ObtenerCategorias();
        
        $vista = "App/view/categorias/AgregarSubcategoria.php";
        include_once("App/view/plantillaView.php");

    }

    public function AddSubcategory()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
        {
            $subcategoria = $_POST['subcategoria'];
            $categoria = $_POST['categoria'];
    
            $this->model = new categoriasModel();}

            $respuesta = $this->model->AddSubcategory($subcategoria, $categoria);

            if ($respuesta) {
                header('Location: http://localhost/Administracion?C=categoriasController&M=Categorias');
            } else {
                header('Location: http://localhost/Administracion?C=proveedoresController&M=AgregarCategoria');
        }
     } 



    public function editarSubcategorias(){

    }
    public function Editar($id) {
        $this->categoriasModelo = new categoriasModel();
        $Categoria = $this->categoriasModelo->getById($id);
        $ListaDeEstilos = ['App/styles/categorias/AgregarCategoria.css'];
        $Titulo = "Editar categoría";
        $vista = "App/view/categorias/EditarView.php";
        include_once("App/view/plantillaView.php");
    }

    public function Actualizar() {
       
    }

    public function Eliminar($id) {
        $this->categoriasModelo = new categoriasModel();
        $this->categoriasModelo->delete($id);
        header('Location: http://localhost/Administracion?C=categoriasController&M=index');
    }

    public function EliminarSubcategoria(){
        if($_SERVER['REQUEST_METHOD'] == 'GET') {

            $id = $_GET['idproducto'];
            //Instanciamos el modelo para obtenero los datos del producto
            $this->productosmodelo = new productosModel();

            $respuesta = $this->productosmodelo->eliminar($id);

            if($respuesta){
                header('Location: http://localhost/Administracion?C=categoriasController&M=index');
            }else{
                header('Location: http://localhost/Administracion?C=productosController&M=index');
            }
        }        
    }

    public function EliminarCategoria(){
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
