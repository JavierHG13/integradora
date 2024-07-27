<?php
include_once('App/model/metodosPagoModel.php');

class metodosPagoController {
    private $model;

    public function index() {
        $this->model = new metodosPagoModel();
        $metodosPago = $this->model->getAll();
        $this->model->closeConnection(); // Cerramos la conexión después de obtener los datos
        $ListaDeEstilos = ['App/styles/metodosPago/indexMetodosPago.css'];
        $Titulo = "Gestión de Métodos de Pago";
        $vista = "App/view/metodosPago/indexMetodosPagoView.php";
        include_once("App/view/plantillaView.php");
    }

    public function AgregarNuevo() {
        $ListaDeEstilos = ['App/styles/metodosPago/AgregarMetodoPago.css'];
        $Titulo = "Agregar nuevo método de pago";
        $vista = "App/view/metodosPago/AgregarView.php";
        include_once("App/view/plantillaView.php");
    }
}
?>
