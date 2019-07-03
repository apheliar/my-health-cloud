<?php
// Mysql config

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME','database_name');

// App Root
define('APPROOT', dirname(dirname(__FILE__)));
// Public Root
define('PUBLICROOT', dirname(dirname(dirname(__FILE__))). '/public/');
// Url Root
define('URLROOT', 'http://192.168.33.10');
// Site Name
define('SITENAME', 'my-health-cloud');