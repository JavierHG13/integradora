<?php
include_once('App/model/proveedoresModel.php');

class proveedoresController {
    private $model;

    public function index() {
        session_start();
        if(isset($_SESSION['logedin']) && $_SESSION['logedin'] == true){
            $this->model = new proveedoresModel();
            $proveedores = $this->model->getAll();
            $ListaDeEstilos = [
                'App/styles/plantilla.css',
                'App/styles/proveedores/indexProveedores.css'
            ];
            $Titulo = "Gestión de Proveedores";
            $vista = "App/view/proveedores/indexProveedoresView.php";
            include_once("App/view/plantillaView.php"); 
        }else{
            header('Location: http://localhost/Administracion/');
            exit;
        }
        
    }

    public function AgregarNuevo() {
        session_start();
        if(isset($_SESSION['logedin']) && $_SESSION['logedin'] == true){

            $ListaDeEstilos = [
                'App/styles/plantilla.css',
                'App/styles/proveedores/AgregarProveedor.css'
            ];
            $Titulo = "Agregar nuevo proveedor";
            $vista = "App/view/proveedores/AgregarNuevo.php";
            include_once("App/view/plantillaView.php");

        }else{
            header('Location: http://localhost/Administracion/');
            exit;
        }
    }

    public function Agregar(){
        session_start();
        if(isset($_SESSION['logedin']) && $_SESSION['logedin'] == true){

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $Proveedor = [
                    'contacto' => $_POST['contacto'],
                    'rfc' => $_POST['rfc'],
                    'telefono' => $_POST['telefono'],
                    'correo' => $_POST['correo'],
                    'direccion' => $_POST['direccion']
                ];
        
                // Puedes agregar aquí la lógica para actualizar los datos del proveedor
                $this->model = new proveedoresModel();
                $respuesta = $this->model->add($Proveedor);
        
                if ($respuesta) {
                    header('Location: http://localhost/Administracion?C=proveedoresController&M=index');
                } else {
                    header('Location: http://localhost/Administracion?C=proveedoresController&M=index');
                }
            } 

        }else{
            header('Location: http://localhost/Administracion/');
            exit;
        }
        
    }

    public function EditarProveedor(){
        session_start();
        if(isset($_SESSION['logedin']) && $_SESSION['logedin'] == true){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $idproveedor = $_GET['id'];
    
                $this->model = new proveedoresModel();
                $Datos = $this->model->getByID($idproveedor);
    
                $ListaDeEstilos = [
                    'App/styles/plantilla.css',
                    'App/styles/proveedores/AgregarProveedor.css'
                ];
                $Titulo = "Editar proveedor";
                $vista = "App/view/proveedores/EditarProveedor.php";
    
                include_once("App/view/plantillaView.php");
            }
        } else {
            header('Location: http://localhost/Administracion/');
            exit;
        }
    }
    
        

    public function Editar(){
        session_start();
        if(isset($_SESSION['logedin']) && $_SESSION['logedin'] == true){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Recoger los datos del formulario en un array
                $datosProveedor = [
                    'id' => $_POST['id'],
                    'contacto' => $_POST['contacto'],
                    'rfc' => $_POST['rfc'],
                    'telefono' => $_POST['telefono'],
                    'correo' => $_POST['correo'],
                    'direccion' => $_POST['direccion']
                ];
        
                // Puedes agregar aquí la lógica para actualizar los datos del proveedor
                $this->model = new proveedoresModel();
                $respuesta = $this->model->update($datosProveedor);
        
                if ($respuesta) {
                    header('Location: http://localhost/Administracion?C=proveedoresController&M=index');
                } else {
                    echo "No se pudo actualizar";
                    header('Location: http://localhost/Administracion?C=proveedoresController&M=EditarProveedor&id=' . $datosProveedor['id']);
                }
            }

        }else{
            header('Location: http://localhost/Administracion/');
            exit;
        }
        
    }
    
}
?>


   