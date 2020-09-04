<?php
require __DIR__ . '/fullstackphp/fsphp.php';
fullStackPHPClassName("a05.08-modelo-layer");
//echo '<pre>';
/*
 * [ classe e objeto ] http://php.net/manual/pt_BR/language.oop5.basic.php
 */

fullStackPHPClassSession("layer", __LINE__);

//IMPORTAÇÃO DA CLASS MODEL
use Source\Loading\Classes\Model;
use Source\Loading\Classes\UserModel;

//Obrigatorio
require_once("vendor/autoload.php");

$layer = new ReflectionClass(Model::class);

var_dump(
    $layer->getDefaultProperties(),
    $layer->getMethods(),
    $layer->getName(),
    $layer->getNamespaceName()
);


fullStackPHPClassSession("userModel", __LINE__);

$userModel = new UserModel();

var_dump(
    $userModel,
    get_class_methods($userModel),
    get_parent_class($userModel)
);
