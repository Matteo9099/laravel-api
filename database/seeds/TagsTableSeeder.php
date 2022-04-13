<?php

use App\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['Vegetariano', 'Vegano', 'Senza lattosio', 'Senza glutine', 'Carne', 'Pesce'];

        foreach($tags as $tag){
            $new_tag = new Tag();
            $new_tag->name = $tag;
            $new_tag->slug = Str::slug($tag);
            $new_tag->save();
        }

    }
}