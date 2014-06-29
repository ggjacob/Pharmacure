<?php
 
class Fournisseurs extends Controller{


    /**
     * @UserS('REQUIRED')
     */
    function index(){
        $Fournisseurs = new Fournisseur();
        $Fournisseurs = Doctrine_Core::getTable('Fournisseur')->findAll();
        $form['type'] ='create';
        $d['view'] = array("titre" => "Gestion des Fournisseurs","form" => $form,"fournisseurs" =>$Fournisseurs);
        $this->set($d); 
        $this->render('index');
    }


    /**
     * @UserS('REQUIRED')
     */
    function infos($id){
        
        $fournisseur = new Client();
        $fournisseur = Doctrine_Core::getTable('Fournisseur')->find($id);
        $d['view'] = array("titre" => "Modification fournisseur","fournisseur" => $fournisseur);
        $this->set($d); 
        $this->render('infos');
    }


    /**
     * @UserS('REQUIRED')
     */
    function modification($id){
        
        $fournisseur = new Client();
        $fournisseur = Doctrine_Core::getTable('Fournisseur')->find($id);
        $form = array();
        $form['adresse'] =$fournisseur->Adresse;
        $form['prenom'] =$fournisseur->Libelle;
        $form['tel'] =$fournisseur->Tel;
        $form['mail'] =$fournisseur->Mail;
        $form['commentaire'] =$fournisseur->Commentaire;
        $form['type'] ='update';    
        
        $d['view'] = array("titre" => "Modification client","form" => $form,"id" => $id);
        $this->set($d); 
        $this->render('modification');
    }

    /**
     * @UserS('REQUIRED')
     */
    function delete($id){
        $fournisseur = new Fournisseur();
        $fournisseur = Doctrine_Core::getTable('Fournisseur')->findOneById($id);
        if(!$fournisseur->delete()) $this->redirect('Fournisseurs/index',0);
        //$this->alert("Client supprimé",2000);
        $this->redirect('Fournisseurs/index',0);
    }
}
?>