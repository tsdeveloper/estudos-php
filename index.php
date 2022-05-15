<?php
require __DIR__ . '/fullstackphp/fsphp.php';
fullStackPHPClassName("07.02 - Suas compras no packagist");
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

fullStackPHPClassSession("guide", __LINE__);
?>
<article class="trigger">
    <h1>COMPONENTE:</h1>
    <p>Um pacote de código que ajuda a resolver um problema específico da
        aplicação acelerando o processo de desenvolvimento.</p>

    <p><b>(!)</b> É um conjunto de classes, interfaces e traits relacionados
        a uma rotina específica, geralmente contidos em um namespace comum.</p>
</article>

<article class="trigger">
    <h1>Desacoplado:</h1>
    <p>Um ótimo componente tem uma interface simples de usar e é extremamente
        focado em resolver um único problema.</p>

    <p>É pequeno, contendo apenas o que precisa para resolver o problema
        específico (classes, interfaces, traits)</p>
</article>

<article class="trigger">
    <h1>Testado:</h1>
    <p>Desenvolvido para ser compartilhado, componentes são extremamente testados
        e podem ser validados na comunidade tanto no packagist quanto no git.</p>

    <p>É cooperativo e se relaciona bem com outros componentes para a criação de
        soluções maiores.</p>
</article>

<article class="trigger">
    <h1>Documentado:</h1>
    <p>Sabendo ler e seguir documentações você estará apto a usar os melhores
        componentes que são muito bem documentados sobre como entender, instalar
        e usar suas rotinas e soluções.</p>
</article>


echo '</pre>';
require __DIR__ . "/form.php";

?>
