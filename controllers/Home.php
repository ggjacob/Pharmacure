<?php
 
class Home extends Controller{

	/**
     * @UserS('REQUIRED')
     */
    function index(){
			$d['view'] = array("titre" => "Pharmacure",
        	"descp" => "vous êtes sur la page d'accueil");
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