<?php

/**
 * BaseArticle
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $CodeBarre
 * @property date $DateExpiration
 * @property integer $IdProduit
 * @property date $DateVente
 * @property string $Commentaire
 * @property Produit $Produit
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseArticle extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('Article');
        $this->hasColumn('CodeBarre', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('DateExpiration', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('IdProduit', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('DateVente', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('Commentaire', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Produit', array(
             'local' => 'IdProduit',
             'foreign' => 'id'));

        $searchable0 = new Doctrine_Template_Searchable(array(
             'fields' => 
             array(
              0 => 'id',
              1 => 'CodeBarre',
             ),
             ));
        $timestampable0 = new Doctrine_Template_Timestampable(array(
             'created' => 
             array(
              'name' => 'DateAjout',
             ),
             'updated' => 
             array(
              'name' => 'DateModif',
             ),
             ));
        $this->actAs($searchable0);
        $this->actAs($timestampable0);
    }
}