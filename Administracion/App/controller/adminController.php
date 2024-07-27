<?php
// Incluye el archivo del modelo de administrador una sola vez para evitar errores de redefinición
include_once('App/model/adminModel.php');

// Define la clase adminController
class adminController {
    // Propiedad privada para almacenar el modelo
    private $modelo;

    // Método para manejar la vista de inicio
    public function index() {
        // Inicia la sesión
        session_start();

        // Verifica si la sesión de administrador está activa
        if (isset($_SESSION['SesionAdministrador']) && !empty($_SESSION['SesionAdministrador'])) {
            // Define una lista de estilos 
            $ListaDeEstilos = [
                'App/styles/plantilla2.css',
                'App/styles/inicio/inicioIndex.css'
            ];
            
            // Define el título de la página
            $Titulo = "Inicio";

            // Define la vista que se va a cargar
            $vista = "App/view/inicioView.php";

            // Incluye la plantilla de la vista
            include_once("App/view/plantillaView.php");
        } else {
            // Si la sesión de administrador no está activa, muestra la vista de inicio de sesión
            $Leyenda = "";
            include_once('App/view/loginView.php');
        }
    }

    // Método para manejar el inicio de sesión
    public function login() {
        // Verifica si el método de solicitud es POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Obtiene los valores de usuario y contraseña del formulario
            $user = $_POST['user'];
            $password = $_POST['pass'];

            // Crea una nueva instancia del modelo de administrador
            $this->modelo = new adminModel();

            // Obtiene las credenciales del usuario del modelo
            $respuesta = $this->modelo->getCredencials($user, $password);

            // Si las credenciales son válidas
            if($respuesta){
                // Inicia la sesión
                session_start();

                // Establece una variable de sesión para indicar que el usuario es un administrador
                $_SESSION['logedin'] = true;

                // Guarda información adicional del usuario en la sesión, como el nombre y el apellido
                $_SESSION['SesionAdministrador'] = array(
                    "AdminID" => $respuesta['AdministradorID'],
                    "Nombre" => $respuesta['Nombre'],
                    "Apellido" => $respuesta['Apaterno']
                );

                // Configuración para la vista de inicio
                $ListaDeEstilos = [
                    'App/styles/plantilla2.css',
                    'App/styles/inicio/inicioIndex.css'
                ];
                $Titulo = "Inicio";

                $vista = "App/view/inicioView.php";
                include_once("App/view/plantillaView.php");

                // Mostrar alerta de bienvenida
                echo '<script>alert("¡Bienvenido, '.$respuesta['Nombre'].'!");</script>';

            } else {
                // Si las credenciales no son válidas, muestra un mensaje de error
                $Leyenda = "Usuario o contraseña incorrectas";
                include_once('App/view/loginView.php');
            }
        }
    }

    // Método para manejar el cierre de sesión
    public function LogOut() {
        // Inicia la sesión
        session_start();

        // Se limpian los datos almacenados del usuario logeado
        unset($_SESSION['SesionAdministrador']);
        //La sesion se pone en falso
        $_SESSION['logedin']=false;

        // Redirige al usuario a la página de inicio de sesión
        header('Location: http://localhost/Administracion/'); // O la URL que corresponda
        exit;
    }

    public function Perfil(){
        session_start();
        if(isset($_SESSION['logedin']) && $_SESSION['logedin']==true){
            
            $id = $_SESSION['SesionAdministrador']['AdminID'];
            
            $this->modelo = new adminModel();

            $Datos = $this->modelo->getById($id);

            $Titulo = "Perfil";
            $ListaDeEstilos = [
                'App/styles/plantilla.css',
                'App/styles/usuarios/userAdmin.css'
            ];
            $vista = "App/view/usuarios/userAdmin.php";
            include_once("App/view/plantillaView.php");

        }else{
            header('Location: http://localhost/Administracion/');
            exit;
        }
    }

    public function ActualizarDatos(){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $usuario = array(
                'id' => $_POST['id'],
                'nombre' => $_POST['nombre'],
                'apaterno' => $_POST['apaterno'],
                'amaterno' => $_POST['amaterno'],
                'correo' => $_POST['correo'],
                'telefono' => $_POST['telefono'],
                'usuario' => $_POST['usuario'],
                'contrasena' => $_POST['password'],
            );
            $this->modelo = new adminModel();

            $respuesta = $this->modelo->update($usuario);
 
            if($respuesta){
                header('Location: http://localhost/Administracion/?C=adminController&M=LogOut');
                exit;
            }else{
                header('Location: ');
                exit;
            }
        }
    }

    public function AgregarNuevo(){
        session_start();
        if(isset($_SESSION['logedin']) && $_SESSION['logedin']==true){
            
            $Titulo = "Agregar nuevo";
            $ListaDeEstilos = [
                'App/styles/plantilla.css',
                'App/styles/usuarios/userAdmin.css'
            ];
            $vista = "App/view/usuarios/AgregarAdmin.php";
            include_once("App/view/plantillaView.php");

        }else{
            header('Location: http://localhost/Administracion/');
            exit;
        }
    }

    public function Agregar(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $usuario = array(
                'id' => $_POST['id'],
                'nombre' => $_POST['nombre'],
                'apaterno' => $_POST['apaterno'],
                'amaterno' => $_POST['amaterno'],
                'correo' => $_POST['correo'],
                'telefono' => $_POST['telefono'],
                'usuario' => $_POST['usuario'],
                'contrasena' => $_POST['password'],
            );
            $this->modelo = new adminModel();

            $respuesta = $this->modelo->add($usuario);
 
            if($respuesta){
                header('Location: http://localhost/Administracion/?C=inicioController&M=index');
                exit;
            }else{
                header('Location: http://localhost/Administracion/?C=adminController&M=AgregarNuevo');
            }
        }
    }
}
?>
