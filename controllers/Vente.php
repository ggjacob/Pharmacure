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



    function afficherPanier(){
        //var_dump($_SESSION['panier']);
        $data = array('data' =>$_SESSION['panier']);
        $text = json_encode($data);
        echo $text;
    }

    function creationPanier(){
	   //if (!isset($_SESSION['panier'])){
	      $_SESSION['panier']=array();
	      //$_SESSION['panier']['Libelle'] = array();
	      //$_SESSION['panier']['id'] = array();
	      //$_SESSION['panier']['Quantite'] = array();
	      //$_SESSION['panier']['Prix'] = array();
	      //$_SESSION['panier']['verrou'] = false;
	   //}
	   return true;
	}

    function ajouter($id){
        $article = new Article();
        $article = Doctrine_Core::getTable('Article')->findOneById($id);
        $erreur = "";
        if($article){
        	$data = array();

            $data['id'] = $article->id;
            $data['Libelle'] = $article->Produit->Libelle;
	        $data['Prix'] = $article->Produit->Prix;
	        $data['Quantite'] = 1;
        	//$data = $article->toArray();
        	$_SESSION['panier'][] = $data;
		 }
		 echo "success";
	}	 
}
?>