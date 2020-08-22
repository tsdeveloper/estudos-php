<?php
namespace Source\Loading\Database;

use PDO;
use PDOException;

class Connect
{

    private const HOST = 'localhost';
    private const USER = 'root';
    private const DBNAME = 'blog';
    private const PASSWD = 'root';

    private static $instance;

    private const OPTIONS = [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', //Configura para aceitar carateres especiais
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Exibe erros de exception
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, // converter os dados do PDO como object array
        PDO::ATTR_CASE => PDO::CASE_NATURAL // traz todos nomes de colunas conforme foi criado
    ];

    final private function __construct()
    {
    }

    final private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public static function getInstance(): PDO
    {

        if (empty(self::$instance)) {

            try {
                self::$instance = new PDO(
                    "mysql:host=" . self::HOST . ";dbname=" . self::DBNAME,
                    self::USER,
                    self::PASSWD,
                    self::OPTIONS
                );

            } catch (PDOException $exception) {
                var_dump($exception);
            }
        }

        return self::$instance;
    }

}
