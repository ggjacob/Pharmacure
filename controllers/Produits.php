<?php
 
class Produits extends Controller{


    /**
     * @UserS('REQUIRED')
     */
    function index(){
        
        $d['view'] = array("titre" => "Gestion des produits");
        $this->set($d); 
        $this->render('index');
    }
}
?>