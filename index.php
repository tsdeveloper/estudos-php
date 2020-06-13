<?php
require __DIR__ . '/fullstackphp/fsphp.php';
fullStackPHPClassName("Aula a05.07-pdo-statement");
//echo '<pre>';
/*
 * [ classe e objeto ] http://php.net/manual/pt_BR/language.oop5.basic.php
 */
fullStackPHPClassSession("Sistema de Comentários", __LINE__);
use Source\Loading\Classes\Message;
use Source\Loading\Database\Connect;

//Obrigatorio
require_once("vendor/autoload.php");

//Importação de Class

$message = new Message(Connect::getInstance());
$instance1 = Connect::getInstance();
$instance2 = Connect::getInstance();
$messageAll = $message->ready();
$userName = $_POST['userName'] ?? "";
$msg = $_POST['msg'] ?? "";

//foreach ($postAll as $p) {
//    var_dump($p['userName']);
//}

var_dump(
        $instance1,
        $instance2
);

if (isset($userName) && !empty($userName) && isset($msg) && !empty($msg) ) {

    $message->setUserName($userName);
    $message->setMsg($msg);
        $message->create();
}


 ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">


</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Sistema de Comentários</h5>
            <h6 class="card-subtitle mb-2 text-muted">Cadastre as informações abaixo</h6>
            <?= !empty($userName) ? "<p class='alert alert-info'>$userName</p>" : ''; ?>
            <form method="post" action="/">
                <div class="form-group">
                    <label for="userName">User Comment</label>
                    <input type="text" class="form-control" id="userName" name="userName" placeholder="Enter user name">

                </div>
                <div class="form-group">
                    <label for="msg">Message</label>
                    <textarea type="text" class="form-control" name="msg" id="msg" row="3" placeholder="Enter msg">
                </textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>


    </div>



</div>

<div class="container d-flex justify-content-around mt-3">
    <?php  foreach ($messageAll as $p) {?>
    <div class="col-4">
        <div class="card">
            <img class="card-img-top" src=".../100px180/" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?= $p->userName; ?></h5>
                <p class="card-text alert alert-info"><?= $p->dataCreated; ?></p>
                <p class="card-text alert alert-success" ><?= $p->msg; ?></p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
    <?php }?>


</div>
</body>
</html>

