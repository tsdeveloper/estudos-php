<?php
/*DATABASE*/
define("CONFIG_DB_HOST", "localhost");
define("CONFIG_DB_USER", "root");
define("CONFIG_DB_PASS", "root123");
define("CONFIG_DB_NAME", "fullstackphp");


/*PROJECT URLS*/
define("CONFIG_URL_BASE", "http://www.localhost:8000/fsphp");
define("CONFIG_URL_ADMIN", CONFIG_URL_BASE . "/admin");
define("CONFIG_URL_ERROR", CONFIG_URL_BASE . "/404");

/*DATES*/
define("CONFIG_DATE_BR", "d/m/Y H:i:s");
define("CONFIG_DATE_APP", "Y-m-d H:i:s");

/*SESSIONS*/
define("CONFIG_SES_PATH",  __DIR__ . "/../../Storage/Sessions");

/*PASSWORD*/
define("CONFIG_REGISTER_LOGIN_MIN_LEN", 3);
define("CONFIG_REGISTER_LOGIN_MAX_LEN", 10);
define("CONFIG_PASSWD_MIN_LEN", 8);
define("CONFIG_PASSWD_MAX_LEN", 40);
define("CONFIG_PASSWD_ALGO", PASSWORD_DEFAULT);
define("CONFIG_PASSWD_OPTION", ["cost"=> 10]);

/*MESSAGE*/
define("CONFIG_MESSAGE_CLASS", "trigger");
define("CONFIG_MESSAGE_INFO", "info");
define("CONFIG_MESSAGE_SUCCESS", "success");
define("CONFIG_MESSAGE_WARNING", "warning");
define("CONFIG_MESSAGE_ERROR", "error");
define("CONFIG_MESSAGE_LOGIN", "Login realizado com sucesso!");
define("CONFIG_MESSAGE_CHECKOUT", "Item adicionado com sucesso!");

/*EMAIL*/
define('CONFIG_MAIL_HOST','smtp.sendgrid.net');                     //Set the SMTP server to send through
define('CONFIG_MAIL_PORT', '587');
define('CONFIG_MAIL_USER', 'apikey');
define('CONFIG_MAIL_PASS', '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');                               //SMTP password
define('CONFIG_MAIL_SENDER', ['name' => 'Curso PHP', 'address' => "estudosphpdeveloper@gmail.com"]);
define('CONFIG_MAIL_OPTION_LANG', 'br');
define('CONFIG_MAIL_OPTION_HTML', true);
define('CONFIG_MAIL_OPTION_AUTH', true);
define('CONFIG_MAIL_OPTION_SECURE', 'tls');
define('CONFIG_MAIL_OPTION_CHARSET', 'utf-8');
