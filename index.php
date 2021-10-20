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
$session = new Session();

$session->set('perfil_admin', [ "perfil1" => "developer", "perfil2" =>"DBA", "perfil3" =>"analytic", "perfil4" => "admin"]);


var_dump(
     $_SESSION['perfil_admin']
);
echo '</pre>';
?>

<form action="index.php" method="get">
    <p>Your name: <input type="text" name="name" /></p>
    <p>Your age: <input type="text" name="age" /></p>
    <p><input type="submit" /></p>
</form>
