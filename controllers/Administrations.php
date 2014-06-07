<?php
 
class Administrations extends Controller{


    /**
     * @UserS('REQUIRED')
     */
    function index(){
        
        $d['view'] = array("titre" => "Administrations de la pharmacie");
        $this->set($d); 
        $this->render('index');
    }
}
?>