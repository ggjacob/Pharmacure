<?php
 
class Inventaires extends Controller{
    /**
     * @UserS('REQUIRED')
     */
    function index(){
        
        $d['view'] = array("titre" => "Gestion des Inventaires");
        $this->set($d); 
        $this->render('index');
    }
}
?>