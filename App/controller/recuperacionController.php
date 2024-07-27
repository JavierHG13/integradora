<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'App/assests/mail/vendor/autoload.php';

class RecuperacionController {

    // Método para enviar el correo con el enlace de recuperación de contraseña
    public function EnviarCorreoRecuperacion($correo) {
        // Verifica si el correo está registrado
        if ($this->verificarCorreo($correo)) {
            // Genera un token de recuperación
            $token = bin2hex(random_bytes(16));
            // Guarda el token en la base de datos con una fecha de expiración
            $this->guardarTokenEnBD($correo, $token);

            // Configuración de PHPMailer
            $mail = new PHPMailer(true);

            try {
                $mail->SMTPDebug = 2; // Habilitar salida de depuración
                $mail->Debugoutput = 'html'; // Formato de salida de depuración

                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com'; // Servidor SMTP de Gmail
                $mail->SMTPAuth = true; // Activar autenticación SMTP
                $mail->Username = 'ejemplo@uthh.edu.mx'; // SMTP Username
                $mail->Password = ''; // SMTP Password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Usar TLS para cifrar la conexión
                $mail->Port = 587; // Puerto para TLS

                // Configuración del correo
                $mail->setFrom('no-reply@tudominio.com', 'Tu Aplicación');
                $mail->addAddress($correo); // Correo del destinatario
                $mail->Subject = 'Recuperación de Contraseña';
                $mail->Body    = "Haz clic en el siguiente enlace para restablecer tu contraseña: \n";
                $mail->Body   .= "http://tudominio.com/restablecer_contrasena.php?token=" . $token;

                $mail->send();
                echo 'El correo de recuperación ha sido enviado';

            } catch (Exception $e) {
                echo "El correo no pudo ser enviado. Error: {$mail->ErrorInfo}";
            }
        } else {
            echo 'El correo proporcionado no está registrado';
        }
    }

    private function verificarCorreo($correo) {
        // Verifica si el correo está registrado en la base de datos
        // Implementa la lógica para consultar la base de datos
        return true; // Cambia esto según la verificación real
    }

    private function guardarTokenEnBD($correo, $token) {
        // Guarda el token y la fecha de expiración en la base de datos
        // Implementa la lógica para guardar el token
    }
}
?>
