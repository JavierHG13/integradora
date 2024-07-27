<?php

class homeController {
    private $vista;
    
    public function index(){
        $ListaDeEstilos = [
            'App/assests/styles/plantilla2.css',
            'App/assests/styles/home/homeView.css'
        ];
        $Titulo = "Home";
        $vista = "App/view/public/homeView.php";
        include_once("App/view/public/plantillaView.php");
    }

    public function getAll(){

    }
}
?>
