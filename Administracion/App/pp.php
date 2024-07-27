        session_start();
        if(isset($_SESSION['logedin']) && $_SESSION['logedin'] == true){

            
        }else{
            header('Location: http://localhost/Administracion/');
            exit;
        }