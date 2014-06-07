<?php
class UserSecurity implements SecurityManager  {
	public static function Check($controller,$action){
		
        $classCheck = AnnotationManager::getClassAnnotation($controller,'UserS');
        $methodeCheck = AnnotationManager::getMethodAnnotation($controller,$action,'UserS');
		
		if($classCheck == 'REQUIRED' OR $methodeCheck == 'REQUIRED')
		{
			if(UserSecurity::UserCheck()){return true;}else return false;
        }


		if($classCheck == null AND $methodeCheck == null)
		{
         	return true;			
        } 	
	}

	public static function UserCheck(){
		if(isset($_SESSION['user']))
		{
         	return true;			
        }
        return false;	
	}
}
?>