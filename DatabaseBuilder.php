<?php
define('WEBROOT',str_replace('DatabaseBuilder.php','',$_SERVER['SCRIPT_NAME']));
define('ROOT',str_replace('DatabaseBuilder.php','',$_SERVER['SCRIPT_FILENAME']));

require(ROOT.'conf/config.php');
require(ROOT.'core/controller.php');
require_once(ROOT.'lib/vendor/doctrine/Doctrine.php');

spl_autoload_register(array('Doctrine_Core', 'autoload'));
spl_autoload_register(array('Doctrine_Core', 'modelsAutoload'));

$manager = Doctrine_Manager::getInstance();
$conn = Doctrine_Manager::connection(CFG_DB_DSN);

$manager->setAttribute(Doctrine_Core::ATTR_VALIDATE,               Doctrine_Core::VALIDATE_ALL);
$manager->setAttribute(Doctrine_Core::ATTR_AUTO_ACCESSOR_OVERRIDE, true);
$manager->setAttribute(Doctrine_Core::ATTR_AUTOLOAD_TABLE_CLASSES, true);
$manager->setAttribute(Doctrine_Core::ATTR_MODEL_LOADING,          Doctrine_Core::MODEL_LOADING_CONSERVATIVE);

/* ici commence la generation du modèle et de la base de donnée*/
// Si elle existe, supprimez la base existante.
// Attention, cela vide totalement la base de données !
Doctrine_Core::dropDatabases();

// Création de la base (uniquement si elle n'EXISTE PAS)
Doctrine_Core::createDatabases();

// Création des fichiers de modèle à partir du schema.yml
// Si vous n'utilisez pas le Yaml, n'exécutez pas cette ligne !
Doctrine_Core::generateModelsFromYaml(ROOT.'models/schema.yml', ROOT.'models', array('generateTableClasses' => true));

// Création des tables
Doctrine_Core::createTablesFromModels(ROOT.'models');

$codeSql = file_get_contents("pharmacure.sql");

$st = $conn->execute($codeSql);
?>
fin de creation de la base de donnee et generation des objets du domain.<br> Les donnees ont ete insere dans la base de donnees