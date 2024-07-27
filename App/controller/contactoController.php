<?php
    //Incluimos las siguientes bibliotecas de PHPMAILER
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    //Incluimos el archivo de vendor autoload
    require 'App/assests/mail/vendor/autoload.php';

    require 'App/assests/mail/vendor/phpmailer/phpmailer/src/Exception.php';
    require 'App/assests/mail/vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require 'App/assests/mail/vendor/phpmailer/phpmailer/src/SMTP.php';


    class contactoController{

        private $vista;

        public function Formulario(){
            $Titulo = "Contacto";
            $ListaDeEstilos = [
                'App/assests/styles/plantilla.css',
                'App/assests/styles/contacto/contacto.css'
            ]; 

            $vista = "App/view/public/contacto/contactoView.php";
            include_once('App/view/public/plantillaView.php');
        }

        public function EnviarCorreo()
        {
            if($_SERVER['REQUEST_METHOD']=='POST'){
            
                $Nombre = $_POST['nombre'];
                $Correo = $_POST['email'];
                $Mensaje = $_POST['mensaje'];
                
                // Crea una instancia de PHPMailer
                $mail = new PHPMailer(true);

                try {
                    $mail->SMTPDebug = 2; // Habilitar salida de depuración
                    $mail->Debugoutput = 'html'; // Formato de salida de depuración
    
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com'; // Servidor SMTP de Gmail
                    $mail->SMTPAuth = true; // Activar autenticación SMTP
                    $mail->Username = 'Javierhdzgon03@gmail.com'; // SMTP Username
                    $mail->Password = 'brjp wunk wnpb rlol';  // SMTP Password //Crearlo con contraseñas para aplicaciones de google
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Usar TLS para cifrar la conexión
                    $mail->Port = 587; // Puerto para TLS

                    // Configuración del correo
                    $mail->setFrom($Correo, $Nombre);
                    $mail->addAddress('20230101@uthh.edu.mx', 'Abel');
                    $mail->Subject = 'Pruebas de correo';
                    $mail->Body    = $Mensaje;

                    $mail->send();
                    echo 'El correo ha sido enviado';

        
                } catch (Exception $e) {
                    echo "El correo no pudo ser enviado. Error: {$mail->ErrorInfo}";
                }   
            }     
        }
    }
?>