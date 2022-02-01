<?php
require __DIR__ . '/fullstackphp/fsphp.php';
fullStackPHPClassName("a06.a09-security");
//echo '<pre>';
/*
 * [ classe e objeto ] http://php.net/manual/pt_BR/language.oop5.basic.php
 */

//IMPORTAÇÃO DA CLASS MODEL
use Source\Core\Connect;
use Source\Core\Message;
use Source\Models\User;
use \Source\Core\Session;

//Obrigatorio
require_once("vendor/autoload.php");
require_once('Source/Support/Config.php');
require_once('Source/Support/Helper.php');
//Instância de um objeto

echo '<pre>';
fullStackPHPClassSession("password hashing", __LINE__);
$pass_fake = 12345;
$pass = password_hash($pass_fake, PASSWORD_DEFAULT);

var_dump(
    $pass,
    $pass
);

var_dump(
        password_get_info($pass),
    password_needs_rehash($pass, PASSWORD_DEFAULT, ["cost" => 10]),
    password_verify($pass_fake, $pass)

);

fullStackPHPClassSession("password saving", __LINE__);

$user = user()->load('id=1');
$user->password = $pass;
$user->save();


var_dump($user);

fullStackPHPClassSession("password verify", __LINE__);
$pass_fake = 1234556;
$login = user()->find("robson1@email.com.br");
var_dump($login);
//AND= & OR = |
if (!$login | !password_verify($pass_fake, $user->password)) {
    echo message()->info("E-mail informado não confere");
}else
{
    echo message()->success("Login realizado com sucesso");
}

fullStackPHPClassSession("password handler", __LINE__);

echo '</pre>';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="index.php" method="get">
        <p>Your name: <input type="text" name="name" /></p>
        <p>Your age: <input type="text" name="age" /></p>
        <p><input type="submit" /></p>
    </form>

    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/sweetalert/dist/sweetalert.min.js"></script>
    <script>

        $(function () {
          /*  swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success",
                        });
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });*/
        })
    </script>
</body>

</html>