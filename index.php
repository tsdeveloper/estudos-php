<?php

use PHPMailer\PHPMailer\PHPMailer;
use source\Core\Email;
use source\Models\User;

require __DIR__ . '/fullstackphp/fsphp.php';
fullStackPHPClassName("07.a10-template-engine-plates");
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
$view = view()->path("test", "test");


//[10,20,50  e 100]
//Render a template
if (empty($_GET["id"])){
    echo $view->render('test::list', [
        "title" => "Usuários do Sistema",
        'listUsuarios' => (user()->all(3))
    ]);
}
else {
    echo $view->render('test::user', [
        "title" => "Usuários do Sistema",
        'user' => (user()->find("id != :v", "v={$_GET["id"]}"))
    ]);
}


} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$e}";
}

echo '</pre>';
require __DIR__ . "/form.php";

?>
