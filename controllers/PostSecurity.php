<?php
class PostSecurity implements SecurityManager  {
	
	public static function Check($controller,$action){
		
        $classCheck = AnnotationManager::getClassAnnotation($controller,'Post');
        $methodeCheck = AnnotationManager::getMethodAnnotation($controller,$action,'Post');

		if($classCheck == 'OK' OR $methodeCheck == 'OK')
		{
			if(PostSecurity::PostCheck()){return true;}
        }
		if($classCheck == null AND $methodeCheck == null)
		{
         	return true;			
        }
        return false;	
	}

	public static function PostCheck(){
		if(!empty($_POST))
		{
         	return true;			
        }
        return false;	
	}
}
?>