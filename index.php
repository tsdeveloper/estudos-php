<?php
require __DIR__ . '/fullstackphp/fsphp.php';
fullStackPHPClassName("a05.09-pdo-statement-ready");
//echo '<pre>';
/*
 * [ classe e objeto ] http://php.net/manual/pt_BR/language.oop5.basic.php
 */

fullStackPHPClassSession("bootstrap - preenchendo campos para salvar", __LINE__);

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
$userModel = $model
                    ->bootstrap("Aluno", "Aluno 2019",
                        "aluno2019@email.com.br", ""
                                );
var_dump(
    $userModel
);

fullStackPHPClassSession("save - método para salvar o objeto userModel", __LINE__);

$userModel->id = 10;
$userModel->created_at = date('Y/m/d H:i');

//16,Daniel,Santos,daniel41@email.com.br,,2021-09-14 20:47:14,
if (!$model->find($userModel->email)){
    echo "<p class='trigger warning'>Cadastro com Sucesso</p>";
    $userModel->save();
}else {
    echo "<p class='trigger accept'>Já Cadastrado</p>";
}
echo '</pre>';