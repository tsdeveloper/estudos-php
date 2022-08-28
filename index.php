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
$formSend = "image";
require __DIR__ . "/form.php";

echo '<pre>';
$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
var_dump($post['send']);
if ($post && $post['send'] == "image")
{
    var_dump($post, ($_FILES ?? ""));
}

echo '</pre>';
$formSend = "file";
require __DIR__ . "/form.php";

?>
