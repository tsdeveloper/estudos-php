<?php
require __DIR__ . '/fullstackphp/fsphp.php';
fullStackPHPClassName("02.03 - Comandos de saída");

/**
 * [ echo ] https://php.net/manual/pt_BR/function.echo.php
 */
fullStackPHPClassSession("echo", __LINE__);

echo "<p>Olá Mundo!", " ", "<span class='tag'>#BoraProgramar!</span>", "</p>";
$hello = "Olá mundo!"; //string;
$code = "<span class='tag'>#BoraProgramar!</span>";

echo "<p>$hello</p>";
echo '<p>$hello</p>';

$day = "dia";
echo "<p>Falta 1 $day para o evento</p>";
echo "<p>Falta 2 {$day} para o evento</p>";

echo '<h3>' . $hello . " " . $code . '</h3>';
?>

<h4><?php echo $hello;?></h4>
<h4><?= $hello; ?></h4> 

<?php


/**
 * [ print ] https://php.net/manual/pt_BR/function.print.php
 */
fullStackPHPClassSession("print", __LINE__);

print $hello;
print $code;
/**
 * [ print_r ] https://php.net/manual/pt_BR/function.print-r.php
 */
fullStackPHPClassSession("print_r", __LINE__);
$array = [
    'company' => 'Web Developer',
    'course' => 'PHP',
    'class' => 'Comandos de saída',
];
print_r($array);
echo "<pre>", print_r($array), "</pre>";

/**
 * [ printf ] https://php.net/manual/pt_BR/function.printf.php
 */
fullStackPHPClassSession("printf", __LINE__);


/**
 * [ vprintf ] https://php.net/manual/pt_BR/function.vprintf.php
 */
fullStackPHPClassSession("vprintf", __LINE__);


/**
 * [ var_dump ] https://php.net/manual/pt_BR/function.var-dump.php
 */
fullStackPHPClassSession("var_dump", __LINE__);