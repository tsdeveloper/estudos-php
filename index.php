<?php
require __DIR__ . '/fullstackphp/fsphp.php';
fullStackPHPClassName("04.02 - Classes, propriedades e objetos");
echo '<pre>';
/*
 * [ classe e objeto ] http://php.net/manual/pt_BR/language.oop5.basic.php
 */
fullStackPHPClassSession("classe e objeto", __LINE__);
//Obrigatorio
require __DIR__ . "/classes/User.php";
require __DIR__ . "/classes/Carro.php";
require __DIR__ . "/classes/Pessoa.php";
require __DIR__ . "/classes/Casa.php";

//INSTÃNCIA DE UM OBJETO, Objeto
//OBJETO = NEW USER
$user = new User();
var_dump($user);

$carro = new Carro();
var_dump($carro);

$pessoa = new Pessoa();
var_dump($pessoa);

$casa = new Casa();
var_dump($casa);


/*
 * [ propriedades ] http://php.net/manual/pt_BR/language.oop5.properties.php
 */
fullStackPHPClassSession("propriedades", __LINE__);

$user->firstName = "Robson";
$user->lastName = "Leite";
$user->email = "cursos";

var_dump($user);

echo "<p>O e-mail de {$user->firstName} é {$user->email}!</p>";

$carro->cor = 'azul';
$carro->motor = '2.0';


var_dump($carro);

echo "A cor do carro é: {$carro->cor}, motor: {$carro->motor}";

$carro->cor = 'Amarelo';
$carro->setMudarCor('Verde');
echo '<br>';
echo "A cor do carro é: {$carro->cor}, motor: {$carro->motor}";
/*
 * [ métodos ] São as funções que definem o comportamento e a regra de negócios de uma classe
 */
fullStackPHPClassSession("métodos", __LINE__);

$user->setFirstName("Thiago");
$user->setLastName("Almeida");

if (!$user->setEmail("cursos@upinside.com.br")) {
    echo "<p class='trigger error'>O e-mail {$user->getEmail()} não é válido!</p>";
}

$user->email = "cursos";

var_dump($user);
echo '</pre>';