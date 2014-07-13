<?php
 
/**
 * @UserS('REQUIRED')
 */
class Vente extends Controller{
   
    function index(){
        
        $d['view'] = array("titre" => "");
        $this->set($d); 
        $this->render('index');
    }
}
?>