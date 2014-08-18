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
    
    function listeProduit(){
        $produits = new Produit();
        $produits = Doctrine_Core::getTable('produit')->findAll();
        echo '<tr>
                    <td width="42px" align="left">Produit</td>
                    <td align="center">
                    <input type="hidden" name="checkproduit[]" value="0">
                    <select classe="idproduit" style="width:90px; text-overflow: ellipsis;" name="idproduit[]">
                    <option value="">Select...</option>';
        foreach ($produits as $l){
            echo'<option value="'.$l->id.'">'.$l->Libelle.'</option>';
        }
        echo '</select>
                </td>
                <td width="42px" align="left">Quantité</td>   
                <td align="center"><input width="40px" classe="quantite" type="number" name="quantite[]"  placeholder="Quantité"></td>
                <td align="center" onclick="deletenewline(this)"><input width="40px" type="button" name="deletenewline" value="Supprimer"/></td>
                </tr>';
    }
    
    function modification($id){
        $etat = new Etat();
        $etat = Doctrine_Core::getTable('etat')->findAll();
        $produit = new Produit();
        $produit = Doctrine_Core::getTable('produit')->findAll();
        $commande = new Commande();
        $commande = Doctrine_Core::getTable('commande')->find($id);
        $lignecommande = new LigneCommande();
        $lignecommande = Doctrine_Core::getTable('lignecommande')->findByIdCommande($id);
        $form = Array();
        $form['idetat']=$commande->IdEtat;
        $form['type'] ='update';    
        $d['view'] = array("titre" => "Modification commande", "form" => $form, "id" => $id, "etat" =>$etat, "produit" =>$produit, "lignecommande" => $lignecommande);
        $this->set($d); 
        $this->render('modification');
    }
    
    
    /**
     * @UserS('REQUIRED')
     */
    function creation(){
        $erreur="";
        if (isset($_POST['type'])){
            $form['type'] = $this->data['type'];
        
            if($form['type'] == "create")
                {
                        $commande = new Commande();
                        $commande->init($this->data['idfournisseur']);        
                        $commande->save();    
                        $erreur="success";                    
                }
        
            else{
                    
                    $currentCommande = new Commande();
                    $currentCommande = Doctrine_Core::getTable('commande')->find($this->data['id']);
                    if(!$currentCommande) $erreur="failed";
                    if(empty($erreur)) {
                        $produitList = $this->data['idproduit'];
                        $quantiteList = $this->data['quantite'];
                        $checkList = $this->data['checkproduit'];
                        foreach ($produitList as $key => $p) {
                            //Si la ligne existe on la modifie
                            if($checkList[$key] != 0){
                                $lignecommande = new LigneCommande();
                                $lignecommande = Doctrine_Core::getTable('lignecommande')->findOneById($checkList[$key]);
                                $lignecommande->init2($p, $quantiteList[$key]);
                                $lignecommande->save();    
                            }
                            // Si la ligne n'existe pas on créer une nouvelle ligne
                            else if($checkList[$key] == 0){
                                 //Il faut instancier un nouvel objet pour chaque ligne
                                $lignecommande = new LigneCommande();
                                $lignecommande->init($this->data['id'], $p, $quantiteList[$key]);
                                $lignecommande->save();
                            }
                        }
                        $currentCommande->init2($this->data['idetat']);        
                        $currentCommande->save();
                        $erreur="success";    
                    }
                 }
        
            echo $erreur;
        }
    }
    
    
    /**
     * @UserS('REQUIRED')
     */
    function suppression($id){
        $lignecommande = new LigneCommande();
        $lignecommande = Doctrine_Core::getTable('lignecommande')->findByIdCommande($id);
        foreach ($lignecommande as $l){
            $l->delete();
        }
        $commande = new Commande();
        $commande = Doctrine_Core::getTable('commande')->findOneById($id);
        if(!$commande->delete()) $this->redirect('Commandes/index',0);
        $erreur="success";
        echo $erreur;
    }
    
    function suppressionligne($id){
        $lignecommande = new LigneCommande();
        $lignecommande = Doctrine_Core::getTable('lignecommande')->findOneById($id);
        if(!$lignecommande->delete()) $this->redirect('Commandes/index',0);
    }

  
    function indexBordereau($idcommande){
        $commande = new Commande();
        $commande = Doctrine_Core::getTable('commande')->find($idcommande);
        $produit = new Produit();
        $produit = Doctrine_Core::getTable('produit')->findAll();
        $lignecommande = new LigneCommande();
        $lignecommande = Doctrine_Core::getTable('lignecommande')->findByIdCommande($idcommande);
        
        $bordereau = Doctrine_Core::getTable('bordereau')->findOneByIdCommande($idcommande);
        if($bordereau == null){
            $bordereau = new Bordereau();
            $bordereau->init($idcommande);
            $bordereau->save();
        }
        else {
            $lignebordereau = new LigneBordereau();
            $lignebordereau = Doctrine_Core::getTable('lignebordereau')->findByIdBordereau($bordereau->_index()); 
        }
        if (isset($lignebordereau)) {
        $d['view'] = array("titre" => "Bordereau", "bordereau" => $bordereau, "lignebordereau" => $lignebordereau);
        } 
        else{
        $d['view'] = array("titre" => "Bordereau", "bordereau" => $bordereau);
        }
    $this->set($d);
    $this->render('indexBordereau');
        
    }

    
    
    function suppressionBordereau($id){
        $lignebordereau = new LigneBordereau();
        $lignebordereau = Doctrine_Core::getTable('lignebordereau')->findByIdBordereau($bordereau);
        foreach ($lignebordereau as $l){
            $l->delete();
        }
        $bordereau = new Bordereau();
        $bordereau = Doctrine_Core::getTable('bordereau')->findOneById($id);
        if(!$bordereau->delete()) $this->redirect('Bordereaux/index',0);
        $erreur="success";
        echo $erreur;
    }
    
        function suppressionligneBordereau($id){
        $lignebordereau = new LigneBordereau();
        $lignebordereau = Doctrine_Core::getTable('lignebordereau')->findOneById($id);
        if(!$lignebordereau->delete()) $this->redirect('Bordereaux/index',0);
        
    }
    
}