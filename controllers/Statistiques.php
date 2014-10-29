
<?php
 
class Statistiques extends Controller{


    /**
     * @UserS('REQUIRED')
     */
    function index(){

    
    $articles = new Article();
    $q = Doctrine_Query::create()->select("sum(p.prix) as CA,count(a.id) as vente,sum(p.prix-p.PrixAT) as marge")->from('Article a');
    $q = $q->leftJoin('a.Produit p');
    $q = $q->AndWhere('a.DateVente = DATE(NOW()');

    $req = $q->execute();

    //echo $q->getSqlQuery();
    
    $articles = new Article();
    $q = Doctrine_Query::create()->select("sum(p.prix) as valeur,count(a.id) as stock")->from('Article a');
    $q = $q->leftJoin('a.Produit p');
    $q = $q->AndWhere('a.DateVente is null');
    $q = $q->AndWhere('a.DateExpiration <= DATE(NOW()');
    $req2 = $q->execute();
    if ($req->toArray()[0]['CA'] == null) {
        $today = array("CA"=> 0,"vente"=>$req->toArray()[0]['vente'],"marge"=>0,"valeurStock"=>$req2->toArray()[0]['valeur'],"nbArticleStock"=>$req2->toArray()[0]['stock']);
    }else $today = array("CA"=> $req->toArray()[0]['CA'],"vente"=>$req->toArray()[0]['vente'],"marge"=>$req->toArray()[0]['marge'],"valeurStock"=>$req2->toArray()[0]['valeur'],"nbArticleStock"=>$req2->toArray()[0]['stock']);
    // code for since category
    $q = Doctrine_Query::create()->select("sum(p.prix) as CA,count(a.id) as vente,sum(p.prix-p.PrixAT) as marge")->from('Article a');
    $q = $q->leftJoin('a.Produit p');
    $q = $q->AndWhere('a.DateVente is not null');
    $req = $q->execute();
    $since = array("CA"=> $req->toArray()[0]['CA'],"vente"=>$req->toArray()[0]['vente']);
    if ($req->toArray()[0]['CA'] == null) {
        $since = array("CA"=> 0,"vente"=>$req->toArray()[0]['vente'],"marge"=>0);
    }else $since = array("CA"=> $req->toArray()[0]['CA'],"vente"=>$req->toArray()[0]['vente'],"marge"=>$req->toArray()[0]['marge']);
    $d['view'] = array("since" => $since,"today" => $today);
    $this->set($d); 
    $this->render('index');
    }
}
?>