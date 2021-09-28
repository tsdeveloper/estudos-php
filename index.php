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
    "Is Peter\; DELETE FROM TABLES;  & funny?",
    "Developer",
    "usuario9" . date("Y/m/d H:i"),
    "123456789"
);

var_dump(
    $userModel
);

fullStackPHPClassSession("save create", __LINE__);
$userModel->id = 10;
$userModel->created_at = date("Y/m/d H:i");
fullStackPHPClassSession("antes de validar", __LINE__);


fullStackPHPClassSession("depois de validar", __LINE__);

if (!$model->find($userModel->email))
{
    echo "<p class='trigger warning'>CADASTRADO CONCLUÍDO</p>";
    $userModel->save();
}else {
    echo "<p class='trigger warning'>USER JÁ CADASTRADO</p>";
}

var_dump(
    $userModel
);
echo '</pre>';