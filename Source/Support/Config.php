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

/*MESSAGE*/
define("CONFIG_MESSAGE_CLASS", "trigger");
define("CONFIG_MESSAGE_INFO", "info");
define("CONFIG_MESSAGE_SUCCESS", "success");
define("CONFIG_MESSAGE_WARNING", "warning");
define("CONFIG_MESSAGE_ERROR", "error");
define("CONFIG_MESSAGE_LOGIN", "Login realizado com sucesso!");
define("CONFIG_MESSAGE_CHECKOUT", "Item adicionado com sucesso!");
