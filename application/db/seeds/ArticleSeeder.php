<?php


use Phinx\Seed\AbstractSeed;
use Cocur\Slugify\Slugify;

class ArticleSeeder extends AbstractSeed
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
        $faker = Faker\Factory::create();
        $slugify = new Slugify();
        $data = [];
        for ($i = 0; $i < 100; $i++) {
            $title = $faker->sentence($nbWords = 6, $variableNbWords = true);
            $data[] = array(
                'slug'       => $slugify->slugify($title),
                'title'      => $title,
                'desciption' => $faker->text($maxNbChars = 100),
                'content'    => $faker->text($maxNbChars = 200),
                'thumbnail'  => "http://lorempixel.com/640/480/sports/" .($i+1),
                'source_id'  => rand(1, 10),
                'status'     => rand(0, 1),
                'created'    => date('Y-m-d H:i:s'),
                'updated'    => $faker->dateTimeThisCentury->format('Y-m-d H:i:s'),
                'published'  => $faker->dateTimeThisCentury->format('Y-m-d H:i:s'),
            );
        }
        $articles = $this->table('articles');
        $articles->insert($data)->save();
        // empty the table
        // $articles->truncate();
    }
}
