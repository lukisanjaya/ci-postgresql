<?php


use Phinx\Migration\AbstractMigration;

class ArticleMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    addCustomColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Any other destructive changes will result in an error when trying to
     * rollback the migration.
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        // create the table
        $table = $this->table('articles');
        $table->addColumn('source_id', 'integer')
              ->addColumn('slug', 'string')
              ->addColumn('title', 'string')
              ->addColumn('desciption', 'text')
              ->addColumn('content', 'text')
              ->addColumn('thumbnail', 'string')
              ->addColumn('status', 'boolean')
              ->addColumn('created', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
              ->addColumn('updated', 'datetime', ['null' => true])
              ->addColumn('published', 'datetime', ['null' => true])
              ->addIndex(['slug'], ['unique' => true])
              ->create();
    }
}
