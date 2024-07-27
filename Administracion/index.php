<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    //generamos un aruta para acceder a nuestra pagina 
    //valores para nuestra ruta C= controlador M= metodo que vamos a llamar 
    //ruta base : localhost/php-3a?C=alumnoController&M=index  localhost/E-COMMERCE?C=cursoController&M=index
    
    define("controlador","App/controller/");

    //preguntamos si se esta pasado al controlador por la url 
    $control= isset($_GET['C'])?$_GET['C']:'';
    
    //creamos la ruta del controlador 
    $ruta=controlador . $control . ".php";
    //ejemplo ruta app/controller/alumnoController.php

    if(is_file($ruta)){
        require_once($ruta);
        $objeto= new $control();

        $metodo= isset($_GET['M'])? $_GET['M']:'';

        if(method_exists($objeto,$metodo)){
            $objeto->$metodo();
        }else{

            //En caso de que escribamos mal la direccion nos va a rrojar esta pagina
            
            require_once("App/controller/defaultController.php");
            $defautl= new defaultController();
            $defautl->index();
        }

    }else{

        //Aqui al entrar la pagina como no hemos realizado ninguna peticion nos va a cargar esta
        require_once("App/controller/adminController.php");
        $defautl= new adminController();
        $defautl->index();
    }

?>