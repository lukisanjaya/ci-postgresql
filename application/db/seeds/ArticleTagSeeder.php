<?php


use Phinx\Seed\AbstractSeed;

class ArticleTagSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $data = [];
        for ($i = 0; $i < 100; $i++) {
            $data[] = array(
                'tag_id'     => rand(1, 100),
                'article_id' => rand(1, 100),
            );
        }
        $article_tag = $this->table('article_tag');
        $article_tag->insert($data)->save();
        // empty the table
        // $article_tag->truncate();
    }
}
