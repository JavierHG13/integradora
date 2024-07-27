<?php
    class defaultController{
        private $vista;

        public function index(){
            $Titulo = "Default";
            $ListaDeEstilos = [
                'App/assests/styles/plantilla.css',
            ]; 

            $vista="App/view/defaultView.php";
            include_once("App/view/public/plantillaView.php");
        }

    }
?>