<?php
include_once('App/model/ventasModel.php');

class ventasController {
    private $model;

    public function index() {
        session_start();
        if(isset($_SESSION['logedin']) && $_SESSION['logedin'] == true){
            $this->model = new ventasModel();

            $ventas = $this->model->getAll();

            $ListaDeEstilos = [
            'App/styles/plantilla.css',
            'App/styles/ventas/indexVentas.css'
            ];
            $Titulo = "Gestión de Ventas";
            $vista = "App/view/ventas/indexVentasView.php";
            include_once("App/view/plantillaView.php");
        }else{
            header('Location: http://localhost/Administracion/');
            exit;
        }
    }

    public function VerDetalles() {
        session_start();
        if(isset($_SESSION['logedin']) && $_SESSION['logedin'] == true){
            
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
                $idVenta = $_GET['idventa'];
        
                $this->model = new ventasModel();
    
                $detalle = $this->model->getCompras($idVenta);
                
                if($detalle){
                    $ListaDeEstilos = [
                        'App/styles/plantilla.css',
                        'App/styles/ventas/indexVentas.css'
                    ];
                    $Titulo = "Detalles de la venta";
                    $vista = "App/view/ventas/detallesView.php";
                    include_once("App/view/plantillaView.php");
                }
                else{
                    header('Location: http://localhost/Administracion?C=ventasController&M=index');
                }
            }

            
        }else{
            header('Location: http://localhost/Administracion/');
            exit;
        }
        
    }
    public function eliminarventa(){

        if ($_SERVER['REQUEST_METHOD'] == 'GET')
         {
    
            $idventa = $_GET['id'];
    
            $this->model = new ventasModel();

            $respuesta = $this->model->deleteVenta($idventa);

            if($respuesta){
                echo "Se elimino correctamente";
            }else{
                echo "Ups! Hubo problemas al eliminar";
            }
        }
    }

    public function deleteDetalle()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET')
         {
    
            $iddetalle = $_GET['id'];
    
            $this->model = new ventasModel();

            $respuesta = $this->model->eliminarDetalleVenta($iddetalle);

            if($respuesta){
                echo "Se elimino correctamente";
                header('Location: http://localhost/Administracion?C=ventasController&M=index');
            }else{
                echo "Ups! Hubo problemas al eliminar";
            }
        }

    }
    
}
?>


