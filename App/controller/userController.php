<?php 
    include_once("App/model/userModel.php");

    class userController {
        private $modelo;
        
        public function index() {
            session_start();
            if (isset($_SESSION['MiSesion']) && !empty($_SESSION['MiSesion'])) {

                $Titulo = "Mi cuenta";
                $ListaDeEstilos = [
                    'App/assests/styles/plantilla.css',
                    'App/assests/styles/user/indexUserView.css'
                ];
                $vista = "App/view/public/user/indexUserView.php";
                
                include_once("App/view/public/plantillaView.php");
            } else {

                $Titulo = "Iniciar sesión";
                $ListaDeEstilos = [
                    'App/assests/styles/plantilla.css',
                    'App/assests/styles/user/login.css'
                ];
                $vista = "App/view/public/user/viewLogin.php";
                
                include_once("App/view/public/plantillaView.php");
            }
        }
        
        public function login(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                print_r($_POST);

                $user=$_POST['user'];
                $password=$_POST['pass'];

                $this->modelo = new userModel();

                $respuesta = $this->modelo->getCredentials($user,$password);


                if($respuesta){
        
                    session_start();

                    $_SESSION['logedin'] = true;

                    $_SESSION['MiSesion'] = array( "UsuarioID" => $respuesta['UsuarioID'], 
                                                   "Apaterno" => $respuesta['Apaterno'], 
                                                   "Nombre" => $respuesta['Nombre'], 
                                                   "Correo" => $respuesta['CorreoElectronico'] );
                    
                    header('Location: http://localhost?C=userController&M=index');
                }else{

                    $Titulo = "Error";
                    $ListaDeEstilos = [
                        'App/assests/styles/plantilla.css'
                    ]; 

                    $vista="App/view/public/user/errorLoginView.php";
                    include_once("App/view/public/plantillaView.php"); 
                }
            }
        }

        public function AddUser(){
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Recepcionamos los datos del nuevo usuario y los guardamos en un arreglo
                $Usuario = array(
                'nombre' => $_POST['nombre'],
                'apaterno' => $_POST['apaterno'],
                'amaterno' => $_POST['amaterno'],
                'correo' => $_POST['correo'],
                'usuario' => $_POST['usuario'],
                'contrasenia' => $_POST['contrasenia']
                );

                $this->modelo = new UserModel();

                // Creación del usuario
                $Respuesta = $this->modelo->CreateCount($Usuario);
        
                if ($Respuesta == false) {
                    
                } else {
                    session_start();
                    $_SESSION['MiSesion'] = array("UsuarioID" => $Respuesta['UsuarioID'],"Nombre" => $Respuesta['Nombre'], "Correo" => $Respuesta['CorreoElectronico'] );
                    header('Location: http://localhost/E-COMMERCE?C=userController&M=index'); // O la URL que corresponda
                }
            }

        }

        public function NewCount(){
            $Titulo = "Crear cuenta";
            $ListaDeEstilos = [
                'App/assests/styles/plantilla.css',
                'App/assests/styles/CrearCuenta.css'
            ];

            $vista = "App/view/public/user/createCount.php";
            
            include_once("App/view/public/plantillaView.php"); 
        }
        
        public function LogOut(){
            //Llamamos a la sesion
            session_start();

            //Eliminamos unicamente la sesion del inicio de sesion
            unset($_SESSION['MiSesion']);
    
            //Redirigimos hacia donde nos llevara por default al cerrar la secion
            header('Location: http://localhost?C=homeController&M=index'); // O la URL que corresponda
            exit;
        }

        public function MisCompras(){

            $Titulo = "Mis compras";
            $ListaDeEstilos = [
                'App/assests/styles/plantilla.css'
            ];

            $vista = "App/view/public/user/myShopping.php";
            
            include_once("App/view/public/plantillaView.php"); 

        }

    
}
?>