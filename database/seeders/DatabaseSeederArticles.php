<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class DatabaseSeederArticles extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $ids = App\Models\Category::select("id")->pluck("id");

        App\Models\User::factory(2)->create();

        for ($i=0; $i < 20; $i++) {
          App\Models\Article::factory()->create([
            'category_id'=>$faker->randomElement($ids),
          ]);
        }
    }
}
