<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    function index($idcommande){
        $commande = new Commande();
        $commande = Doctrine_Core::getTable('commande')->find($id);
        $lignecommande = new LigneCommande();
        $lignecommande = Doctrine_Core::getTable('lignecommande')->findByIdCommande($id);
        
        $bordereau = Doctrine_Core::getTable('bordereau')->findOneByIdCommande($idcommande);
        if($bordereau == null){
            $bordereau = new Bordereau();
            $bordereau->init($idcommande);
            $bordereau->save();
        }
        $d['view'] = array("titre" => "Bordereau","bordereau"=>$bordereau);
        $this->set($d);
        $this->render('index');
        
    }

    
    
    function suppression($id){
        $lignebordereau = new LigneBordereau();
        $lignebordereau = Doctrine_Core::getTable('lignebordereau')->findByIdBordereau($id);
        foreach ($lignebordereau as $l){
            $l->delete();
        }
        $bordereau = new Bordereau();
        $bordereau = Doctrine_Core::getTable('bordereau')->findOneById($id);
        if(!$bordereau->delete()) $this->redirect('Bordereaux/index',0);
        $erreur="success";
        echo $erreur;
    }
    
        function suppressionligne($id){
        $lignebordereau = new LigneBordereau();
        $lignebordereau = Doctrine_Core::getTable('lignebordereau')->findOneById($id);
        if(!$lignebordereau->delete()) $this->redirect('Bordereaux/index',0);
        
    }