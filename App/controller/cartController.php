<?php 

    include_once("App/model/cartModel.php");

    class cartController{
        private $vista;
        private $modelocart;

        public function __construct()
        {
            
        }

        public function index(){
            // Título de la página
            $Titulo = "Carrito de compras";
        
            // Lista de estilos CSS a cargar
            $ListaDeEstilos = [
                'App/assests/styles/plantilla.css',
                'App/assests/styles/cart/cart.css'
            ];

            session_start();
            if (isset($_SESSION['MiSesion']) && !empty($_SESSION['MiSesion'])) {
                
                //Obtener el id del usuario con la sesion iniciadada
                $IdUsuario = $_SESSION['MiSesion']['UsuarioID'];
                
                //Instanciar el modelo
                $this->modelocart = new cartModel();


                // Obtener los productos agregados al carrito del usuario
                $ProductosAgregados = $this->modelocart->verAgregado($IdUsuario);
            
                // Obtener el total agregado al carrito del usuario
                $TotalAgregado = $this->modelocart->TotalAgregado($IdUsuario);
            
                // Vista a mostrar
                $vista = "App/view/public/cart/cartView.php";
                // Incluir la plantilla principal que carga la vista específica del carrito
                include_once("App/view/public/plantillaView.php");

            } else {

                //Incluimos la vista pero sin pasar ningun valor
                $vista = "App/view/public/cart/cartView.php";

                // Incluir la plantilla principal que carga la vista específica del carrito
                include_once("App/view/public/plantillaView.php");

            }

          
        }
        

        public function addToCart() {
            session_start();
            if (isset($_SESSION['MiSesion']) && !empty($_SESSION['MiSesion'])) {
                
                if($_SERVER['REQUEST_METHOD']=='GET'){

                    //Obtenemos el id del usuario con la sesion iniciada
                    $IdUsuario = $_SESSION['MiSesion']['UsuarioID'];

                    //Recepcionamos el id del producto enviado por metododo get
                    $idproducto = $_GET['idproducto'];
    
                    $this->modelocart = new cartModel();
    
                    $respuesta = $this->modelocart->AddProduct($idproducto, $IdUsuario); 
    
                    if($respuesta){
                        header('Location: http://localhost/?C=cartController&M=index');
                    }else{
                        header('Location: http://localhost/?C=productoController&M=index');
                    }
                }

            } else {
                echo '<script> alert("Necesitas iniciar sesion"); </script>';
                header('Location: http://localhost?C=userController&M=index');
            }
        }
        

        public function SumarCart(){
            if($_SERVER['REQUEST_METHOD']=='GET'){

                
                $IdDetalleCarrito = $_GET['CartDetailID'];
                $idproducto = $_GET['ProductoID'];

                $this->modelocart = new cartModel();

                $respuesta = $this->modelocart->SumCart($IdDetalleCarrito, $idproducto); 

                if($respuesta){
                    header('Location: http://localhost/?C=cartController&M=index');
                }else{
                    header('Location: http://localhost/?C=productoController&M=index');
                }
            }

        }

        public function RestarCart(){
            if($_SERVER['REQUEST_METHOD']=='GET'){

                $IdDetalleCarrito = $_GET['CartDetailID'];
                $idproducto = $_GET['ProductoID'];

                $this->modelocart = new cartModel();

                $respuesta = $this->modelocart->RestCart($IdDetalleCarrito, $idproducto); 

                if($respuesta){
                    header('Location: http://localhost?C=cartController&M=index');
                }else{
                    header('Location: http://localhost?C=productoController&M=index');
                }
            }

        }

        public function checkOut(){
            //Iniciamos la sesion
            session_start();
            //Verificamos que haya una sesion y que esta no este vacia
            if (isset($_SESSION['MiSesion']) && !empty($_SESSION['MiSesion'])){

                //Obtener el id del usuario con la sesion iniciadada
                $IdUsuario = $_SESSION['MiSesion']['UsuarioID'];

                //Titulo de la pagina
                $Titulo = "Checkout";
                //Estilos a cargar para la pagina
                $ListaDeEstilos = [
                    'App/assests/styles/plantilla.css',
                ];

                //Instanciamos el modelo
                $this->modelocart = new cartModel();
                //Verificamos que el usuario tenga productos agregados
                $TotalAgregado = $this->modelocart->TotalAgregado($IdUsuario);
                
                //Si el usuario si tiene productos que nos mande la vista para el checkout
                if($TotalAgregado ){
                    $vista = "App/view/public/cart/checkout.php";
                    include_once("App/view/public/plantillaView.php");

                }else{
                    header('Location: http://localhost?C=cartController&M=index');
                }
                
            }else{

                //Si no hay una sesion iniciada que nos recarge la vista
                header('Location: http://localhost?C=cartController&M=index');
            }

        }
    }
?>