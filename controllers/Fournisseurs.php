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
        
        $fournisseur = new Fournisseur();
        $fournisseur = Doctrine_Core::getTable('Fournisseur')->find($id);
        $d['view'] = array("titre" => "Modification fournisseur","fournisseur" => $fournisseur);
        $this->set($d); 
        $this->render('infos');
    }

    function data(){
        $fournisseurs = new Fournisseur();
        $fournisseurs = Doctrine_Core::getTable('fournisseur')->findAll();
        $fournisseurs = $fournisseurs->toArray();
        $data = array('data' =>$fournisseurs);
        $text = json_encode($data);
        echo $text;
        
    }

    /**
     * @UserS('REQUIRED')
     */
    function modification($id){
        
        $fournisseur = new Fournisseur();
        $fournisseur = Doctrine_Core::getTable('Fournisseur')->find($id);
        $form = array();
        $form['adresse'] =$fournisseur->Adresse;
        $form['libelle'] =$fournisseur->Libelle;
        $form['tel'] =$fournisseur->Tel;
        $form['mail'] =$fournisseur->Mail;
        $form['commentaire'] =$fournisseur->Commentaire;
        $form['type'] ='update';    
        
        $d['view'] = array("titre" => "Modification fournisseur","form" => $form,"id" => $id);
        $this->set($d); 
        $this->render('modification');
    }
    
        function creation(){
            $erreur="";
        if(!isset($_POST['libelle'])){
            
            $form['type'] ='create';

            $d['view'] = array("erreur" => " ", "titre" => "Création Fournisseur","form" => $form);
            $this->set($d);
            $this->render('creation');
        }
        else
        {
            
            $form = array();
            $form['libelle'] =$this->data['libelle'];
            $form['adresse'] =$this->data['adresse'];
            $form['tel'] =$this->data['tel'];
            $form['mail'] =$this->data['mail'];
            $form['commentaire'] =$this->data['commentaire'];

            $form['type'] =$this->data['type'];    
            
            if($form['type'] == "create")
            {
                    $fournisseur = new Fournisseur();
                    $fournisseur->init($this->data['libelle'],$this->data['adresse'],$this->data['tel'], $this->data['mail'],$this->data['commentaire']);        
                    $fournisseur->save();    
                    $erreur="success";                    
            }
            else{
                    $currentFournisseur = new Fournisseur();
                    $currentFournisseur = Doctrine_Core::getTable('fournisseur')->find($this->data['id']);
                    if(!$currentFournisseur) {
                        
                        $erreur = "failed";
                    }
            
                    if(empty($erreur)) {                       
                        $currentFournisseur->init($this->data['libelle'],$this->data['adresse'], $this->data['tel'], $this->data['mail'],
                                    $this->data['commentaire']);        
                        $currentFournisseur->save();
                        $erreur="success";
                        
                    }
                    
            }

        }
        echo $erreur;
    }

    /**
     * @UserS('REQUIRED')
     */
    function suppression($id){
        $fournisseur = new Fournisseur();
        $fournisseur = Doctrine_Core::getTable('Fournisseur')->findOneById($id);
        if(!$fournisseur->delete()) $this->redirect('Fournisseurs/index',0);
        $erreur="success";
        echo $erreur;
    }
    
    
}
?>