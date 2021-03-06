<?php

/**
 * BaseEtat
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $Libelle
 * @property Doctrine_Collection $CommandeEtat
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseEtat extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('Etat');
        $this->hasColumn('Libelle', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Commande as CommandeEtat', array(
             'local' => 'id',
             'foreign' => 'IdEtat'));
    }
}