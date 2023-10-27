<?php

namespace Database\Seeders;

use App\Models\Video;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VideoSeeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $videos = Video::factory(2)->create();

        foreach($videos as $v){            
            $v->tags(rand(1,4))->attach([
                'tag_id' => rand(1, 10),
                'taggable_id' => $v->id,
                'taggable_type' => Video::class
            ]);
        }
    }
}
