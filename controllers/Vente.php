<?php
 
/**
 * @UserS('REQUIRED')
 */
class Vente extends Controller{
   
    function index(){ 
        $this->render('index');
    }

    function rechercher(){
        
        $nomProduit = $_POST['produit'];

        //$nomProduit = 's';
        if (strlen($nomProduit)>0)
        {
        $articles = new Article();
        $q = Doctrine_Query::create()->from('Article a');
        $q = $q->leftJoin('a.Produit p')->Where('p.Libelle LIKE ?',$nomProduit.'%');

        $q = $q->AndWhere('a.Panier = 0');

        $q = $q->orderBy('p.Libelle ASC');

        $articles = $q->execute();
        
        $d['view'] = array("titre" => "","articles" => $articles);
        $this->layout=false;
        $this->set($d); 
        $this->render('listeArticles');
        }
    }

    function rechercherClient(){
        
        $nomClient = $_POST['client'];

        //$nomProduit = 's';
        if (strlen($nomClient)>0)
        {
        $clients = new Client();
        $q = Doctrine_Query::create()->from('Client c');
        $q = $q->Where('c.Nom LIKE ?',$nomClient.'%');
        $q = $q->orderBy('c.Nom ASC');

        $clients = $q->execute();
        
        $d['view'] = array("clients" => $clients);
        $this->layout=false;
        $this->set($d); 
        $this->render('listeClients');
        }
    }



    function afficherPanier(){
        
        $this->layout=false;
        $this->render('listePanier');
    }

    function afficherRecap(){
        $totalHT=0;
        $totalTTC=0;
        foreach ($_SESSION['panier'] as $article) {
            $totalHT  += $article->Produit->Prix;
            $totalTTC += $article->Produit->Prix * ( 1 + ($article->Produit->Taxe->Taux/100));
        }

        $this->layout=false;
        $d['view'] = array("totalHT"=>$totalHT,"totalTTC"=>$totalTTC);
        $this->set($d); 
        $this->render('recap');
    }

    function creationPanier(){
	   //if (!isset($_SESSION['panier'])){
	      
          for ($i=0; $i < count($_SESSION['panier']) ; $i++) { 
              $_SESSION['panier'][$i]->Panier =0;
              $_SESSION['panier'][$i]->save();
          }
          
          //$_SESSION['panier']->save();
          
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
        	//$data = array();

            //$data['id'] = $article->id;
            //$data['Libelle'] = $article->Produit->Libelle;
	        //$data['Prix'] = $article->Produit->Prix;
	        //$data['Quantite'] = 1;
        	//$data = $article->toArray();
        	
            $verif=false;
            foreach ($_SESSION['panier'] as $courant) {
                if($courant->id == $article->id) $verif=true;
            }
            if(!$verif)
            {
                $article->Panier = 1;
                $article->save();
                $_SESSION['panier'][] = $article;
            }
         }
		 echo "success";
	}

    function ajouterClient($id){
        $client = new Client();
        $client = Doctrine_Core::getTable('Client')->findOneById($id);
        $erreur = "";
        if($client){
            $_SESSION['client'] = $client;
         }
         echo "success";
    }

    function afficherClient(){
        $this->layout=false;
        $this->render('clientSelected');
    }

    function viderClient(){
        $_SESSION['client']=null;
    }


    function supprimerArticle($id){
        $article = new Article();
        $article = Doctrine_Core::getTable('Article')->findOneById($id);
        $erreur = "";
        $temp = new Doctrine_Collection('Article');
        if($article){
            for ($i=0; $i < count($_SESSION['panier']) ; $i++) { 
                if($_SESSION['panier'][$i]->id != $article->id){
                    $temp[] = $_SESSION['panier'][$i];
                }
            }
            
            //foreach ($temp as $value) {
              //  echo $value->CodeBarre.'<br>';
            //}
            $article->Panier = 0;
            $article->save();
            //$_SESSION['panier']=array();
            $_SESSION['panier'] = $temp;
            //var_dump($temp);
         
         }

         echo "success";
    }	 
}
?>