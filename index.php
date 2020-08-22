<?php
require __DIR__ . '/fullstackphp/fsphp.php';
fullStackPHPClassName("05.07 - PDOStatement e bind modes");


use Source\Loading\Database\Connect;

//Obrigatorio
require_once("vendor/autoload.php");

/**
 * [ prepare ] http://php.net/manual/pt_BR/pdo.prepare.php
 */
fullStackPHPClassSession("prepared statement", __LINE__);
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



/*
 * [ bind value ] http://php.net/manual/pt_BR/pdostatement.bindvalue.php
 *
 */
fullStackPHPClassSession("stmt bind value", __LINE__);


/*
 * [ bind param ] http://php.net/manual/pt_BR/pdostatement.bindparam.php
 */
fullStackPHPClassSession("stmt bind param", __LINE__);


/*
 * [ execute ] http://php.net/manual/pt_BR/pdostatement.execute.php
 */
fullStackPHPClassSession("stmt execute array", __LINE__);


/*
 * [ bind column ] http://php.net/manual/en/pdostatement.bindcolumn.php
 */
fullStackPHPClassSession("bind column", __LINE__);
