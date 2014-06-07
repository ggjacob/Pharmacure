<?php
class AnnotationManager {
		
	public static function getClassAnnotation($className,$annotation){
    	$reflectedClass = new ReflectionAnnotatedClass($className);
    	
    	if($reflectedClass->getAnnotation($annotation))
    	{	
    		return $classCheck = $reflectedClass->getAnnotation($annotation)->value;
		}
		return null;
	}

	public static function getMethodAnnotation($className,$action,$annotation){
		$reflectedMethod = new ReflectionAnnotatedMethod($className,$action);
    	
    	if($reflectedMethod->getAnnotation($annotation))
    	{	
    		return $classCheck = $reflectedMethod->getAnnotation($annotation)->value;
		}
		return null;	
	}

}
?>