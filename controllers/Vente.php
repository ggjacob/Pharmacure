<?php
 
class Vente extends Controller{


    /**
     * @UserS('REQUIRED')
     */
    function index(){
        
        $d['view'] = array("titre" => "On vend ou bien ?? Makoroni ni cho o ni mayonaise au be ne deme");
        $this->set($d); 
        $this->render('index');
    }
}
?>