<?php


use Phinx\Migration\AbstractMigration;

class ViewTagMigration extends AbstractMigration
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
        // $q = $this->execute('CREATE VIEW `view_tag` AS SELECT article_tag.`article_id`, tags.`slug`, tags.`name` FROM article_tag LEFT JOIN tags ON tags.id=article_tag.tag_id');
        $q = $this->execute('CREATE VIEW view_tag AS SELECT article_tag.article_id, tags.slug, tags.name FROM article_tag LEFT JOIN tags ON tags.id=article_tag.tag_id');
    }
}
