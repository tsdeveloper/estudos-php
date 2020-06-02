<?php
try {
    $pdo = new PDO(
        'mysql:host=localhost;dbname=blog',
        'root',
        'root',
        [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ]
    );

} catch (PDOException $exception) {
    var_dump($exception);
}
