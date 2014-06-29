<?php
class IntermediaireSecurity implements SecurityManager  {
	public static function Check($controller,$action){
		
        $classCheck = AnnotationManager::getClassAnnotation($controller,'Intermediaire');
        $methodeCheck = AnnotationManager::getMethodAnnotation($controller,$action,'Intermediaire');
		
		if($classCheck == 'REQUIRED' OR $methodeCheck == 'REQUIRED')
		{
			if(IntermediaireSecurity::UserCheck()){return true;}else return false;
        }


		if($classCheck == null AND $methodeCheck == null)
		{
         	return true;			
        } 	
	}

	public static function UserCheck(){
		if(isset($_SESSION['user']) && $_SESSION['user']->Type==2)
		{
         	return true;			
        }
        return false;	
	}
}
?>