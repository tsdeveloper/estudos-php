<?php
require __DIR__ . '/fullstackphp/fsphp.php';
fullStackPHPClassName("07.a03-gestao-dependencia");
//echo '<pre>';
/*
 * [ classe e objeto ] http://php.net/manual/pt_BR/language.oop5.basic.php
 */

//IMPORTAÇÃO DA CLASS MODEL

//Obrigatorio

require __DIR__ . '/vendor/autoload.php';



echo '<pre>';


var_dump(get_defined_constants(true)['user']);

echo '</pre>';
require __DIR__ . "/form.php";

?>
