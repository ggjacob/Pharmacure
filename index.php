<?php
define('WEBROOT',str_replace('index.php','',$_SERVER['SCRIPT_NAME']));
define('ROOT',str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']));

require(ROOT.'conf/config.php');
require(ROOT.'core/controller.php');

require(ROOT.'lib/addendum/annotations.php');
require(ROOT.'annotations/MyAnnotations.php');
require(ROOT.'core/AnnotationManager.php');
require(ROOT.'core/SecurityManager.php');
require(ROOT.'controllers/UserSecurity.php');
require(ROOT.'controllers/PostSecurity.php');
require(ROOT.'controllers/AdminSecurity.php');
require(ROOT.'controllers/IntermediaireSecurity.php');
require(ROOT.'core/Upload.php');
require(ROOT.'lib/functions.php');


require(ROOT.'lib/vendor/doctrine/Doctrine.php');

require(ROOT.'core/Model.php');

$params = explode('/',$_GET['p']);
$controller = $params[0];
$action = isset($params[1]) ? $params[1] : 'index';
//header('Content-type: text/html; charset=UTF-8');
if(empty($controller)){
	$controller = 'Home';
	$action = 'index';	
}


session_start(); // Session initialisation 
require('controllers/'.$controller.'.php');
$controller = new $controller();
if(method_exists($controller, $action)){
    
    
    if(UserSecurity::Check($controller, $action) && PostSecurity::Check($controller, $action) && AdminSecurity::Check($controller, $action) && IntermediaireSecurity::Check($controller, $action) )
    {

	    unset($params[0]); unset($params[1]);
	    call_user_func_array(array($controller,$action),$params);
    }	else{
		$controller->alert('Veillez vous connecter pour accéder à cette fonctionnalité',2000);
        $controller->redirect('Comptes/connexion',2);
		/*
    	echo 'le post : '
    	.AnnotationManager::getMethodAnnotation($controller,$action,'Post').'<br> le user : '.
    	AnnotationManager::getMethodAnnotation($controller,$action,'Security').'<br>';

    	echo 'le post : '
    	.PostSecurity::Check($controller, $action).'<br> le user : '.
    	UserSecurity::Check($controller, $action).'<br>';
		*/
    }
}
else{
	require('controllers/erreurs.php');
	$erreurs = new erreurs();
	$erreurs->index();	
}

?>