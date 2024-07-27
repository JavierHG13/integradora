<?php
include_once('App/model/clientesModel.php');

class clientesController {
    private $model;

    public function index() {
        $this->model = new usuariosModel();
        $clientes = $this->model->getAll();
        $ListaDeEstilos = [
            'App/styles/plantilla.css',
            'App/styles/usuarios/indexUsuarios.css
        '];

        $Titulo = "Gestión de clientes";

        $vista = "App/view/clientes/indexClientesView.php";
        include_once("App/view/plantillaView.php");
    }

    public function AgregarNuevo() {
        // Define una lista de estilos específicos para la vista de agregar usuarios
        $ListaDeEstilos = [
            'App/styles/usuarios/AgregarUsuario.css'
        ];

        // Define el título de la página
        $Titulo = "Agregar nuevo usuario";

        // Define la vista que se va a cargar
        $vista = "App/view/usuarios/AgregarView.php";

        // Incluye la plantilla de la vista
        include_once("App/view/plantillaView.php");
    }

    public function MostrarDireccion() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $idusuario = $_GET['id'];
            $this->model = new usuariosModel();

            $direccion = $this->model->getDireccionByID($idusuario);
            
            $ListaDeEstilos = [
                'App/styles/plantilla.css',
                'App/styles/categorias/agregarSubcategoria.css'
            ];

            $Titulo = "Dirección del Usuario";
            $vista = "App/view/clientes/direccionView.php";
            include_once("App/view/plantillaView.php");
        }
    }

    public function MostrarCompras() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $idusuario = $_GET['id'];
            $this->model = new usuariosModel();
            
            $compras = $this->model->ObtenerComprasCliente($idusuario);
            
            $ListaDeEstilos = [
                 'App/styles/plantilla.css',
                'App/styles/usuarios/indexUsuarios.css'
            ];

            $Titulo = "Compras del Usuario";
            $vista = "App/view/clientes/comprasCliente.php";
            include_once("App/view/plantillaView.php");
        }
    }
}
?>

