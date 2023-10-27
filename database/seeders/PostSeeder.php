<?php

namespace Database\Seeders;

use App\Models\Photo;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Taggable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::factory(300)->create();

        foreach($posts as $p){
            Photo::factory(1)->create([
                'photoable_id' => $p->id,
                'photoable_type' => Post::class
            ]);
            
            $data = [
                'tag_id' => 1,
                'taggable_id' => $p->id,
                'taggable_type' => Post::class
            ];
            
            $p->tags()->create($data);
        }
    }
}
