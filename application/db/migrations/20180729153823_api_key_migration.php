<?php


use Phinx\Migration\AbstractMigration;

class ApiKeyMigration extends AbstractMigration
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
        $table = $this->table('api_keys');
        $table->addColumn('key', 'string')
              ->addColumn('level', 'integer')
              ->addColumn('ignore_limits', 'string')
              ->addColumn('published', 'datetime', ['null' => true])
              ->addIndex(['key'], ['unique' => true])
              ->create();
        $date = date('Y-m-d H:i:s');
        $q = $this->execute("INSERT INTO api_keys VALUES ('1', 'key', '1', '8888888', '$date')");
    }
}
