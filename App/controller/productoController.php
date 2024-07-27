<?php
    //incluir en mi archivo la informacion o el documento de productoModelo
    include_once("App/model/productoModelo.php");

    class productoController{
        //creamos un atributo que posteriormente instanciaremso para obtener las funciones del modelo
        private $productomodelo;

        //creamos nuestro metodo index 
        public function index(){
            //inicializamos el alumno model
            $this->productomodelo=new productoModelo();
            //declaramos un variable que me permita alamacenar todos los datos de un elemnto de
            //la tabla alumnos 
            $Datos=$this->productomodelo->getAll();
            //pasamos esos datos a la vista, es decir a la pagina que va a visualizar el usuario final 
            $vista="App/view/public/tienda/productoIndexView.php";
            
            $ListaDeEstilos = [
                'App/assests/styles/plantilla.css',
                'App/assests/styles/tienda/indexView.css',
                'App/assests/styles/tienda/sidebar.css',
                'App/assests/styles/tienda/modal.css'
            ];
            $Titulo = "Tienda";

            include_once("App/view/public/plantillaView.php");
        }

        public function viewDetails(){

            if($_SERVER['REQUEST_METHOD']== 'GET'){

                //Recepcion del id del producto
                $idproducto = $_GET['idproducto'];

                //Se instancia la clase modelo con la variable productomodelo
                 $this->productomodelo = new productoModelo();

                $Detalles = $this->productomodelo->ById($idproducto);
                
                $Titulo = "Detalles producto";
                $ListaDeEstilos = [
                    'App/assests/styles/plantilla.css',
                    'App/assests/styles/tienda/detalles.css'
                ];

                $vista="App/view/public/tienda/viewDetails.php";
                include_once("App/view/public/plantillaView.php");
               
            }
        }

        // Método para manejar la búsqueda de productos por nombre
        public function Search() {
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                // Obtener el nombre del producto a buscar desde la solicitud GET
                $nombre = $_GET['nombre'];

                //Se instancia la clase modelo con la variable productomodelo
                $this->productomodelo = new productoModelo();

                // Realizar la búsqueda de productos por nombre en el modelo
                $Datos = $this->productomodelo->BuscarPorNombre($nombre);

                if($Datos){
                  
            
                    $ListaDeEstilos = [
                        'App/assests/styles/plantilla.css',
                        'App/assests/styles/tienda/indexView.css',
                        'App/assests/styles/tienda/sidebar.css',
                        'App/assests/styles/tienda/modal.css'
                    ];
                    $Titulo = "Tienda";
                    //Si hay resultados en la busqueda urilizamos la vista del index, pero pasandole lo que trae la consulta
                    $vista="App/view/public/tienda/productoIndexView.php";
                    include_once("App/view/public/plantillaView.php");

                }else{
                    //Si la consulta no trae ningun resultado mostramos una plantilla especial
                    $ListaDeEstilos = [
                        'App/assests/styles/plantilla.css'
                    ];
                    $Titulo = "Error de busqueda";
                   
                    $vista="App/view/public/tienda/ErrorBusqueda.php";
                    include_once("App/view/public/plantillaView.php");
                }
            }
        }

        public function Filtros() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Obtener el nombre del producto a buscar desde la solicitud GET
                $Precio = isset($_POST['Precio']) ? $_POST['Precio'] : '';
                $Categoria = isset($_POST['Categoria']) ? $_POST['Categoria'] : '';
                $Marca = isset($_POST['Marca']) ? $_POST['Marca'] : '';

                //Se instancia la clase modelo con la variable productomodelo
                $this->productomodelo = new productoModelo();

                // Realizar la búsqueda de productos por nombre en el modelo
                $Datos = $this->productomodelo->BuscarPorFiltros($Categoria, $Marca, $Precio);

                if($Datos){

                    $ListaDeEstilos = [
                        'App/assests/styles/plantilla.css',
                        'App/assests/styles/tienda/indexView.css',
                        'App/assests/styles/tienda/sidebar.css',
                        'App/assests/styles/tienda/modal.css'
                    ];
                    $Titulo = "Tienda";
                    //Si hay resultados en el filtro utilizamos la vista del index, pero pasandole lo que trae la consulta
                    $vista="App/view/public/tienda/productoIndexView.php";
                    include_once("App/view/public/plantillaView.php");

                }else{
                    //Si la consulta no trae ningun resultado mostramos una plantilla especial
                    $ListaDeEstilos = [
                        'App/assests/styles/plantilla.css'
                    ];
                    $Titulo = "Error de busqueda";
                   
                    $vista="App/view/public/tienda/ErrorBusqueda.php";
                    include_once("App/view/public/plantillaView.php");
                }

            }
        }
    }
?>