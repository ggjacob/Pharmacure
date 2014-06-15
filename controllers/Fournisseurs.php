<?php
 
class Fournisseurs extends Controller{


    /**
     * @UserS('REQUIRED')
     */
    function index(){
        $form['type'] ='create';
        $d['view'] = array("titre" => "Gestion des Fournisseurs","form" => $form );
        $this->set($d); 
        $this->render('index');
    }
}
?>