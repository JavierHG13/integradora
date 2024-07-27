<?php
include_once('App/model/marcasModel.php');

class marcasController {
    private $model;

    public function index() {
        session_start();
        if(isset($_SESSION['logedin']) && $_SESSION['logedin'] == true){
            $this->model = new marcasModel();
            $marcas = $this->model->getAll();
            $ListaDeEstilos = ['App/styles/marcas/indexMarcas.css'];
            $Titulo = "Gestión de Marcas";
            $vista = "App/view/marcas/indexMarcasView.php";
            include_once("App/view/plantillaView.php");
        }else{
            header('Location: http://localhost/Administracion/');
            exit;
        }
        
    }

    public function AgregarNuevo() {
        // Define una lista de estilos específicos para la vista de agregar marcas
        $ListaDeEstilos = [
            'App/styles/marcas/AgregarMarca.css'
        ];

        // Define el título de la página
        $Titulo = "Agregar nueva marca";

        // Define la vista que se va a cargar
        $vista = "App/view/marcas/AgregarView.php";

        // Incluye la plantilla de la vista
        include_once("App/view/plantillaView.php");
    }
}
?>
