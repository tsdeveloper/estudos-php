<?php
require __DIR__ . '/fullstackphp/fsphp.php';
fullStackPHPClassName("a06.a03-config-project-php");
//echo '<pre>';
/*
 * [ classe e objeto ] http://php.net/manual/pt_BR/language.oop5.basic.php
 */

fullStackPHPClassSession("RFI and DoS", __LINE__);

//IMPORTAÇÃO DA CLASS MODEL
use Source\Models\User;
use \Source\Core\Session;

//Obrigatorio
require_once("vendor/autoload.php");
require_once('Source/Support/Config.php');
//Instância de um objeto

echo '<pre>';
$float = 123456789012345678901234567890;
$convertPass = floatval( $float)  . PHP_EOL;

var_dump(
    $convertPass
);

echo '</pre>';
?>

<form action="index.php" method="get">
    <p>Your name: <input type="text" name="name" /></p>
    <p>Your age: <input type="text" name="age" /></p>
    <p><input type="submit" /></p>
</form>
