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
require_once('Source/Support/Helper.php');
//Instância de um objeto

echo '<pre>';
fullStackPHPClassSession("message class", __LINE__);
$string = "Feliz Natal";
//$string = "Essa é uma string, nela temos um under_score e um guarda-chuva!";
$message = new Message();

echo $message->info(str_slug($string));
echo $message->info(str_study_case($string));
echo $message->info(str_camel_case($string));
echo $message->info(str_title($string));
echo $message->info(str_limit_words($string, 9));

$test = "O cpf do fulano seria 102938348347";

var_dump(mb_strrpos($test,'8'));

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