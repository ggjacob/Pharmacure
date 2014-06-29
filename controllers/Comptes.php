<?php
 
/**
 * @Admin('REQUIRED')
 */
class Comptes extends Controller{

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
        $user = Doctrine_Core::getTable('User')->find($id);
        $d['view'] = array("titre" => "Infos collaborateurs","user" => $user);
        $this->set($d); 
        $this->render('infos');
    }

    function mesInfos($id){
        
        $user = new User();
        $user = Doctrine_Core::getTable('user')->find($id);
        $form = array();
        $form['nom'] =$user->Nom;
        $form['prenom'] =$user->Prenom;
        $form['tel'] =$user->Tel;
        $form['mail'] =$user->Mail;
        $form['login'] =$user->Login;
        $form['typeU'] =$user->Type;
        $form['type'] ='update';    
        
        $d['view'] = array("titre" => "Mes Infos","form" => $form);
        $this->set($d); 
        $this->render('inscription');
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
    function inscription(){
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
                $currentUser = new User();
                $currentUser = Doctrine_Core::getTable('user')->findOneByLogin($this->data['login']);

                if($currentUser) $this->setErreur('login','Ce Identifiant existe déjà');

                
                if($this->data['password'] != $this->data['confirm']) $this->setErreur('password','Les mots de passe ne correspondent pas');
                

                if(empty($this->erreur)) {
                    $user = new User();
                    $user->init($this->data['password'],$this->data['nom'],$this->data['prenom'],$this->data['mail'],$this->data['tel'],$this->data['login'],$this->data['typeU']);        
                    $user->save();    
                    $this->alert("Votre compte a été crée. Vous pouvez l'utiliser dès à présent.",2000);
                    $this->redirect('',2);
                }
                else
                {
                    $d['view'] = array("erreur" => $this->erreur,"form" => $form);
                    $this->set($d);
                    $this->render('inscription');
                }
            }else{
                    $currentUser = new User();
                    $currentUser = Doctrine_Core::getTable('user')->findByLogin($this->data['login']);

                    if(count($currentUser)>1) $this->setErreur('login','Ce Identifiant existe déjà');

                    $user = new User();
                    $user = Doctrine_Core::getTable('user')->find($_SESSION['user']->id);
                    
                    if($user->password != $this->data['oldPassword']) $this->setErreur('oldpassword','Mot de pas incorrect');
                    if($this->data['password'] != $this->data['confirm']) $this->setErreur('password','Les mots de passe ne correspondent pas');
                    

                    if(empty($this->erreur)) {
                        $user->init($this->data['password'],$this->data['nom'],$this->data['prenom'],$this->data['mail'],
                                    $this->data['tel'],$this->data['login'],$this->data['typeU']);        
                        $user->save();    
                        $this->alert("Votre compte a été modifié.",2000);
                        $this->redirect('',2);
                    }
                    else
                    {
                        $d['view'] = array("erreur" => $this->erreur,"form" => $form);
                        $this->set($d);
                        $this->render('inscription');
                    }
            }
        }
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
        //$this->alert("Client supprimé",2000);
        $this->redirect('Comptes/index',0);  
    }
}

?>