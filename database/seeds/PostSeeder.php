<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

use App\Model\Post;
use Illuminate\Database\Seeder;
use App\User;
class PostSeeder extends Seeder
{
    public function run(Faker $faker)
    {
        for ($i=0; $i < 30; $i++) { 
            $newPost = new Post();
            $newPost->title = $faker->sentence(3, true);
            $newPost->content = $faker->paragraphs(5, true);
            $title = "$newPost->title-$i";
            $newPost->slug = Str::slug($title, '-');
            $newPost->user_id = User::inRandomOrder()->first()->id;
            $newPost->save(); 
        }
    }
}
