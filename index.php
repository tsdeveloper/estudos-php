<?php
require __DIR__ . '/fullstackphp/fsphp.php';
fullStackPHPClassName("06.a12-register-user");
//echo '<pre>';
/*
 * [ classe e objeto ] http://php.net/manual/pt_BR/language.oop5.basic.php
 */

//IMPORTAÇÃO DA CLASS MODEL
use Source\Core\Connect;
use Source\Core\Message;
use Source\Models\User;
use \Source\Core\Session;

//Obrigatorio
require_once("vendor/autoload.php");
require_once('Source/Support/Config.php');
require_once('Source/Support/Helper.php');
//Instância de um objeto
session();
echo '<pre>';

fullStackPHPClassSession("query params", __LINE__);
$user = user()->findById(1);
$user->document = 22.22;
$user->save();

$user = user()->find("ativo = :a", "a=true");
var_dump(
    $user
);

$user = user()->all(5);
var_dump(
    $user
);

echo '</pre>';
require __DIR__ . "/form.php";

?>
