<?php
require __DIR__ . '/fullstackphp/fsphp.php';
fullStackPHPClassName("04.02 - Classes - Aprendendo métodos");
echo '<pre>';
/*
 * [ classe e objeto ] http://php.net/manual/pt_BR/language.oop5.basic.php
 */
fullStackPHPClassSession("Métodos", __LINE__);


//Obrigatorio

require_once("vendor/autoload.php");

$gerente = new \Source\Loading\Gerente("Gerente 1", "123456789", 5000);
$analista = new \Source\Loading\Analista("Analista 1", "123456789", 5000);


echo "A bonificação do Gerente é : {$gerente->calcularBonificacao()}</p>";
echo "<p>A bonificação do Analista é : {$analista->calcularBonificacao()}</p>";
var_dump(
    $gerente,
    $analista
    );

echo '</pre>';