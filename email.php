<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'assets/vendor/PHPMailer/src/Exception.php';
require_once 'assets/vendor/PHPMailer/src/PHPMailer.php';
require_once 'assets/vendor/PHPMailer/src/SMTP.php';

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

if(isset($_POST["send"])) {

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    $mail->Username = 'aashishguru2001@gmail.com';
    $mail->Password = 'wvqqawqlkwwamelr';
    $mail->addAddress('aashishguru2001@gmail.com', 'Aashish Raj');
    $mail->setFrom($email, $name);
    $mail->Subject = $subject;
    $mail->Body = $name . ' ' . $email . ' ' . $message;
    $mail->isHTML(false);
    $mail->send();
    
    if(!$mail->Send()) {
        ?>
            <script type="text/javascript">
                alert('Message failed. Please, send your email to aashishguru2001@gmail.com');
                window.location = 'index.html';
            </script>
        <?php
    
    } else {
        ?>
            <script type="text/javascript">
                alert('Thank you. We will contact you shortly.');
                window.location = 'index.html';
            </script>
        <?php
    }
}

?>