<?php

/**
 * BaseLigneCommande
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $IdCommande
 * @property integer $IdProduit
 * @property integer $Quantite
 * @property Commande $Commande
 * @property Produit $Produit
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseLigneCommande extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('LigneCommande');
        $this->hasColumn('IdCommande', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('IdProduit', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('Quantite', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Commande', array(
             'local' => 'IdCommande',
             'foreign' => 'id'));

        $this->hasOne('Produit', array(
             'local' => 'IdProduit',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             'created' => 
             array(
              'name' => 'Date',
             ),
             'updated' => 
             array(
              'name' => 'DateModif',
             ),
             ));
        $this->actAs($timestampable0);
    }
}