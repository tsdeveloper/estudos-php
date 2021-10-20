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