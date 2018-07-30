<?php


use Phinx\Seed\AbstractSeed;
use Cocur\Slugify\Slugify;

class SourceSeeder extends AbstractSeed
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
        for ($i = 0; $i < 10; $i++) {
            $title = $faker->sentence($nbWords = 6, $variableNbWords = true);
            $data[] = array(
                'url'  => $faker->url,
                'name' => $title,
            );
        }
        $sources = $this->table('sources');
        $sources->insert($data)->save();
        // empty the table
        // $sources->truncate();
    }
}
