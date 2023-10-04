<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 20; $i++) {
            Post::create([
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'body' => $faker->text,
                'user_id' => $faker->numberBetween(1, 20),
            ]);
        }
    }
}
