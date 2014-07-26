<?php
 
class Commandes extends Controller{


    /**
     * @UserS('REQUIRED')
     */
    function index(){
        $form['type'] ='create';
        $fournisseurs = new Fournisseur();
        $fournisseurs = Doctrine_Core::getTable('fournisseur')->findAll();
        $d['view'] = array("titre" => "Gestion des fournisseurs","fournisseurs"=>$fournisseurs,"form" => $form);
        $this->set($d);
        $this->render('index');
    }

    function data(){
        $commandes = new Commande();
        $commandes = Doctrine_Core::getTable('commande')->findAll();
        
        for ($i=0; $i < $commandes->count() ; $i++) { 
            $commandes[$i]->IdFournisseur =$commandes[$i]->Fournisseur->Libelle;
            $commandes[$i]->IdEtat =$commandes[$i]->Etat->Libelle;
        }
        $commandes = $commandes->toArray(false);
        $data = array('data' =>$commandes);
//        var_dump($data);
        $text = json_encode($data);
        echo $text;
    }
    
    function listeProduit($id){
        $produits = new Produit();
        
        $produits = $q->fetchArray();
        $liste = array('id'=>$produits->identifier(), 'libelle'=>$produits->Libelle );
        echo '<option value="">Please select...</option>';
        foreach ($liste as $l){
            echo'<option value="'.$l['id'].'">'.$l['libelle'].'</option>';
        }
    }
    
    function creation(){
        if(!isset($_POST['idfournisseur'])){ 
            $form['type'] ='create';
            $d['view'] = array("erreur" => " ", "titre" => "Création commande","form" => $form);
            $this->set($d);
            $this->render('creation');
        }
        else
        {
            $erreur="";
            $form = array();
            $form['id'] =$this->data['idfournisseur'];

            $form['type'] =$this->data['type'];    
            
            if($form['type'] == "create")
            {
                    $commande = new Commande();
                    $commande->init($this->data['idfournisseur']);        
                    $commande->save();    
                    $erreur="success";                    
            }
            else{
                    $erreur="";
                    $currentClient = new Commande();
                    $currentClient = Doctrine_Core::getTable('commande')->find($this->data['id']);
                    if(!$currentClient) $erreur="failed";
                    if(empty($erreur)) {
                        $currentClient->init2($this->data['idetat']);        
                        $currentClient->save();
                        $erreur="success";    
                    }
            }
        }
        echo $erreur;
    }
}
?>