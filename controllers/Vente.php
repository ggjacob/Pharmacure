<?php
 
/**
 * @UserS('REQUIRED')
 */
class Vente extends Controller{
   
    function index(){
        
        $d['view'] = array("titre" => "");
        $this->set($d); 
        $this->render('index');
    }



    function rechercher(){
        
        $nomProduit = $_POST['produit'];

        if (strlen($nomProduit)>0)
        {
        $articles = new Article();
        $q = Doctrine_Query::create()->from('Article a');
        $q = $q->leftJoin('a.Produit p')->Where('p.Libelle LIKE ?',$nomProduit.'%');
        $articles = $q->execute();
        //var_dump($articles);
        $d['view'] = array("titre" => "","articles" => $articles);
        $this->set($d); 
        $this->render('listeArticles');
        }
    }

    function ajouter($id){
        
    }
}
?>