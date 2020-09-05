<?php
require __DIR__ . '/fullstackphp/fsphp.php';
fullStackPHPClassName("a05.09-pdo-statement-ready");
//echo '<pre>';
/*
 * [ classe e objeto ] http://php.net/manual/pt_BR/language.oop5.basic.php
 */

fullStackPHPClassSession("load", __LINE__);

//IMPORTAÇÃO DA CLASS MODEL
use Source\Loading\Classes\Model;
use Source\Loading\Classes\UserModel;

//Obrigatorio
require_once("vendor/autoload.php");

$userModel = new UserModel();
$user = $userModel->load(2);

var_dump(
    $user
);

fullStackPHPClassSession("userModel", __LINE__);
