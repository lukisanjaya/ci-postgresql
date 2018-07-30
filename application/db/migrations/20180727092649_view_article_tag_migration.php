<?php


use Phinx\Migration\AbstractMigration;

class ViewArticleTagMigration extends AbstractMigration
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
        // $q = $this->execute('CREATE VIEW `view_article_tag`  AS  select `c`.`slug` AS `tag_slug`,`articles`.`id` AS `id`,`articles`.`slug` AS `slug`,`articles`.`title` AS `title`,`articles`.`desciption` AS `desciption`,`articles`.`content` AS `content`,`articles`.`thumbnail` AS `thumbnail`,`articles`.`source_id` AS `source_id`,`articles`.`status` AS `status`,`articles`.`created` AS `created`,`articles`.`updated` AS `updated`,`articles`.`published` AS `published`, `sources`.`name` AS `url_name`, `sources`.`url` AS  `url` from ((`tags` `c` left join `article_tag` `ac` on((`c`.`id` = `ac`.`tag_id`))) left join `articles` on((`articles`.`id` = `ac`.`article_id`)) left join `sources` on((`sources`.`id` = `articles`.`source_id`)))'); 
        $q = $this->execute('CREATE VIEW view_article_tag  AS  select c.slug AS tag_slug,articles.id AS id,articles.slug AS slug,articles.title AS title,articles.desciption AS desciption,articles.content AS content,articles.thumbnail AS thumbnail,articles.source_id AS source_id,articles.status AS status,articles.created AS created,articles.updated AS updated,articles.published AS published, sources.name AS url_name, sources.url AS  url from ((tags c left join article_tag ac on((c.id = ac.tag_id))) left join articles on((articles.id = ac.article_id)) left join sources on((sources.id = articles.source_id)))'); 
    }
}
