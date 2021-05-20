<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Category;
use Illuminate\Support\Str;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 3; $i++) {
            $newCategory = new Category();
            $newCategory->name = $faker->words(3, true);
            $slug = Str::slug($newCategory->name, '-');
            $existingSlug = Category::where('slug', $slug)->first();
            $counter = 1;
            while($existingSlug) {
                $slug = $slug . '-' . $counter;
                $counter++;
            }
            $newCategory->slug = $slug;
            $newCategory->save();
        }
    }
}
