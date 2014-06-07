<?php
 
class Fournisseurs extends Controller{


    /**
     * @UserS('REQUIRED')
     */
    function index(){
        
        $d['view'] = array("titre" => "Gestion des Fournisseurs");
        $this->set($d); 
        $this->render('index');
    }
}
?>