<?php

use Phinx\Migration\AbstractMigration;

class MyFirstMigration extends AbstractMigration {

    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     */
    public function change() {
        $table = $this->table('news');
        $table->addColumn('titre', 'string', array('limit' => 100))
            ->addColumn('text', 'text')
            ->addTimestamps()
            ->create();
    }

}
