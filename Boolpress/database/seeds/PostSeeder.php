<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Post;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $newPost = new Post();

            $newPost->title = $faker->words(3, true);
            $newPost->content = $faker->text(rand(50, 150));
            $slug = Str::slug($newPost->title, '-');

            // Sovrascrittura in caso di slug già esistente
            $existingSlug = Post::where('slug', $slug)->first();
            $counter = 1;
            while($existingSlug) {
                $slug = $slug . '-' . $counter;
                $counter++;
            }
            $newPost->slug = $slug;
            $newPost->user_id = 1; // Esempio momentaneo 
            $newPost->category_id = rand(1,2);

            $newPost->save();
        }
    }
}
