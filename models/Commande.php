<?php

/**
 * Commande
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Commande extends BaseCommande
{
    public function init($idfournisseur){
        $this->IdFournisseur =$idfournisseur;
        $this->IdEtat =2;
        $this->IdUser = $_SESSION['user']->id;
        $this->IdUserModif = $_SESSION['user']->id;
   }
   
   public function init2($idetat){
        $this->IdEtat = $idetat;
        $this->IdUserModif = $_SESSION['user']->id;
   }
}