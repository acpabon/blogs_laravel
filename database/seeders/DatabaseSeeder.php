<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use App\Models\Profile;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Storage::deleteDirectory('public/posts');
        Storage::makeDirectory('/public/posts');

        $this->call(UserSeeder::class);
        Category::factory(8)->create();
        Tag::factory(10)->create();
        $this->call(PostSeeder::class);
        $this->call(VideoSeeeder::class);
        
        $profile = new Profile();
        $profile->title = 'Ing.';
        $profile->bio = 'data bio';
        $profile->website = 'www.data.com';
        $profile->user_id = 1;
        $profile->save();

        $profile = new Profile();
        $profile->title = 'Ing2.';
        $profile->bio = 'data bio 2';
        $profile->website = 'www.data2.com';
        $profile->user_id = 2;
        $profile->save();
    }
}
