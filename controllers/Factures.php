<?php
 
class Factures extends Controller{


    /**
     * @UserS('REQUIRED')
     */
    function index(){
        
        $d['view'] = array("titre" => "Gestion des Factures");
        $this->set($d); 
        $this->render('index');
    }
}
?>