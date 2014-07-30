<?php
 
class Home extends Controller{

	/**
     * @UserS('REQUIRED')
     */
    function index(){

            $clients = new Client();
            $clients = Doctrine_Core::getTable('client')->findAll();
            $d['view'] = array("titre" => "Pharmacure","clients"=>$clients);
			$this->set($d);
			$this->layout="default";
			$this->render('index');
    }
	
	function data(){
        $produits = new Produit();
        $produits = Doctrine_Core::getTable('produit')->findAll();
        $produits = $produits->toArray();
        $data = array('data' =>$produits);
        $text = json_encode($data);
        echo $text;
        
    }
}
?>