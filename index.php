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
use Source\Loading\Classes\ProductModel;
use Source\Loading\Classes\CarrinhoModel;

//Obrigatorio
require_once("vendor/autoload.php");
//Instância de um objeto


//AND = e
//OR =
$userModel = new UserModel();
$product = new ProductModel();
$carrinho = new CarrinhoModel();
$productModel = $product->bootstrap(1, 'product1', 100, 2);

$carrinhoModel = $carrinho->bootstrap(0.00,$productModel);

$product->bootstrap(2, 'product2', 200, 2);
//
$carrinhoModel->bootstrap(0.00,$productModel);

//$carrinho->total = array_sum($carrinho->produtos['price']);




var_dump(
    $carrinhoModel,
    $productModel
);

fullStackPHPClassSession("userModel", __LINE__);
