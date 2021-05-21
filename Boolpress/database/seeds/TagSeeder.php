<?php

use Illuminate\Database\Seeder;
use App\Tag;
use Illuminate\Support\Str;
use Faker\Generator as Faker;


class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {   
        for($i = 0; $i < 4; $i++) {
            $newTag = new Tag();
            $newTag->name = $faker->words(2, true);
            $slug = Str::slug($newTag->name, '-');

            // Sovrascrittura in caso di slug già esistente
            $existingSlug = Tag::where('slug', $slug)->first();
            $counter = 1;
            while($existingSlug) {
                $slug = $slug . '-' . $counter;
                $counter++;
            }
            $newTag->slug = $slug;
            $newTag->save();
        }
        
    }
}
