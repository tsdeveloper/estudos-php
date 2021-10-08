<?php
require __DIR__ . '/fullstackphp/fsphp.php';
fullStackPHPClassName("a05.12-delete-data-with-pdo");
//echo '<pre>';
/*
 * [ classe e objeto ] http://php.net/manual/pt_BR/language.oop5.basic.php
 */

fullStackPHPClassSession("destroy", __LINE__);

//IMPORTAÇÃO DA CLASS MODEL
use Source\Loading\Classes;
use Source\Loading\Classes\UserModel;
use Source\Loading\Classes\ProductModel;
use Source\Loading\Classes\CarrinhoModel;
use Source\Loading\Database\Connect;

//Obrigatorio
require_once("vendor/autoload.php");
//Instância de um objeto

echo '<pre>';
$model = new UserModel();
$user = $model->load("id=5");
$user->destroy();

var_dump(
    $user
);

fullStackPHPClassSession("model destroy", __LINE__);

echo '</pre>';
?>

<form action="index.php" method="get">
    <p>Your name: <input type="text" name="name" /></p>
    <p>Your age: <input type="text" name="age" /></p>
    <p><input type="submit" /></p>
</form>
