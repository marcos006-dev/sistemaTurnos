<?php

    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\PHPMailer;

    require '../lib/PHPMailer/src/Exception.php';
    require '../lib/PHPMailer/src/PHPMailer.php';
    require '../lib/PHPMailer/src/SMTP.php';
    // require '../../conexion/conexion.php';

    function sendEmail( $correo, $token ) {

        // Load Composer's autoloader
        // require 'vendor/autoload.php';
        $mail = new PHPMailer();

        try {
            //Configuracion de servidor

            $mail->SMTPDebug = 0;
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP(); // Send using SMTP
            $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = 'francomarcos416@gmail.com'; // SMTP username
            $mail->Password = 'marcoscarp'; // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer'       => false,
                    'verify_peer_name'  => false,
                    'allow_self_signed' => true,
                ),
            );
            //Persona que manda y quien recibe
            $mail->setFrom( 'francomarcos416@gmail.com', 'Administradores' );

            $mail->addAddress( $correo );
            // $mail->addAddress('ellen@example.com');

            // Contenido
            $mail->isHTML( true );
            $mail->Subject = 'Recuperacion de Contraseña';
            $mail->Body = "Pulse aqui para reestablecer su contraseña" . "<a href=http://localhost/sistTurnos/modUsuarios/recuperacionPass.php?token=$token" . "> Haga Click</a>";
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();

            // echo 'El mensaje se envio correctamente';

        } catch ( Exception $e ) {
            echo "Hubo un error en: {$mail->ErrorInfo}";
        }
    }

?>

