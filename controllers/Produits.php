<?php
 
class Produits extends Controller{


    /**
     * @UserS('REQUIRED')
     */
    function index(){
    	$form['type'] ='create';    
        $d['view'] = array("titre" => "Gestion des produits","form" => $form );
        $this->set($d);
        $this->render('index');
    }
}
?>