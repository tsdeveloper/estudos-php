<?php
require __DIR__ . '/fullstackphp/fsphp.php';
fullStackPHPClassName("a05.09-pdo-statement-ready");
//echo '<pre>';
/*
 * [ classe e objeto ] http://php.net/manual/pt_BR/language.oop5.basic.php
 */

fullStackPHPClassSession("load", __LINE__);

//IMPORTAÇÃO DA CLASS MODEL
use Source\Loading\Classes;
use Source\Loading\Classes\UserModel;

//Obrigatorio
require_once("vendor/autoload.php");
//Instância de um objeto


//AND = e
//OR =
$userModel = new UserModel();
$user = $userModel->load("id=1&document=1");
/*$minhaStr = "id=1&name=User";

parse_str($minhaStr, $minhaArray);*/

var_dump(
    $user
);

fullStackPHPClassSession("userModel", __LINE__);
