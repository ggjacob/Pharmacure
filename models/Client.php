<?php

/**
 * Client
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Client extends BaseClient
{
	public function init($nom,$prenom,$mail,$tel,$commentaire){
        $this->Nom =$nom;
        $this->Prenom =$prenom;
        $this->Mail =$mail;
        $this->Tel =$tel;
        $this->Commentaire =$commentaire;
   }

}
?>