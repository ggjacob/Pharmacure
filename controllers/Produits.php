<?php
 
class Produits extends Controller{


    /**
     * @UserS('REQUIRED')
     */
    function index(){
        $form['type'] ='create';    
        $produits = new Produit();
        $produits = Doctrine_Core::getTable('produit')->findAll();
        $taxes = new Taxe();
        $taxes = Doctrine_Core::getTable('taxe')->findAll();
        $classes = new Classe();
        $classes = Doctrine_Core::getTable('classe')->findAll();
        $d['view'] = array("titre" => "Gestion des produits","classes"=>$classes, "taxes"=>$taxes, "produits"=>$produits, "form" => $form );
        $this->set($d);
        $this->render('index');
    }
    
    function mesInfos($id){
        $produit = new Produit();
        $produit = Doctrine_Core::getTable('produit')->find($id);
        $form = Array();
        $form['libelle'] = $produit->Libelle;
        $form['prix'] = $produit->Prix;
        $form['ordonnance'] = $produit->Ordonnance;
        $form['commentaire'] = $produit->Commentaire;
        $form['conditionnement'] = $produit->Conditionnement;
        $form['idclasse'] = $produit->IdClasse;
        $form['idtaxe'] = $produit->IdTaxe;
        $form['type'] = 'update';
        $taxes = new Taxe();
        $taxes = Doctrine_Core::getTable('taxe')->findAll();
        $classes = new Classe();
        $classes = Doctrine_Core::getTable('classe')->findAll();
        
        $d['view'] = array("titre" => "Modification produit","form" => $form,"id" => $id, "classes"=>$classes, "taxes"=>$taxes);
        $this->set($d); 
        $this->render('modification');
    }
    
    function create(){
        $taxes = new Taxe();
        $taxes = Doctrine_Core::getTable('taxe')->findAll();
        $classes = new Classe();
        $classes = Doctrine_Core::getTable('classe')->findAll();
        if(!isset($_POST['libelle'])){
            
            $form['type'] ='create';

            $d['view'] = array("erreur" => " ", "titre" => "Création produit","form" => $form, "classes"=>$classes, "taxes"=>$taxes);
            $this->set($d);
            $this->render('creation');
        }
        else{
            $form = Array();
            $form['libelle'] = $this->data['libelle'];
            $form['prix'] = $this->data['prix'];
            $form['ordonnance'] = $this->data['ordonnance'];
            $form['commentaire'] = $this->data['commentaire'];
            $form['conditionnement'] = $this->data['conditionnement'];
            $form['idclasse'] = $this->data['idclasse'];
            $form['idtaxe'] = $this->data['idtaxe'];
            $form['type'] = $this->data['type'];
            
             if($form['type'] == "create"){
                 $currentProduit = new Produit;
                 $currentProduit = findOneByLibelle($this->data['libelle']);
                                 if($currentProduit) $this->setErreur('libelle','Ce produit existe déja');
                                 if(empty($this->erreur)) {
                                    $produit = new Produit();
                                    $produit->init($this->data['prix'],$this->data['ordonnance'],$this->data['commentaire'],$this->data['conditionnement'],$this->data['idtaxe'], $this->data['idclasse']);        
                                    $produit->save();    
                                    $this->alert("Produit crée avec succès.",2000);
                                    $this->redirect('Produit/index',0);
                                }
                                else
                                {
                                    $d['view'] = array("titre" => "Saisie incorrect","erreur" => $this->erreur,"form" => $form, "classes"=>$classes, "taxes"=>$taxes);
                                    $this->set($d);
                                    $this->render('creation');
                                }
             }
             else{
                 $currentProduit = new Produit();
                    $currentProduit = Doctrine_Core::getTable('produit')->find($this->data['id']);

            
                    if(empty($this->erreur)) {
                        $produit = new Produit();
                        $produit = Doctrine_Core::getTable('produit')->find($this->data['id']);                        
                        $produit->init($this->data['prix'],$this->data['ordonnance'],$this->data['commentaire'],$this->data['conditionnement'],$this->data['idtaxe'], $this->data['idclasse']);     
                        $produit->save();    
                        $this->alert("Produit modifié avec succès.",2000);
                        $this->redirect('Produits/index',2);
                    }
                    else
                    {
                        $d['view'] = array("titre" => "hhhh","erreur" => $this->erreur,"form" => $form, "classes"=>$classes, "taxes"=>$taxes);
                        $this->set($d);
                        $this->render('creation');
                    }
             }
                
        }
    }
    
    function delete($id){
        $produit = new Produit();
        $produit = Doctrine_Core::getTable('produit')->findOneById($id);
        if(!$produit->delete()) $this->redirect('Produits/index',0);
        $this->redirect('Produits/index',0);
    }
}
?>