<?php
require __DIR__ . '/fullstackphp/fsphp.php';
fullStackPHPClassName("a05.11-save-update");
//echo '<pre>';
/*
 * [ classe e objeto ] http://php.net/manual/pt_BR/language.oop5.basic.php
 */

fullStackPHPClassSession("save update", __LINE__);

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
$userModel = $model->load("id=2");
$userModel->last_name ="Peter";
$userModel->email = "developer@email.com";
$userModel->save();



var_dump(
    $userModel
);

echo '</pre>';