<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Model\Tag;

class TagSeeder extends Seeder
{
    public function run()
    {
        $tags = [
            '#follo4follow',
            '#like4like',
            '#lifestyle',
            '#scusaeroaltelefono',
            '#cosaserveunique',
            '#foodporn',
            '#intothewild',
            '#adventure',
            '#beautifuldestinations'
        ];

        foreach ($tags as $tag) {
            $newTag = new Tag();
            $newTag->name = $tag;
            $newTag->slug = Str::slug($tag, '-');
            $newTag->save();
        }
    }
}
