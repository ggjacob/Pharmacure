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
    
    function modification($id){
        $etat = new Etat();
        $etat = Doctrine_Core::getTable('etat')->findAll();
        $produit = new Produit();
        $produit = Doctrine_Core::getTable('produit')->findAll();
        $commande = new Commande();
        $commande = Doctrine_Core::getTable('commande')->find($id);
        //var_dump($commande);
        $form = array();
        $form['idetat']=$commande->IdEtat;
        $form['type'] ='update';    
        $d['view'] = array("titre" => "Modification commande","form" => $form,"id" => $id, "etat" =>$etat, "produit" =>$produit);
        $this->set($d); 
        $this->render('modification');
    }
    
    function creation(){
        $form['type'] = $_POST['type'];
            if($form['type'] == "create")
            {
                    $commande = new Commande();
                    $commande->init($this->data['idfournisseur']);        
                    $commande->save();    
                    $erreur="success";                    
            }
            else{
                    $erreur="";
                    $currentCommande = new Commande();
                    $currentCommande = Doctrine_Core::getTable('commande')->find($this->data['id']);
                    
                    if(!$currentCommande) $erreur="failed";
                    if(empty($erreur)) {
                        $produitList = $this->data['idproduit'];
                        $quantiteList = $this->data['quantite'];
                        $lignecommande = new LigneCommande();
                        foreach ($produitList as $key => $p) {
                            $lignecommande->init($this->data['id'], $p, $lignecommande[$key]);
                            $lignecommande->save();
                        }
                        $currentCommande->init2($this->data['idetat']);        
                        $currentCommande->save();
                        $erreur="success";    
                    }
            }
        
        echo $erreur;
    }
}
?>