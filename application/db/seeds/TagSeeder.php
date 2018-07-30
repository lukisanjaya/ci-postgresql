<?php


use Phinx\Seed\AbstractSeed;
use Cocur\Slugify\Slugify;

class TagSeeder extends AbstractSeed
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
                'slug' => $slugify->slugify($title),
                'name' => $title,
            );
        }
        $tags = $this->table('tags');
        $tags->insert($data)->save();
        // empty the table
        // $tags->truncate();
    }
}
