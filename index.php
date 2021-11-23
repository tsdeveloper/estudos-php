<?php
require __DIR__ . '/fullstackphp/fsphp.php';
fullStackPHPClassName("a06.a05-config-project-php");
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
//Instância de um objeto

echo '<pre>';
fullStackPHPClassSession("message class", __LINE__);
$message = new Message();

var_dump(
        $message, get_class_methods($message)
);

fullStackPHPClassSession("message types", __LINE__);

$error = $message->success("Imprimindo mensagem pela class");
var_dump(
        [
            $message->getText(),
            $message->getType(),
        ]
);

echo $message->success("Imprimindo mensagem render");
echo $message->info("Imprimindo mensagem render");
echo $message->warning("Imprimindo mensagem render");
echo $message->error("É uma mensagem render");

fullStackPHPClassSession("flash message", __LINE__);
$message->info("Mensagem de login 1")->flash('teste');
var_dump(
    CONFIG_MESSAGE_CHECKOUT
);

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