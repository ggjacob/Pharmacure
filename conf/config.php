<?php
// data base configuration
define('dbuser','root'); // database user
define('dbpassword','root'); // database password
define('dbserver','localhost'); // database server adress
define('dbname','pharmacure'); // database name
define('CFG_DB_DSN', 'mysql://'.dbuser.':'.dbpassword.'@'.dbserver.'/'.dbname); // DSN varchar for doctrine

define('SecurityManager','YES'); // activation du module de sécurité 'NO' pour désactiver.



?>