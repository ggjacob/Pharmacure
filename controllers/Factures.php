<?php
 
class Factures extends Controller{


    /**
     * @UserS('REQUIRED')
     */
    function index(){
        $this->render('index'); 
    }

    function data(){
        
        $factures = new Facture();
        //$factures = Doctrine_Core::getTable('facture')->findAll();
        $q = Doctrine_Query::create()->from('Facture a');
        
        $q = $q->orderBy('a.Date DESC');

        $factures = $q->execute();
        
        for ($i=0; $i < $factures->count() ; $i++) { 
            $factures[$i]->IdClient =$factures[$i]->Client->Prenom.' '.$factures[$i]->Client->Nom ;
            if( strlen($factures[$i]->IdClient) <=2){
            	$factures[$i]->IdClient = "Sans informations client";
            	//die();
            } 
        }

        $factures = $factures->toArray(false);
         $data = array('data' =>$factures);
//        var_dump($data);
        $text = json_encode($data);
        echo $text;
//        $this->render('test');  
    }

   function infos($id){
   		$facture = new Facture();
        $facture = Doctrine_Core::getTable('facture')->find($id);
        $totalHT=0;
        $totalTTC=0;
        foreach ($facture->LigneFactureFacture as $ligne) {
            $totalHT  += $ligne->Article->Produit->Prix;
            $totalTTC += $ligne->Article->Produit->Prix * ( 1 + ($ligne->Article->Produit->Taxe->Taux/100));
        }
        $d['view'] = array("facture" => $facture,"totalHT"=>$totalHT,"totalTTC"=>$totalTTC);
        $this->set($d); 
        $this->render('infos');
   	}
}
?>