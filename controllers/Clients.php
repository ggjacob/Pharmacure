<?php
 
class Clients extends Controller{


    /**
     * @UserS('REQUIRED')
     */
    function index(){
        $form['type'] ='create';
        $clients = new Client();
        $clients = Doctrine_Core::getTable('client')->findAll();
        $d['view'] = array("titre" => "Gestion des clients","clients"=>$clients,"form" => $form);
        $this->set($d);
        $this->render('index');
    }


    /**
     * @UserS('REQUIRED')
     */
    function infos($id){
        
        $client = new Client();
        $client = Doctrine_Core::getTable('Client')->find($id);
        $d['view'] = array("titre" => "Modification produit","client" => $client);
        $this->set($d); 
        $this->render('infos');
    }

    function data(){
        $clients = new Client();
        $clients = Doctrine_Core::getTable('client')->findAll();
        $clients = $clients->toArray();
           $data = array('data' =>$clients);
//        var_dump($data);
        $text = json_encode($data);
        echo $text;
//        $this->render('test');
        
    }
    /**
     * @UserS('REQUIRED')
     */
    function modification($id){
        
        $client = new Client();
        $client = Doctrine_Core::getTable('client')->find($id);
        $form = array();
        $form['nom'] =$client->Nom;
        $form['prenom'] =$client->Prenom;
        $form['tel'] =$client->Tel;
        $form['mail'] =$client->Mail;
        $form['commentaire'] =$client->Commentaire;
        $form['type'] ='update';    
        
        $d['view'] = array("titre" => "Modification client","form" => $form,"id" => $id);
        $this->set($d); 
        $this->render('modification');
    }
	
    

    function creation(){
        if(!isset($_POST['nom'])){
            
            $form['type'] ='create';

            $d['view'] = array("erreur" => " ", "titre" => "Création client","form" => $form);
            $this->set($d);
            $this->render('creation');
        }
        else
        {
            $erreur="";
            $form = array();
            $form['nom'] =$this->data['nom'];
            $form['prenom'] =$this->data['prenom'];
            $form['tel'] =$this->data['tel'];
            $form['mail'] =$this->data['mail'];
            $form['commentaire'] =$this->data['commentaire'];

            $form['type'] =$this->data['type'];    
            
            if($form['type'] == "create")
            {
                    $client = new Client();
                    $client->init($this->data['nom'],$this->data['prenom'],$this->data['mail'],$this->data['tel'],$this->data['commentaire']);        
                    $client->save();    
                    $erreur="success";                    
            }
            else{
                    $erreur="";
                    $currentClient = new Client();
                    $currentClient = Doctrine_Core::getTable('client')->find($this->data['id']);
                    if(!$currentClient) $erreur="failed";
                    if(empty($erreur)) {
                        $currentClient->init($this->data['nom'],$this->data['prenom'],$this->data['mail'],
                                    $this->data['tel'],$this->data['commentaire']);        
                        $currentClient->save();
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
        $client = new Client();
        $client = Doctrine_Core::getTable('client')->findOneById($id);
        if(!$client->delete()) $this->redirect('Clients/index',0);
        $erreur="success";
        echo $erreur;
    }
}
?>