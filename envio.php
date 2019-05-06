<?php

$nombre= $_POST["nombre"];
$email= $_POST["email"];
$asunto= $_POST["asunto"];
$mensaje= $_POST["mensaje"];

$body = "Nombre = " . $nombre . "<br>Email = ". $email . "<br>Asunto = ". $asunto . 
"<br>Hora = ". date('m/d/Y g:ia') . "<br>Mensaje = <h3>".  $mensaje;

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'guslopezcallejassoft@gmail.com';                     // SMTP username
    $mail->Password   = 'plusultra';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('micropro@btu.com.mx', $nombre);
    $mail->addAddress('micropro@btu.com.mx', 'Test Demo');     // Add a recipient
  ;

  $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = '"Recibio un correo de ' . $nombre . ' a travez de su sitio"';
    $mail->Body    = $body;
    $mail->CharSet = 'UFT-8';

    $mail->send();
    echo '<script>
          alert("El mensaje a sido enviado correctamente");
          window.history.go(-1);
          </script>';
} catch (Exception $e) {
    echo "Mensaje no pudo ser enviado: {$mail->ErrorInfo}";
}
