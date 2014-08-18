<?php

/**
 * BaseProduit
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $Libelle
 * @property float $PrixAT
 * @property float $Prix
 * @property boolean $Ordonnance
 * @property string $Commentaire
 * @property integer $Alerte
 * @property string $Conditionnement
 * @property integer $IdClasse
 * @property integer $IdTaxe
 * @property Classe $Classe
 * @property Taxe $Taxe
 * @property Doctrine_Collection $ArticleProduits
 * @property Doctrine_Collection $LigneCommandeProduit
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseProduit extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('Produit');
        $this->hasColumn('Libelle', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('PrixAT', 'float', null, array(
             'type' => 'float',
             ));
        $this->hasColumn('Prix', 'float', null, array(
             'type' => 'float',
             ));
        $this->hasColumn('Ordonnance', 'boolean', null, array(
             'type' => 'boolean',
             ));
        $this->hasColumn('Commentaire', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('Alerte', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('Conditionnement', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('IdClasse', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('IdTaxe', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Classe', array(
             'local' => 'IdClasse',
             'foreign' => 'id'));

        $this->hasOne('Taxe', array(
             'local' => 'IdTaxe',
             'foreign' => 'id'));

        $this->hasMany('Article as ArticleProduits', array(
             'local' => 'id',
             'foreign' => 'IdProduit'));

        $this->hasMany('LigneCommande as LigneCommandeProduit', array(
             'local' => 'id',
             'foreign' => 'IdProduit'));

        $searchable0 = new Doctrine_Template_Searchable(array(
             'fields' => 
             array(
              0 => 'id',
              1 => 'Libelle',
              2 => 'Conditionnement',
             ),
             ));
        $this->actAs($searchable0);
    }
}