<?php

use PHPMailer\PHPMailer\PHPMailer;
use Source\Core\Email;
use Source\Models\User;

require __DIR__ . '/fullstackphp/fsphp.php';
fullStackPHPClassName("07.a06-sintetizando-e-abstraindo");
//echo '<pre>';
/*
 * [ classe e objeto ] http://php.net/manual/pt_BR/language.oop5.basic.php
 */

//IMPORTAÇÃO DA CLASS MODEL

//Obrigatorio

require __DIR__ . '/vendor/autoload.php';

echo '<pre>';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$user = new User();
$email = new Email();
$email->boostrap("teste",
        "teste",
"email",
"User");


try {
                                 //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

echo '</pre>';
require __DIR__ . "/form.php";

?>
