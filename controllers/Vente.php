<?php
 
class Vente extends Controller{


    /**
     * @UserS('REQUIRED')
     */
    function index(){
        
        $d['view'] = array("titre" => "");
        $this->set($d); 
        $this->render('index');
    }
}
?>