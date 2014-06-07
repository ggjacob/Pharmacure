<?php
// data base configuration
define('dbuser','root'); // database user
define('dbpassword',''); // database password
define('dbserver','localhost'); // database server adress
define('dbname','pharmacurePHP'); // database name
define('CFG_DB_DSN', 'mysql://'.dbuser.'@'.dbserver.'/'.dbname); // DSN varchar for doctrine

define('SecurityManager','YES'); // activation du module de sécurité 'NO' pour désactiver.



define('messageFileDir',WEBROOT.'public/uploads/messageries'); // repertoire d'upload des fichiers de message.

define('annonceFileDir',WEBROOT.'public/uploads/annonces'); // repertoire d'upload des fichiers d'annonce'. 
?>