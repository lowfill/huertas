<?php

/**
 * BaseCultivoAntagonico
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $cultivo_id
 * @property integer $enemigo_id
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCultivoAntagonico extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('cultivo_antagonico');
        $this->hasColumn('cultivo_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));
        $this->hasColumn('enemigo_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}