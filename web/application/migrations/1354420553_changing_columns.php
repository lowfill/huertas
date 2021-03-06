<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ChangingColumns extends Doctrine_Migration_Base
{
    public function up()
    {
      $this->removeColumn('cultivo','cantidad_de_semillas_para_10m');
      $this->addColumn('cultivo','pais','string');
    }

    public function down()
    {
      $this->addColumn('cultivo','cantidad_de_semillas_para_10m','integer');
      $this->removeColumn('cultivo','pais');
    }
}