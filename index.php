<?php
require __DIR__ . '/fullstackphp/fsphp.php';
fullStackPHPClassName("Aula 05.01-Banco de Dados#Aula-Extra");
//echo '<pre>';
/*
 * [ classe e objeto ] http://php.net/manual/pt_BR/language.oop5.basic.php
 */
fullStackPHPClassSession("Sistema de Comentários", __LINE__);

//Obrigatorio
require_once("Config/Config.php");
require_once("vendor/autoload.php");

//Importação de Class
use Source\Loading\Loading\Classes\Post;

$post = new Post($pdo);
$userName = $_POST['userName'] ?? "";
$msg = $_POST['msg'] ?? "";


if (isset($userName) && !empty($userName) && isset($msg) && !empty($msg) ) {

    $post->setUserName($userName);
    $post->setMsg($msg);
        $post->create();
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
</body>
</html>

