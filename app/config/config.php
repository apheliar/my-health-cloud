<?php
// Mysql config

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME','database_name');

// App Root
define ('APPROOT', dirname(dirname(__FILE__)));
// Public Root
define ('PUBLICROOT', dirname(dirname(dirname(__FILE__))). '/public/');
// Site Name
define('SITENAME', 'my-own-mvc-framework');