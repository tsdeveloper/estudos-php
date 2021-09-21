<?php
require __DIR__ . '/fullstackphp/fsphp.php';
fullStackPHPClassName("a05.09-pdo-statement-ready");
//echo '<pre>';
/*
 * [ classe e objeto ] http://php.net/manual/pt_BR/language.oop5.basic.php
 */

fullStackPHPClassSession("bootstrap user model", __LINE__);

//IMPORTAÇÃO DA CLASS MODEL
use Source\Loading\Classes;
use Source\Loading\Classes\UserModel;
use Source\Loading\Classes\ProductModel;
use Source\Loading\Classes\CarrinhoModel;

//Obrigatorio
require_once("vendor/autoload.php");
//Instância de um objeto

echo '<pre>';
//AND = e
//OR =


$model = new UserModel();
$userModel = $model->bootstrap(
    "Usuario100",
    "Developer",
    "usuario100@email.com",
    "123456789"
);

var_dump(
    $userModel
);

fullStackPHPClassSession("save create", __LINE__);
$userModel->id = 10;
$userModel->created_at = date("Y/m/d H:i");


if (!$model->find($userModel->email))
{
    echo "<p class='trigger warning'></p>";
    $userModel->save();
}else {
    echo "<p class='trigger warning'></p>";
}


echo '</pre>';