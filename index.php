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
use Source\Loading\Database\Connect;

//Obrigatorio
require_once("vendor/autoload.php");
//Instância de um objeto

echo '<pre>';

$retornoApiCorreio = "address='Rua XPTO 1'&CEP=1234";
$dadosEnderecoUsuario = [
        "telefone" => 47123456789,
        "email" => "email@email.com",
];

parse_str($retornoApiCorreio, $result);
$dadosEnderecoUsuario = array_merge($result, $dadosEnderecoUsuario);

var_dump(
    $dadosEnderecoUsuario
);

//INSERT INTO NOME_TABELA (address,CEP,telefone,email) VALUES (:address, :CEP, :telefone, :email)

$colunas = implode(",", array_keys($dadosEnderecoUsuario));
$values = ":" . implode(", :", array_keys($dadosEnderecoUsuario));
var_dump(
    $colunas,
    $values
);

$templateInsert = "INSERT INTO NOME_TABELA ({$colunas}) VALUES ({$values}";
$stmt = Connect::getInstance()->prepare($templateInsert);
for ($i = 1; $i < 10; $i++ ) {
    $stmt->execute($dadosEnderecoUsuario);
}

/*)";*/






echo '</pre>';
?>

<form action="index.php" method="get">
    <p>Your name: <input type="text" name="name" /></p>
    <p>Your age: <input type="text" name="age" /></p>
    <p><input type="submit" /></p>
</form>
