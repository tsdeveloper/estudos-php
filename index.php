<?php
require __DIR__ . '/fullstackphp/fsphp.php';
fullStackPHPClassName("a06.a10-xxs csrf security");
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
session();
echo '<pre>';

fullStackPHPClassSession("find", __LINE__);
$user = user()->findById(5);
$user->first_name = "Test1";
$user = $user->save();
var_dump(
        $user
);

fullStackPHPClassSession("find by id", __LINE__);
fullStackPHPClassSession("all", __LINE__);
fullStackPHPClassSession("save created", __LINE__);
fullStackPHPClassSession("save updated", __LINE__);


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
    <?= csrf_input(); ?>
    <p>First name: <input type="text" name="first_name" /></p>
    <p>Last name: <input type="text" name="last_name" /></p>
    <p>Email: <input type="email" name="email" /></p>
    <p>Password: <input type="password" name="password" /></p>
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
