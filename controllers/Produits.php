<?php
 
class Produits extends Controller{


    /**
     * @UserS('REQUIRED')
     */
    function index(){
    	$form['type'] ='create';    
        $produits = new Produit();
        $produits = Doctrine_Core::getTable('produit')->findAll();
        $taxes = new Taxe();
        $taxes = Doctrine_Core::getTable('taxe')->findAll();
        $classes = new Classe();
        $classes = Doctrine_Core::getTable('classe')->findAll();
        $d['view'] = array("titre" => "Gestion des produits","classes"=>$classes, "taxes"=>$taxes, "produits"=>$produits, "form" => $form );
        $this->set($d);
        $this->render('index');
    }
}
?>