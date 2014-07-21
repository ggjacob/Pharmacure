<?php
 

class Comptes extends Controller{

    /**
     * @Admin('REQUIRED')
     */
    function index(){

        $form['type'] ='create';
        $users = new User();
        $users = Doctrine_Core::getTable('User')->findAll();
        $d['view'] = array("titre" => "Gestion des Utilisateurs","users"=>$users,"form"=>$form);
        $this->set($d); 
        $this->render('index');
    }

    /**
     * @Admin('REQUIRED')
     */
    function infos($id){
        $user = new User();
        $user = Doctrine_Core::getTable('user')->find($id);
        $d['view'] = array("titre" => "Infos collaborateurs","user" => $user);
        $this->set($d); 
        $this->render('infos');
    }
    
    function data(){
        $comptes = new User();
        $comptes = Doctrine_Core::getTable('user')->findAll();
        $comptes = $comptes->toArray();
           $data = array('data' =>$comptes);
//        var_dump($data);
        $text = json_encode($data);
        echo $text;
//        $this->render('test');
        
    }

    /**
     * @Admin('REQUIRED')
     */
    function modification($id){
        
        $user = new User();
        $user = Doctrine_Core::getTable('user')->find($id);
        $form = array();
        $form['nom'] =$user->Nom;
        $form['prenom'] =$user->Prenom;
        $form['tel'] =$user->Tel;
        $form['mail'] =$user->Mail;
        $form['login'] =$user->Login;
        $form['typeU'] =$user->Type;
        $form['id'] =$id;
        $form['type'] ='update';    
        
        $d['view'] = array("titre" => "Mes Infos","form" => $form);
        $this->set($d); 
        $this->render('modification');
    }
	
    
	function connexion(){ 
        if(!isset($_POST['login'])){
            $d['view'] = array("erreur" => " ", "titre" => "Connexion");
            $this->set($d);
            $this->render('connexion');
        }
        else
        {
            $currentUser = new User();
            $currentUser = Doctrine_Core::getTable('user')->findOneByLoginAndPassword($this->data['login'],$this->data['password']);
            if($currentUser){
                $_SESSION['user'] = $currentUser;
                $this->alert("Vous êtes connecté.",2000);
                $this->redirect('',2);
            }else{
                $d['view'] = array("erreur" => "Identifiant et/ou mot de passe incorrect","login" => $this->data['login']);
                $this->set($d);
                $this->render('connexion');
            }
        }
    }


	/**
     * @Admin('REQUIRED')
     */
    function creation(){
        if(!isset($_POST['nom'])){
            
            $form['type'] ='create';

            $d['view'] = array("erreur" => " ", "titre" => "Inscription","form" => $form);
            $this->set($d);
            $this->render('inscription');
        }
        else
        {
            $form = array();
            $form['nom'] =$this->data['nom'];
            $form['prenom'] =$this->data['prenom'];
            $form['tel'] =$this->data['tel'];
            $form['mail'] =$this->data['mail'];
            $form['login'] =$this->data['login'];
            $form['typeU'] =$this->data['typeU'];

            $form['type'] =$this->data['type'];    
            
            if($form['type'] == "create")
            {
                $erreur="";
                $currentUser = new User();
                $currentUser = Doctrine_Core::getTable('user')->findOneByLogin($this->data['login']);

                if($currentUser) $erreur="existe";

                
                if(empty($erreur)){
                if($this->data['password'] != $this->data['confirm']) $erreur="password";
                }

                if(empty($erreur)) {
                    $user = new User();
                    $user->init($this->data['password'],$this->data['nom'],$this->data['prenom'],$this->data['mail'],$this->data['tel'],$this->data['login'],$this->data['typeU']);        
                    $user->save();    
                    $erreur="success"; 
                }
            }else{
                    $erreur = "";
                    $currentUser = new User();
                    $currentUser = Doctrine_Core::getTable('user')->findByLogin($this->data['login']);

                    if(count($currentUser)>1) $erreur="existe";

                    $user = new User();
                    $user = Doctrine_Core::getTable('user')->find($this->data['id']);
                    
                    if($this->data['password'] != $this->data['confirm']) $erreur="password";
                    
                    if(empty($erreur)) {
                        $user->init($this->data['password'],$this->data['nom'],$this->data['prenom'],$this->data['mail'],
                                    $this->data['tel'],$this->data['login'],$this->data['typeU']);        
                        $user->save();    
                       $erreur="success";
                    }
            }
        }
        echo $erreur;
    }
    /**
     * @UserS('REQUIRED')
     */
    function deconnexion(){
            session_destroy();
            $this->alert("Vous êtes deconnecté.",2000);
            $this->redirect('Comptes/connexion',2);   
    }

    /**
     * @Admin('REQUIRED')
     */
    function suppression($id){
        $user = new User();
        $user = Doctrine_Core::getTable('User')->findOneById($id);
        if(!$user->delete()) $this->redirect('Comptes/index',0);
        $erreur="success";
        echo $erreur;
         
    }
}

?>