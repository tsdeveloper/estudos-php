<?php
namespace source\Core;

use PDO;
use PDOException;

class Connect {

    private const OPTIONS = [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', //Configura para aceitar carateres especiais
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Exibe erros de exception
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, // converter os dados do PDO como object array
        PDO::ATTR_CASE => PDO::CASE_NATURAL // traz todos nomes de colunas conforme foi criado
    ];

    private static $instance;

    /**
     * Connect constructor.
     */
    final private function __construct()
    {
    }

    /**
     * Connect clone.
     */
    final private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    /**
     * @return PDO
     */
    public static function getInstance() : PDO
    {
        if (empty(self::$instance)) {
            try {
                self::$instance = new PDO(
                    "mysql:host=" . CONFIG_DB_HOST . ";dbname=" . CONFIG_DB_NAME,
                    CONFIG_DB_USER,
                    CONFIG_DB_PASS,
                    self::OPTIONS
                );

            } catch (PDOException $exception) {
                die("<h1>Woops! Erro ao conectar...</h1>");
            }
        }
        return self::$instance;
    }

}
