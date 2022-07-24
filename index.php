<?php

use PHPMailer\PHPMailer\PHPMailer;
use source\Core\Email;
use source\Models\User;

require __DIR__ . '/fullstackphp/fsphp.php';
fullStackPHPClassName("07.a08-template-engine-plates");
//echo '<pre>';
/*
 * [ classe e objeto ] http://php.net/manual/pt_BR/language.oop5.basic.php
 */

//IMPORTAÇÃO DA CLASS MODEL

//Obrigatorio

require __DIR__ . '/vendor/autoload.php';

echo '<pre>';

//Create an instance; passing `true` enables exceptions

try {
                                 //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
// Create new Plates instance
$templates = new League\Plates\Engine(__DIR__. '/assets/views');


$templates->addFolder("test", "test");

//Render a template
if (empty($_GET["id"])){
    echo $templates->render('test::list', [
        "title" => "Usuários do Sistema",
        'list' => (user()->all(3))
    ]);
}
else {
    echo $templates->render('test::user', [
        "title" => "Usuários do Sistema",
        'list' => (user()->find($_GET["id"]))
    ]);
}


} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$e}";
}

echo '</pre>';
require __DIR__ . "/form.php";

?>
