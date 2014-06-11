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
	
	function contact(){
        
        if(!isset($_POST['nom'])){
            
            
            
            $d['view'] = array("erreur" => " ", "titre" => "Nouvelle annonce",);
            $this->set($d);
            $this->render('contact');
        }
        else
        {
            $form['nom'] =$this->data['nom'];
            $form['mail'] =$this->data['nom'];
            $form['objet'] =$this->data['objet'];
            $form['message'] =$this->data['message'];

            
            $d['view'] = array("titre" => "Contact","form" => $form);
            $this->set($d);
            $this->render('contact');    
        }        
    }
}
?>