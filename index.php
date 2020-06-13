<?php
require __DIR__ . '/fullstackphp/fsphp.php';
fullStackPHPClassName("Aula a05.07-pdo-statement");
//echo '<pre>';
/*
 * [ classe e objeto ] http://php.net/manual/pt_BR/language.oop5.basic.php
 */

fullStackPHPClassSession("prepared statement", __LINE__);

use Source\Loading\Classes\Message;
use Source\Loading\Database\Connect;

//Obrigatorio
require_once("vendor/autoload.php");

//Importação de Class

$pdo = Connect::getInstance();

// TODO: Implement ready() method.
try {

    // TODO: Implement create() method.
    $sql = 'SELECT userName FROM  message';

//            $stm = $this->pdo->query($sql);
    $stm = $pdo->prepare($sql);
    $stm->execute();


} catch (PDOException $exception) {
    var_dump($exception);
}

var_dump(
    $stm,
    $stm->rowCount(),
    $stm->columnCount(),
    $stm->fetch()
//    $messageAll->fetchAll()  //traz todos os registros dos banco
);


fullStackPHPClassSession("stm bind value", __LINE__);

$pdo = Connect::getInstance();

// TODO: Implement ready() method.
try {

    // TODO: Implement create() method.
    $sql = 'SELECT * FROM  message WHERE userName = :userName AND msg = :msg  LIMIT 5';

//            $stm = $this->pdo->query($sql);
    $stm = $pdo->prepare($sql);
    $stm->bindValue(':userName', 'Developer');
    $stm->bindValue(':msg', 'Developer');

    $stm->execute();


} catch (PDOException $exception) {
    var_dump($exception);
}

var_dump(
    $stm,
    $stm->fetchAll()
//    $messageAll->fetchAll()  //traz todos os registros dos banco
);


fullStackPHPClassSession("stm bind param", __LINE__);

$pdo = Connect::getInstance();

// TODO: Implement ready() method.
try {

    // TODO: Implement create() method.
    $sql = 'SELECT * FROM  message WHERE userName = :userName  LIMIT 5';

    $userName = 'Developer';

    $stm = $pdo->prepare($sql);
    $stm->bindParam(':userName', $userName);
    $stm->execute();


} catch (PDOException $exception) {
    var_dump($exception);
}

var_dump(
    $stm,
    $stm->fetchAll()
//    $messageAll->fetchAll()  //traz todos os registros dos banco
);


fullStackPHPClassSession("stm execute array", __LINE__);

$pdo = Connect::getInstance();

$array = [
    "login" => "debora",
    "senha" => '123'
];

// TODO: Implement ready() method.
try {

    // TODO: Implement create() method.
    $sql = 'SELECT * FROM  login WHERE login = :login AND senha = :senha LIMIT 5';


    $stm = $pdo->prepare($sql);

    $stm->execute($array);


} catch (PDOException $exception) {
    var_dump($exception);
}

var_dump(
    $stm,
    $stm->fetchAll()
//    $messageAll->fetchAll()  //traz todos os registros dos banco
);



fullStackPHPClassSession("bind column", __LINE__);

$pdo = Connect::getInstance();

// TODO: Implement ready() method.
try {

    // TODO: Implement create() method.
    $sql = 'SELECT * FROM  login  LIMIT 5';


    $stm = $pdo->prepare($sql);

    $stm->execute();
    $resultado =   $stm->fetchAll();
    echo 'Mostrando todos os registros 1';
    var_dump(
        $resultado
    );

    echo 'Mostrando todos os registros 2';
    var_dump(
        $resultado
    );

    echo 'Mostrando todos os registros 3';
    var_dump(
        $resultado
    );
//
//    $stm->bindColumn(2, $login);
//    $stm->bindColumn(3, $senha);


} catch (PDOException $exception) {
    var_dump($exception);
}
echo 'Mostrando os nomes dos registros';
foreach ($resultado as $variavelLogin) {
    echo  "<p>Nome de login é: {$variavelLogin->login}, a senha é: {$variavelLogin->senha}</p>";

}


