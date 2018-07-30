<?php


use Phinx\Seed\AbstractSeed;

class ArticleCategorySeeder extends AbstractSeed
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
                'category_id' => rand(1, 100),
                'article_id'  => rand(1, 100),
            );
        }
        $article_category = $this->table('article_category');
        $article_category->insert($data)->save();
        // empty the table
        // $article_category->truncate();
    }
}
