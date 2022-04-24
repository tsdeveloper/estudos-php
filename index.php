<?php
require __DIR__ . '/fullstackphp/fsphp.php';
fullStackPHPClassName("06.a12-register-user");
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

fullStackPHPClassSession("save user", __LINE__);


//SQL INJECTION
$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

if ($post){
    $data = (object)$post;

    if (!csrf_verify($post)){
        $error = message()->error("Error ao enviar, favor tente novamente");
    } else {
        $user = user()->bootstrap(
        $data->first_name,
        $data->last_name,
        $data->email,
        $data->password);

        if (!$user->save()){
            echo $user->message();
        } else {
             echo message()->success("Cadastro realizado com sucesso!");
        }
    }

    var_dump(
        $data
    );
}
echo '</pre>';
require __DIR__ . "/form.php";

?>
