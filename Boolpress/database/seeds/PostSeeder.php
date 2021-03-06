<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Support\Facades\Auth;
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
            $title = $faker->words(3, true);
            $existingTitle = Post::where('title', $title)->first();
            while($existingTitle) {
                $title = $faker->words(3, true);
            }
            $newPost->title = $title;
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
            $newPost->user_id = Auth::id();
            $newPost->category_id = rand(1, 3);
            $newPost->save();
        }
    }
}
