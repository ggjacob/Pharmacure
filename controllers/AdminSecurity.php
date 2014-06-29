<?php
class AdminSecurity implements SecurityManager  {
	public static function Check($controller,$action){
		
        $classCheck = AnnotationManager::getClassAnnotation($controller,'Admin');
        $methodeCheck = AnnotationManager::getMethodAnnotation($controller,$action,'Admin');
		
		if($classCheck == 'REQUIRED' OR $methodeCheck == 'REQUIRED')
		{
			if(AdminSecurity::UserCheck()){return true;}else return false;
        }


		if($classCheck == null AND $methodeCheck == null)
		{
         	return true;			
        } 	
	}

	public static function UserCheck(){
		if(isset($_SESSION['user']) && $_SESSION['user']->Type==3)
		{
         	return true;			
        }
        return false;	
	}
}
?>